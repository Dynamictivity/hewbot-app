<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Mailer\MailerAwareTrait;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    use MailerAwareTrait;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'register', 'reset', 'confirm']);
    }

    /**
     * Profile method
     *
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function profile()
    {
        $id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->render('/Users/profile');
    }

    /**
     * Account method
     *
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function account()
    {
        $id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'account']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->render('/Users/account');
    }

    /**
     * @return \Cake\Network\Response|null
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Your username or password is incorrect.'));
        }
        $this->render('/Users/login');
    }

    /**
     * @return \Cake\Network\Response|null
     */
    public function logout()
    {
        $this->Flash->success(__('You are now logged out.'));
        return $this->redirect($this->Auth->logout());
    }

    /**
     * @return \Cake\Network\Response|null
     * @throws \Cake\Mailer\Exception\MissingActionException
     * @throws \BadMethodCallException
     * @throws \Cake\Mailer\Exception\MissingMailerException
     */
    public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($user = $this->Users->save($user)) {
                // Generate and set user's token
                $user->token = $this->Users->setToken($user->id);
                // Send welcome email
                $this->getMailer('User')->send('welcome', [$user]);
                $this->Flash->success(__('The account has been created, please check your e-mail inbox.'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The account could not be created. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->render('/Users/register');
    }

    /**
     *
     * @throws \BadMethodCallException
     * @throws \Cake\Mailer\Exception\MissingActionException
     * @throws \Cake\Mailer\Exception\MissingMailerException
     */
    public function reset()
    {
        $user = $this->Users->newEntity();
        if (!empty($this->request->data)) {
            $user = $this->Users->getUserFromEmail($this->request->data['email']);
            if ($user->id && $user->token = $this->Users->setToken($user->id)) {
                // Send reset email
                $this->getMailer('User')->send('resetPassword', [$user]);
                $this->Flash->success(__('A password reset link has been sent. Please, check your e-mail inbox.'));
                $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The account was not found. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->render('/Users/reset');
    }

    /**
     * @param null $token
     */
    public function confirm($token = null)
    {
        $user = $this->Users->get($this->Users->getUserIdFromToken($token));
        if (!empty($this->request->data)) {
            $user = $this->Users->patchEntity($user, [
                'password' => $this->request->data['new_password'],
                'new_password' => $this->request->data['new_password'],
                'confirm_password' => $this->request->data['confirm_password']
            ],
                ['validate' => 'passwordReset']
            );
            if ($this->Users->save($user)) {
                // Refresh user's token
                $this->Users->setToken($user->id);
                $this->Flash->success(__('The password is successfully updated.'));
                $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The password could not be updated. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->render('/Users/confirm');
    }

    /**
     *
     */
    public function changePassword()
    {
        $user = $this->Users->get($this->Auth->user('id'));
        if (!empty($this->request->data)) {
            $user = $this->Users->patchEntity($user, [
                'current_password' => $this->request->data['current_password'],
                'password' => $this->request->data['new_password'],
                'new_password' => $this->request->data['new_password'],
                'confirm_password' => $this->request->data['confirm_password']
            ],
                ['validate' => 'password']
            );
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The password is successfully updated.'));
                $this->redirect('/');
            } else {
                $this->Flash->error(__('The password could not be updated. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->render('/Users/change_password');
    }
}
