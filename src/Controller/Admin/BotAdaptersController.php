<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * BotAdapters Controller
 *
 * @property \App\Model\Table\BotAdaptersTable $BotAdapters
 */
class BotAdaptersController extends \App\Controller\BotAdaptersController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $botAdapters = $this->paginate($this->BotAdapters);

        $this->set(compact('botAdapters'));
        $this->set('_serialize', ['botAdapters']);
    }

    /**
     * View method
     *
     * @param string|null $id Bot Adapter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $botAdapter = $this->BotAdapters->get($id, [
            'contain' => ['Bots']
        ]);

        $this->set('botAdapter', $botAdapter);
        $this->set('_serialize', ['botAdapter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $botAdapter = $this->BotAdapters->newEntity();
        if ($this->request->is('post')) {
            $botAdapter = $this->BotAdapters->patchEntity($botAdapter, $this->request->data);
            if ($this->BotAdapters->save($botAdapter)) {
                $this->Flash->success(__('The bot adapter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bot adapter could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('botAdapter'));
        $this->set('_serialize', ['botAdapter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bot Adapter id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $botAdapter = $this->BotAdapters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $botAdapter = $this->BotAdapters->patchEntity($botAdapter, $this->request->data);
            if ($this->BotAdapters->save($botAdapter)) {
                $this->Flash->success(__('The bot adapter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bot adapter could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('botAdapter'));
        $this->set('_serialize', ['botAdapter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bot Adapter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $botAdapter = $this->BotAdapters->get($id);
        if ($this->BotAdapters->delete($botAdapter)) {
            $this->Flash->success(__('The bot adapter has been deleted.'));
        } else {
            $this->Flash->error(__('The bot adapter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
