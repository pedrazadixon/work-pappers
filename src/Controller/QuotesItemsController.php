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
    public function manage($quote_id)
    {
        $quote = $this->QuotesItems->Quotes->get($quote_id);

        $quote_items = $this->QuotesItems->find()
            ->select(['id', 'description', 'hours', 'hour_price'])
            ->where(['quote_id' => $quote->id])
            ->enableHydration(false)
            ->toArray();


        if ($this->request->is('post')) {

            $request_data = $this->request->getData();

            foreach ($request_data as $item) {

                // new item
                if (is_null($item['id'])) {
                    $item_entity = $this->QuotesItems->newEntity($item);
                    $item_entity->quote_id = $quote->id;
                    $this->QuotesItems->save($item_entity);
                    continue;
                }

                // edit item
                if (in_array($item['id'], array_column($quote_items, 'id'))) {
                    $item_entity = $this->QuotesItems->get($item['id']);
                    $item_entity = $this->QuotesItems->patchEntity($item_entity, $item);
                    $this->QuotesItems->save($item_entity);
                }
            }

            // delete items
            foreach ($quote_items as $item) {
                if (!in_array($item['id'], array_column($request_data, 'id'))) {
                    $item_entity = $this->QuotesItems->get($item['id']);
                    $this->QuotesItems->delete($item_entity);
                }
            }

            $this->Flash->success(__('The quotes item has been saved.'));
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([]));
        }
        $this->set(compact('quote', 'quote_items'));
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
