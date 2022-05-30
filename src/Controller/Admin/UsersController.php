<?php
    namespace App\Controller\Admin;

    use App\Controller\Admin\AppController;
    use Cake\Event\EventInterface;

    class UsersController extends AppController
    {
        public function index()
        {
            $this->set('users', $this->Users->find()->all());
            $this->viewBuilder()->setLayout('admin');
        }

        public function view()
        {
            $user = $this->Users->get($id);
            $this->set(compact('user'));
            $this->viewBuilder()->setLayout('admin');
        }

        public function edit()
        {
            $this->viewBuilder()->setLayout('admin');
        }

        public function add()
        {
            $this->viewBuilder()->setLayout('adminlogin');
            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->set(__('The user has been saved.'));
                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->set(__('Unable to add the user.'));
            }
            $this->set('user', $user);
        }

        public function beforeFilter(\Cake\Event\EventInterface $event)
        {
            parent::beforeFilter($event);
            // Configure the login action to not require authentication, preventing
            // the infinite redirect loop issue
            $this->Authentication->addUnauthenticatedActions(['login']);

            // Add to the beforeFilter method of UsersController
            $this->Authentication->addUnauthenticatedActions(['login', 'add']);
        }

        public function login()
        {
            $this->viewBuilder()->setLayout('adminlogin');
            $this->request->allowMethod(['get', 'post']);
            $result = $this->Authentication->getResult();
            // regardless of POST or GET, redirect if user is logged in
            if ($result->isValid()) {
                // redirect to /articles after login success
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'index',
                ]);

                return $this->redirect($redirect);
            }
            // display error if user submitted and authentication failed
            if ($this->request->is('post') && !$result->isValid()) {
                $this->Flash->set(__('Invalid email or password'));
            }

        }

        public function logout()
        {
            $this->viewBuilder()->setLayout('admin');
            $result = $this->Authentication->getResult();
            // regardless of POST or GET, redirect if user is logged in
            if ($result->isValid()) {
                $this->Authentication->logout();
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        }
    }
