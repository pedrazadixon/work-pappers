<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BankAccountTypes Controller
 *
 * @property \App\Model\Table\BankAccountTypesTable $BankAccountTypes
 * @method \App\Model\Entity\BankAccountType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BankAccountTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $bankAccountTypes = $this->paginate($this->BankAccountTypes);

        $this->set(compact('bankAccountTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Bank Account Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bankAccountType = $this->BankAccountTypes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('bankAccountType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bankAccountType = $this->BankAccountTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $bankAccountType = $this->BankAccountTypes->patchEntity($bankAccountType, $this->request->getData());
            if ($this->BankAccountTypes->save($bankAccountType)) {
                $this->Flash->success(__('The bank account type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bank account type could not be saved. Please, try again.'));
        }
        $this->set(compact('bankAccountType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bank Account Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bankAccountType = $this->BankAccountTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bankAccountType = $this->BankAccountTypes->patchEntity($bankAccountType, $this->request->getData());
            if ($this->BankAccountTypes->save($bankAccountType)) {
                $this->Flash->success(__('The bank account type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bank account type could not be saved. Please, try again.'));
        }
        $this->set(compact('bankAccountType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bank Account Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bankAccountType = $this->BankAccountTypes->get($id);
        if ($this->BankAccountTypes->delete($bankAccountType)) {
            $this->Flash->success(__('The bank account type has been deleted.'));
        } else {
            $this->Flash->error(__('The bank account type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
