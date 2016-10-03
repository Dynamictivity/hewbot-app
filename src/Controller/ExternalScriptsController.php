<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExternalScripts Controller
 *
 * @property \App\Model\Table\ExternalScriptsTable $ExternalScripts
 */
class ExternalScriptsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [],
            'order' => [
                'ExternalScripts.name' => 'ASC'
            ]
        ];

        $externalScripts = $this->paginate($this->ExternalScripts);

        $this->set(compact('externalScripts'));
        $this->set('_serialize', ['externalScripts']);
    }
}
