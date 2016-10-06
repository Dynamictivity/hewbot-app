<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Http\Client;
use Cake\Core\Configure;

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
        $botCount = $this->Bots->find()->count();
        if ($botCount >= 1) {
            $this->Flash->success(__('If you need additional bots, please send an e-mail to ' . Configure::read('dyn.support.email')));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->request->is('post')) {
            $bot = $this->Bots->patchEntity($bot,
                array_merge($this->request->data, ['user_id' => $this->Auth->user('id')]));
            if ($bot = $this->Bots->save($bot)) {
                $this->Flash->success(__('The bot has been saved.'));
                return $this->redirect(['action' => 'deploy', $bot->id]);
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
                return $this->redirect(['action' => 'deploy', $id]);
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

        // Rundeck delete job
        $response = $this->__callRundeck($id, 'delete');
        if ($response->code == '200' && $this->Bots->delete($bot)) {
            $this->Flash->success(__('The bot has been deleted.'));
        } else {
            $this->Flash->error(__('The bot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deploy($id = null)
    {
        $bot = $this->Bots->get($id);
        $this->_validateOwnership($bot->user_id);
        // Rundeck deploy job
        $response = $this->__callRundeck($id, 'deploy');
        if ($response->code == '200') {
            $this->Flash->success(__('The bot has been deployed.'));
        } else {
            $this->Flash->error(__('The bot could not be deployed. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function __callRundeck($id, $job)
    {
        $jobs = [
            'deploy' => 'be543f0b-7c04-4c62-aa4b-2bbd46a1f80d',
            'delete' => '645703a1-c3eb-44d7-91f2-f023c2d2e63c'
        ];
        $jobId = $jobs[$job];
        $http = new Client();
        $jsonPayload = json_encode(['argString' => "-BOT_ID $id"]);
        // Return response
        return $http->post(Configure::read('dyn.rundeck.url') . "/api/1/job/$jobId/run", $jsonPayload,
            ['headers' => [
                'X-Rundeck-Auth-Token' => Configure::read('dyn.rundeck.apiToken'),
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache'
            ]]);
    }
}
