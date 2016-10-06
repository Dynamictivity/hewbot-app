<?php
namespace App\Controller\Api;

use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class BotsController extends \App\Controller\AppController
{

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
        $this->viewBuilder()->layout('api');
        $this->Auth->allow(['scripts', 'container', 'slack']);
    }

    /**
     * scripts method
     *
     * @param string|null $id Bot id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function scripts($id = null)
    {
        $bot = $this->Bots->get($id, [
            'contain' => ['BotExternalScripts', 'BotExternalScripts.ExternalScripts']
        ]);
        $externalScripts = Hash::extract($bot, 'bot_external_scripts.{n}.external_script.name');
        $this->set('externalScripts', $externalScripts);
    }

    /**
     * slack method
     *
     * @param string|null $id Bot id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function slack($id = null)
    {
        $bot = $this->Bots->get($id, [
            'contain' => []
        ]);
        $this->set('hubot_slack_token', $bot->hubot_slack_token);
    }

    /**
     * container method
     *
     * @param string|null $id Bot id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function container($id = null)
    {
        $bot = $this->Bots->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bot = $this->Bots->patchEntity($bot, $this->request->data);
            $this->Bots->save($bot);
        }
        $this->autoRender = false;
    }
}
