<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Text;

/**
 * Quotes Controller
 *
 * @property \App\Model\Table\QuotesTable $Quotes
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuotesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Suppliers', 'QuotesStatuses'],
        ];
        $quotes = $this->paginate($this->Quotes);

        $this->set(compact('quotes'));
    }

    /**
     * View method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quote = $this->Quotes->get($id, [
            'contain' => ['Clients', 'Suppliers', 'QuotesStatuses', 'Bills', 'Documents', 'Notes', 'QuotesItems'],
        ]);

        $this->set(compact('quote'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quote = $this->Quotes->newEmptyEntity();
        if ($this->request->is('post')) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());
            if ($this->Quotes->save($quote)) {
                $this->Flash->success(__('The quote has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }
        $clients = $this->Quotes->Clients->find('list', ['limit' => 200])->all();
        $suppliers = $this->Quotes->Suppliers->find('list', ['limit' => 200])->all();
        $quotesStatuses = $this->Quotes->QuotesStatuses->find('list', ['limit' => 200])->all();
        $this->set(compact('quote', 'clients', 'suppliers', 'quotesStatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quote = $this->Quotes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());
            if ($this->Quotes->save($quote)) {
                $this->Flash->success(__('The quote has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }
        $clients = $this->Quotes->Clients->find('list', ['limit' => 200])->all();
        $suppliers = $this->Quotes->Suppliers->find('list', ['limit' => 200])->all();
        $quotesStatuses = $this->Quotes->QuotesStatuses->find('list', ['limit' => 200])->all();
        $this->set(compact('quote', 'clients', 'suppliers', 'quotesStatuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quote = $this->Quotes->get($id);
        if ($this->Quotes->delete($quote)) {
            $this->Flash->success(__('The quote has been deleted.'));
        } else {
            $this->Flash->error(__('The quote could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function makeWord($id)
    {

        $quote = $this->Quotes->get($id, [
            'contain' => ['QuotesItems', 'Clients.IdentificationTypes', 'Suppliers.IdentificationTypes']
        ]);

        // $fmt = new \IntlDateFormatter('es-ES', 0, 0, null, null, 'MMMM');
        // dd($fmt->format($quote->created));

        $fmt = new \NumberFormatter('es_CO', \NumberFormatter::CURRENCY);
        $fmt->setAttribute($fmt::FRACTION_DIGITS, 0);

        $quote_items = array_map(function ($item) use ($fmt) {
            $new_item['item_description'] = $item->description;
            $new_item['item_hours'] = $item->hours;
            $new_item['item_hour_price'] =  $fmt->formatCurrency((float) $item->hour_price, 'COP');
            $new_item['item_total'] = $fmt->formatCurrency((float) $item->hours * $item->hour_price, 'COP');
            return $new_item;
        }, $quote->quotes_items);


        $template_file = ROOT . DS . 'files' . DS . 'templates' . DS . 'quote.docx';

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_file);

        $templateProcessor->setValue('q-id', $quote->id);
        $templateProcessor->setValue('q-title', $quote->title);
        $templateProcessor->setValue('c-c-n', $quote->client->company_name);
        $templateProcessor->setValue('c-i-n', $quote->client->identification_number);
        $templateProcessor->setValue('q-date', $quote->created->format('Y-m-d'));
        $templateProcessor->setValue('c-email', $quote->client->email);
        $templateProcessor->setValue('c-phone', $quote->client->phone);
        $templateProcessor->setValue('q-comment', str_replace("\n", "<w:br/>", $quote->comment));
        $templateProcessor->setValue('s-c-n', mb_strtoupper($quote->supplier->company_name));
        $templateProcessor->setValue('s-i-n', $quote->supplier->identification_number);
        $templateProcessor->setValue('s-title', $quote->supplier->title);
        $templateProcessor->setValue('s-phone', $quote->supplier->phone);
        $templateProcessor->setValue('s-email', $quote->supplier->email);
        $templateProcessor->setValue('c-i-t', $quote->client->identification_type->acronym);
        $templateProcessor->setValue('s-i-t', $quote->supplier->identification_type->acronym);

        $templateProcessor->cloneRowAndSetValues('item_description', $quote_items);

        $dest_filename = 'Quote_' . $quote->id . '_' . Text::slug($quote->client->company_name . '.docx');

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
