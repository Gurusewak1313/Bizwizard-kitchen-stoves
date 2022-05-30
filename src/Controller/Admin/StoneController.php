<?php
declare(strict_types=1);

namespace App\Controller\Admin;
use App\Model\Table\StoneTable;
use Cake\ORM\Table;
use Cake\Validation\Validator;
/**
 * Stone Controller
 *
 * @property \App\Model\Table\StoneTable $Stone
 * @method \App\Model\Entity\Stone[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoneController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $stone = $this->paginate($this->Stone);
        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('stone'));
    }

    /**
     * View method
     *
     * @param string|null $id Stone id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stone = $this->Stone->get($id);
        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('stone'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('admin');
        $stone = $this->Stone->newEmptyEntity();
        if ($this->request->is('post')) {
            $stone = $this->Stone->patchEntity($stone, $this->request->getData());
            if ($this->Stone->save($stone)) {
                $this->Flash->success(__('The stone has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stone could not be saved. Please, try again.'));
        }
        $this->set(compact('stone'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stone id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('admin');
        $stone = $this->Stone->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stone = $this->Stone->patchEntity($stone, $this->request->getData());
            if ($this->Stone->save($stone)) {
                $this->Flash->success(__('The stone has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stone could not be saved. Please, try again.'));
        }
        $this->set(compact('stone'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stone id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stone = $this->Stone->get($id);
        if ($this->Stone->delete($stone)) {
            $this->Flash->success(__('The stone has been deleted.'));
        } else {
            $this->Flash->error(__('The stone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
