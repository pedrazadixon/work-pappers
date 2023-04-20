<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BillsStatuses Controller
 *
 * @property \App\Model\Table\BillsStatusesTable $BillsStatuses
 * @method \App\Model\Entity\BillsStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BillsStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $billsStatuses = $this->paginate($this->BillsStatuses);

        $this->set(compact('billsStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Bills Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $billsStatus = $this->BillsStatuses->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('billsStatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $billsStatus = $this->BillsStatuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $billsStatus = $this->BillsStatuses->patchEntity($billsStatus, $this->request->getData());
            if ($this->BillsStatuses->save($billsStatus)) {
                $this->Flash->success(__('The bills status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bills status could not be saved. Please, try again.'));
        }
        $this->set(compact('billsStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bills Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $billsStatus = $this->BillsStatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $billsStatus = $this->BillsStatuses->patchEntity($billsStatus, $this->request->getData());
            if ($this->BillsStatuses->save($billsStatus)) {
                $this->Flash->success(__('The bills status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bills status could not be saved. Please, try again.'));
        }
        $this->set(compact('billsStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bills Status id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $billsStatus = $this->BillsStatuses->get($id);
        if ($this->BillsStatuses->delete($billsStatus)) {
            $this->Flash->success(__('The bills status has been deleted.'));
        } else {
            $this->Flash->error(__('The bills status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
