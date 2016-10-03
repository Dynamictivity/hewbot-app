<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * Bots Controller
 *
 * @property \App\Model\Table\BotsTable $Bots
 */
class BotsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'BotAdapters'],
            'conditions' => [
                'Bots.user_id' => $this->Auth->user('id')
            ]
        ];
        $bots = $this->paginate($this->Bots);

        $this->set(compact('bots'));
        $this->set('_serialize', ['bots']);
    }

    /**
     * View method
     *
     * @param string|null $id Bot id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bot = $this->Bots->get($id, [
            'contain' => ['Users', 'BotAdapters', 'BotExternalScripts', 'BotExternalScripts.ExternalScripts']
        ]);

        $this->_validateOwnership($bot->user_id);

        $this->set('bot', $bot);
        $this->set('_serialize', ['bot']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bot = $this->Bots->newEntity();
        if ($this->request->is('post')) {
            $bot = $this->Bots->patchEntity($bot, $this->request->data);
            if ($this->Bots->save($bot)) {
                $this->Flash->success(__('The bot has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bot could not be saved. Please, try again.'));
            }
        }
        $botAdapters = $this->Bots->BotAdapters->find('list', ['limit' => 200]);
        $this->set(compact('bot', 'botAdapters'));
        $this->set('_serialize', ['bot']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bot id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bot = $this->Bots->get($id, [
            'contain' => []
        ]);

        $this->_validateOwnership($bot->user_id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $bot = $this->Bots->patchEntity($bot, $this->request->data);
            if ($this->Bots->save($bot)) {
                $this->Flash->success(__('The bot has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bot could not be saved. Please, try again.'));
            }
        }
        $botAdapters = $this->Bots->BotAdapters->find('list', ['limit' => 200]);
        $this->set(compact('bot', 'botAdapters'));
        $this->set('_serialize', ['bot']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bot id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bot = $this->Bots->get($id);

        $this->_validateOwnership($bot->user_id);

        if ($this->Bots->delete($bot)) {
            $this->Flash->success(__('The bot has been deleted.'));
        } else {
            $this->Flash->error(__('The bot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
