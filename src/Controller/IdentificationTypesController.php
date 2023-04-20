<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * IdentificationTypes Controller
 *
 * @property \App\Model\Table\IdentificationTypesTable $IdentificationTypes
 * @method \App\Model\Entity\IdentificationType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IdentificationTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $identificationTypes = $this->paginate($this->IdentificationTypes);

        $this->set(compact('identificationTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Identification Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $identificationType = $this->IdentificationTypes->get($id, [
            'contain' => ['Clients', 'Suppliers'],
        ]);

        $this->set(compact('identificationType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $identificationType = $this->IdentificationTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $identificationType = $this->IdentificationTypes->patchEntity($identificationType, $this->request->getData());
            if ($this->IdentificationTypes->save($identificationType)) {
                $this->Flash->success(__('The identification type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The identification type could not be saved. Please, try again.'));
        }
        $this->set(compact('identificationType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Identification Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $identificationType = $this->IdentificationTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $identificationType = $this->IdentificationTypes->patchEntity($identificationType, $this->request->getData());
            if ($this->IdentificationTypes->save($identificationType)) {
                $this->Flash->success(__('The identification type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The identification type could not be saved. Please, try again.'));
        }
        $this->set(compact('identificationType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Identification Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $identificationType = $this->IdentificationTypes->get($id);
        if ($this->IdentificationTypes->delete($identificationType)) {
            $this->Flash->success(__('The identification type has been deleted.'));
        } else {
            $this->Flash->error(__('The identification type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
