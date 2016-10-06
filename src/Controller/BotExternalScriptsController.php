<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BotExternalScripts Controller
 *
 * @property \App\Model\Table\BotExternalScriptsTable $BotExternalScripts
 */
class BotExternalScriptsController extends AppController
{

    /**
     * Add method
     *
     * @param string|null $id External Script id.
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $botExternalScript = $this->BotExternalScripts->newEntity();
        if ($this->request->is('post')) {
            $botExternalScript = $this->BotExternalScripts->patchEntity($botExternalScript, $this->request->data);
            if ($this->BotExternalScripts->save($botExternalScript)) {
                $this->Flash->success(__('The bot external script has been saved.'));
                return $this->redirect(['controller' => 'bots', 'action' => 'deploy', $botExternalScript->bot_id]);
            } else {
                $this->Flash->error(__('The bot external script could not be saved. Please, try again.'));
            }
        }
        $bots = $this->BotExternalScripts->Bots->find('list',
            ['conditions' => [
                'Bots.user_id' => $this->Auth->user('id')
            ]]);
        $externalScripts = $this->BotExternalScripts->ExternalScripts->find('list',
            ['order' => [
                'ExternalScripts.name' => 'ASC'
            ]]);
        $botExternalScript->external_script_id = $id;
        $this->set(compact('botExternalScript', 'bots', 'externalScripts', 'botExternalScript'));
        $this->set('_serialize', ['botExternalScript']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bot External Script id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $botExternalScript = $this->BotExternalScripts->get($id);
        if ($this->BotExternalScripts->delete($botExternalScript)) {
            $this->Flash->success(__('The bot external script has been deleted.'));
        } else {
            $this->Flash->error(__('The bot external script could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'bots', 'action' => 'deploy', $botExternalScript->bot_id]);
    }
}
