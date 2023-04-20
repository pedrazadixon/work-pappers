<?php
declare(strict_types=1);

namespace App\Controller;

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
}
