<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Text;
use Luecano\NumeroALetras\NumeroALetras;

/**
 * Bills Controller
 *
 * @property \App\Model\Table\BillsTable $Bills
 * @method \App\Model\Entity\Bill[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BillsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Quotes', 'Suppliers', 'BankAccounts', 'BillsStatuses'],
        ];
        $bills = $this->paginate($this->Bills);

        $this->set(compact('bills'));
    }

    /**
     * View method
     *
     * @param string|null $id Bill id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bill = $this->Bills->get($id, [
            'contain' => ['Quotes', 'Suppliers', 'BankAccounts', 'BillsStatuses', 'Payments'],
        ]);

        $this->set(compact('bill'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bill = $this->Bills->newEmptyEntity();
        if ($this->request->is('post')) {
            $bill = $this->Bills->patchEntity($bill, $this->request->getData());
            if ($this->Bills->save($bill)) {
                $this->Flash->success(__('The bill has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bill could not be saved. Please, try again.'));
        }
        $quotes = $this->Bills->Quotes->find('list', ['limit' => 200])->all();
        $suppliers = $this->Bills->Suppliers->find('list', ['limit' => 200])->all();
        $bankAccounts = $this->Bills->BankAccounts->find('list', ['limit' => 200])->all();
        $billsStatuses = $this->Bills->BillsStatuses->find('list', ['limit' => 200])->all();
        $this->set(compact('bill', 'quotes', 'suppliers', 'bankAccounts', 'billsStatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bill id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bill = $this->Bills->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bill = $this->Bills->patchEntity($bill, $this->request->getData());
            if ($this->Bills->save($bill)) {
                $this->Flash->success(__('The bill has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bill could not be saved. Please, try again.'));
        }
        $quotes = $this->Bills->Quotes->find('list', ['limit' => 200])->all();
        $suppliers = $this->Bills->Suppliers->find('list', ['limit' => 200])->all();
        $bankAccounts = $this->Bills->BankAccounts->find('list', ['limit' => 200])->all();
        $billsStatuses = $this->Bills->BillsStatuses->find('list', ['limit' => 200])->all();
        $this->set(compact('bill', 'quotes', 'suppliers', 'bankAccounts', 'billsStatuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bill id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bill = $this->Bills->get($id);
        if ($this->Bills->delete($bill)) {
            $this->Flash->success(__('The bill has been deleted.'));
        } else {
            $this->Flash->error(__('The bill could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function makeWord($id)
    {
        $bill = $this->Bills->get($id, [
            'contain' => ['Quotes.QuotesItems', 'Quotes.Clients.IdentificationTypes', 'Suppliers.IdentificationTypes', 'BankAccounts.BankAccountTypes']
        ]);

        // $fmt = new \IntlDateFormatter('es-ES', 0, 0, null, null, 'MMMM');
        // dd($fmt->format($quote->created));

        $fmt = new \NumberFormatter('es_CO', \NumberFormatter::CURRENCY);
        $fmt->setAttribute($fmt::FRACTION_DIGITS, 0);

        $quote_items = array_map(function ($item) use ($fmt) {
            $new_item['item_description'] = $item->description;
            $new_item['item_total'] = $fmt->formatCurrency((float) $item->hours * $item->hour_price, 'COP');
            $new_item['item_total_int'] = (float) $item->hours * $item->hour_price;
            return $new_item;
        }, $bill->quote->quotes_items);


        $total = array_reduce($quote_items, function ($carry, $item) {
            return $carry += $item['item_total_int'];
        }, 0);


        $formatter = new NumeroALetras();
        $total_in_letters = $formatter->toWords($total);

        $total = $fmt->formatCurrency($total, 'COP');

        $template_file = ROOT . DS . 'files' . DS . 'templates' . DS . 'bill.docx';

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_file);

        $templateProcessor->setValue('b-id', $bill->id);

        $templateProcessor->setValue('c-i-t', $bill->quote->client->identification_type->acronym);
        $templateProcessor->setValue('c-c-n', $bill->quote->client->company_name);
        $templateProcessor->setValue('c-i-n', $bill->quote->client->identification_number);

        $templateProcessor->setValue('s-c-n', mb_strtoupper($bill->supplier->company_name));
        $templateProcessor->setValue('s-i-t', $bill->supplier->identification_type->acronym);
        $templateProcessor->setValue('s-i-n', $bill->supplier->identification_number);

        $templateProcessor->setValue('total-in-number', $total);
        $templateProcessor->setValue('total-in-letters', $total_in_letters);

        $templateProcessor->setValue('s-title', $bill->supplier->title);
        $templateProcessor->setValue('s-phone', $bill->supplier->phone);
        $templateProcessor->setValue('s-email', $bill->supplier->email);

        $templateProcessor->setValue('bank-name', $bill->bank_account->bank_name);
        $templateProcessor->setValue('account-type', $bill->bank_account->bank_account_type->name);
        $templateProcessor->setValue('account-number', $bill->bank_account->account_number);


        $templateProcessor->cloneRowAndSetValues('item_description', $quote_items);

        $dest_filename = 'Bill_' . $bill->id . '_' . Text::slug($bill->quote->client->company_name . '.docx');

        $templateProcessor->saveAs(TMP . $dest_filename);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header(sprintf('Content-Disposition: attachment; filename="%s.docx"', $dest_filename));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize(TMP . $dest_filename));

        readfile(TMP . $dest_filename);

        unlink(TMP . $dest_filename);

        exit();
    }
}
