<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Quote Controller
 *
 * @property \App\Model\Table\QuoteTable $Quote
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuoteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['QuoteRequest'],
        ];
        $quote = $this->paginate($this->Quote);

        $this->set(compact('quote'));
    }

    /**
     * View method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quote = $this->Quote->get($id, [
            'contain' => ['QuoteRequest'],
        ]);

        $this->set(compact('quote'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quote = $this->Quote->newEmptyEntity();
        if ($this->request->is('post')) {
            $quote = $this->Quote->patchEntity($quote, $this->request->getData());
            if ($this->Quote->save($quote)) {
                $this->Flash->success(__('The quote has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }
        $quoteRequest = $this->Quote->QuoteRequest->find('list', ['limit' => 200])->all();
        $this->set(compact('quote', 'quoteRequest'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quote = $this->Quote->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quote = $this->Quote->patchEntity($quote, $this->request->getData());
            if ($this->Quote->save($quote)) {
                $this->Flash->success(__('The quote has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }
        $quoteRequest = $this->Quote->QuoteRequest->find('list', ['limit' => 200])->all();
        $this->set(compact('quote', 'quoteRequest'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quote = $this->Quote->get($id);
        if ($this->Quote->delete($quote)) {
            $this->Flash->success(__('The quote has been deleted.'));
        } else {
            $this->Flash->error(__('The quote could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
