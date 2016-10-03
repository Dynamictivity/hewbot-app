<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ExternalScripts Controller
 *
 * @property \App\Model\Table\ExternalScriptsTable $ExternalScripts
 */
class ExternalScriptsController extends \App\Controller\ExternalScriptsController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $externalScripts = $this->paginate($this->ExternalScripts);

        $this->set(compact('externalScripts'));
        $this->set('_serialize', ['externalScripts']);
    }

    /**
     * View method
     *
     * @param string|null $id External Script id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $externalScript = $this->ExternalScripts->get($id, [
            'contain' => ['BotExternalScripts']
        ]);

        $this->set('externalScript', $externalScript);
        $this->set('_serialize', ['externalScript']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $externalScript = $this->ExternalScripts->newEntity();
        if ($this->request->is('post')) {
            $externalScript = $this->ExternalScripts->patchEntity($externalScript, $this->request->data);
            if ($this->ExternalScripts->save($externalScript)) {
                $this->Flash->success(__('The external script has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The external script could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('externalScript'));
        $this->set('_serialize', ['externalScript']);
    }

    /**
     * Edit method
     *
     * @param string|null $id External Script id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $externalScript = $this->ExternalScripts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $externalScript = $this->ExternalScripts->patchEntity($externalScript, $this->request->data);
            if ($this->ExternalScripts->save($externalScript)) {
                $this->Flash->success(__('The external script has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The external script could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('externalScript'));
        $this->set('_serialize', ['externalScript']);
    }

    /**
     * Delete method
     *
     * @param string|null $id External Script id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $externalScript = $this->ExternalScripts->get($id);
        if ($this->ExternalScripts->delete($externalScript)) {
            $this->Flash->success(__('The external script has been deleted.'));
        } else {
            $this->Flash->error(__('The external script could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
