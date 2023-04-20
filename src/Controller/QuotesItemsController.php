<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * QuotesItems Controller
 *
 * @property \App\Model\Table\QuotesItemsTable $QuotesItems
 * @method \App\Model\Entity\QuotesItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuotesItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Quotes'],
        ];
        $quotesItems = $this->paginate($this->QuotesItems);

        $this->set(compact('quotesItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Quotes Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quotesItem = $this->QuotesItems->get($id, [
            'contain' => ['Quotes'],
        ]);

        $this->set(compact('quotesItem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quotesItem = $this->QuotesItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $quotesItem = $this->QuotesItems->patchEntity($quotesItem, $this->request->getData());
            if ($this->QuotesItems->save($quotesItem)) {
                $this->Flash->success(__('The quotes item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quotes item could not be saved. Please, try again.'));
        }
        $quotes = $this->QuotesItems->Quotes->find('list', ['limit' => 200])->all();
        $this->set(compact('quotesItem', 'quotes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quotes Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quotesItem = $this->QuotesItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quotesItem = $this->QuotesItems->patchEntity($quotesItem, $this->request->getData());
            if ($this->QuotesItems->save($quotesItem)) {
                $this->Flash->success(__('The quotes item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quotes item could not be saved. Please, try again.'));
        }
        $quotes = $this->QuotesItems->Quotes->find('list', ['limit' => 200])->all();
        $this->set(compact('quotesItem', 'quotes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quotes Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quotesItem = $this->QuotesItems->get($id);
        if ($this->QuotesItems->delete($quotesItem)) {
            $this->Flash->success(__('The quotes item has been deleted.'));
        } else {
            $this->Flash->error(__('The quotes item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
