<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * QuotesStatuses Controller
 *
 * @property \App\Model\Table\QuotesStatusesTable $QuotesStatuses
 * @method \App\Model\Entity\QuotesStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuotesStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $quotesStatuses = $this->paginate($this->QuotesStatuses);

        $this->set(compact('quotesStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Quotes Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quotesStatus = $this->QuotesStatuses->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('quotesStatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quotesStatus = $this->QuotesStatuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $quotesStatus = $this->QuotesStatuses->patchEntity($quotesStatus, $this->request->getData());
            if ($this->QuotesStatuses->save($quotesStatus)) {
                $this->Flash->success(__('The quotes status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quotes status could not be saved. Please, try again.'));
        }
        $this->set(compact('quotesStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quotes Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quotesStatus = $this->QuotesStatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quotesStatus = $this->QuotesStatuses->patchEntity($quotesStatus, $this->request->getData());
            if ($this->QuotesStatuses->save($quotesStatus)) {
                $this->Flash->success(__('The quotes status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quotes status could not be saved. Please, try again.'));
        }
        $this->set(compact('quotesStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quotes Status id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quotesStatus = $this->QuotesStatuses->get($id);
        if ($this->QuotesStatuses->delete($quotesStatus)) {
            $this->Flash->success(__('The quotes status has been deleted.'));
        } else {
            $this->Flash->error(__('The quotes status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
