<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PaymentStatuses Controller
 *
 * @property \App\Model\Table\PaymentStatusesTable $PaymentStatuses
 * @method \App\Model\Entity\PaymentStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $paymentStatuses = $this->paginate($this->PaymentStatuses);

        $this->set(compact('paymentStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentStatus = $this->PaymentStatuses->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('paymentStatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentStatus = $this->PaymentStatuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $paymentStatus = $this->PaymentStatuses->patchEntity($paymentStatus, $this->request->getData());
            if ($this->PaymentStatuses->save($paymentStatus)) {
                $this->Flash->success(__('The payment status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment status could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentStatus = $this->PaymentStatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentStatus = $this->PaymentStatuses->patchEntity($paymentStatus, $this->request->getData());
            if ($this->PaymentStatuses->save($paymentStatus)) {
                $this->Flash->success(__('The payment status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment status could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Status id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentStatus = $this->PaymentStatuses->get($id);
        if ($this->PaymentStatuses->delete($paymentStatus)) {
            $this->Flash->success(__('The payment status has been deleted.'));
        } else {
            $this->Flash->error(__('The payment status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
