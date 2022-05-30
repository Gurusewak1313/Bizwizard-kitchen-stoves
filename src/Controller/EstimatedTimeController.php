<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EstimatedTime Controller
 *
 * @property \App\Model\Table\EstimatedTimeTable $EstimatedTime
 * @method \App\Model\Entity\EstimatedTime[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstimatedTimeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $estimatedTime = $this->paginate($this->EstimatedTime);

        $this->set(compact('estimatedTime'));
    }

    /**
     * View method
     *
     * @param string|null $id Estimated Time id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estimatedTime = $this->EstimatedTime->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('estimatedTime'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estimatedTime = $this->EstimatedTime->newEmptyEntity();
        if ($this->request->is('post')) {
            $estimatedTime = $this->EstimatedTime->patchEntity($estimatedTime, $this->request->getData());
            if ($this->EstimatedTime->save($estimatedTime)) {
                $this->Flash->success(__('The estimated time has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estimated time could not be saved. Please, try again.'));
        }
        $this->set(compact('estimatedTime'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estimated Time id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estimatedTime = $this->EstimatedTime->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estimatedTime = $this->EstimatedTime->patchEntity($estimatedTime, $this->request->getData());
            if ($this->EstimatedTime->save($estimatedTime)) {
                $this->Flash->success(__('The estimated time has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estimated time could not be saved. Please, try again.'));
        }
        $this->set(compact('estimatedTime'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estimated Time id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estimatedTime = $this->EstimatedTime->get($id);
        if ($this->EstimatedTime->delete($estimatedTime)) {
            $this->Flash->success(__('The estimated time has been deleted.'));
        } else {
            $this->Flash->error(__('The estimated time could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
