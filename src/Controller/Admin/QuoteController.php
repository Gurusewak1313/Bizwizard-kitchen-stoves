<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Core\Configure;
use Cake\Mailer\Mailer;

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
            'contain' => ['QuoteRequest', 'EstimatedTime'],
        ];
        $quote = $this->paginate($this->Quote);
        $this->viewBuilder()->setLayout('admin');
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
        $this->viewBuilder()->setLayout('admin');

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quote = $this->Quote->newEmptyEntity();
        $quoteSession = $this->request->getSession()->read('quoteRequest');
        $quote_id = $quoteSession;

        if ($this->request->is('post')) {
            $quote = $this->Quote->patchEntity($quote, $this->request->getData());

            if ($this->Quote->save($quote)) {
                // Create email
                $mailer = new Mailer('default');
                // Setup email parameters
                $mailer
                    ->setEmailFormat('html')
                    ->setTo($quote_id['cust_email'])
                    ->setReplyTo($quote_id['cust_email'])
                    ->setSubject('Quote response from Biz Wizard')
                    ->viewBuilder()
                    ->setTemplate('quote')
                    ->disableAutoLayout();

                // Send data to email template
                $mailer->setViewVars([
                    'content' => $quote->body,
                    'cust_name' => $quote_id['cust_name'],
                    'cust_email' => $quote_id['cust_email'],
                    'cust_phone' => $quote_id['cust_phone'],
                    'street_name' => $quote_id['street_number']." ".$quote_id['street_name']." ".$quote_id['suburb']." ".$quote_id['state']." ".$quote_id['postcode'],
                    'est_time' => $quote->est_time_id,
                    'initial_price' => $quote->initial_price,
                    'final_price' => $quote->final_price,
                    'comments' => $quote->comments
                ]);

                // Send email

                $email_result = $mailer->deliver();

                // Sets flash message
                if ($email_result) {
                    $this->Flash->success(__('The quote has been saved and the response has been sent.'));
                } else {
                    $this->Flash->error(__('The email could not be sent. Please, try again.'));
                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }
        $quoteRequest = $this->Quote->QuoteRequest->find('list', ['limit' => 200])->all();
        $this->set(compact('quote', 'quoteRequest'));
        $this->viewBuilder()->setLayout('admin');

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
        $this->viewBuilder()->setLayout('admin');

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
