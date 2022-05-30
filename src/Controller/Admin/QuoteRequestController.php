<?php
declare(strict_types=1);
namespace App\Controller\Admin;
use App\Model\Table\QuoteRequestTable;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * QuoteRequest Controller
 *
 * @property \App\Model\Table\QuoteRequestTable $QuoteRequest
 * @method \App\Model\Entity\QuoteRequest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuoteRequestController extends AppController
{

    /**
     * @var \Cake\Datasource\RepositoryInterface|null
     */

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Status', 'Stone']
        ];
        $quoteRequest = $this->paginate($this->QuoteRequest);
        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('quoteRequest'));
    }

    /**
     * View method
     *
     * @param string|null $id Quote Request id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quoteRequest = $this->QuoteRequest->get($id, [
            'contain' => ['Status'],
        ]);
        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('quoteRequest'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quoteRequest = $this->QuoteRequest->newEmptyEntity();
        if ($this->request->is('post')) {
            $quoteRequest = $this->QuoteRequest->patchEntity($quoteRequest, $this->request->getData());

            if ($this->QuoteRequest->save($quoteRequest)) {
                $this->Flash->success(__('The quote request has been saved.'));

                return $this->redirect('\thankYou.html');
            }
            $this->Flash->error(__('The Quote could not be saved.'));
        }
        $status = $this->QuoteRequest->Status->find('list', ['limit' => 200])->all();
        $this->set(compact('quoteRequest', 'status'));
    }
    /**
    Respond method: This method is used to respond to the specific quote request
     *
     * @return \Cake\Http\Response|null|void Redirects to Quote add page on click
     **/
    public function respond($id)
    {
        $quoteRequest = $this->QuoteRequest->get($id);
        $this->request->getSession()->delete('quoteRequest'); // clearing the session data
        $this->request->getSession()->write('quoteRequest', $quoteRequest); // adding session data with quote request ID
        return $this->redirect('/admin/Quote/Add');
    }


    /**
     * Edit method
     *
     * @param string|null $id Quote Request id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quoteRequest = $this->QuoteRequest->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quoteRequest = $this->QuoteRequest->patchEntity($quoteRequest, $this->request->getData());
            if ($this->QuoteRequest->save($quoteRequest)) {
                $this->Flash->success(__('The quote request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote request could not be saved. Please, try again.'));
        }
        $status = $this->QuoteRequest->Status->find('list', ['limit' => 200])->all();
        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('quoteRequest', 'status'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quote Request id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quoteRequest = $this->QuoteRequest->get($id);
        if ($this->QuoteRequest->delete($quoteRequest)) {
            $this->Flash->success(__('The quote request has been deleted.'));
        } else {
            $this->Flash->error(__('The quote request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
