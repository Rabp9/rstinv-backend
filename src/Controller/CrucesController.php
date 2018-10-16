<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cruces Controller
 *
 * @property \App\Model\Table\CrucesTable $Cruces
 *
 * @method \App\Model\Entity\Cruce[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CrucesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $cruces = $this->Cruces->find();

        $this->set(compact('cruces'));
        $this->set('_serialize', ['cruces']);
    }

    /**
     * View method
     *
     * @param string|null $id Cruce id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cruce = $this->Cruces->get($id, [
            'contain' => ['DetalleAntenas', 'DetallePostes', 'DetalleSemaforos', 'DetalleSwitches', 'Reguladores']
        ]);

        $this->set('cruce', $cruce);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        if ($this->request->is('post')) {
            $cruce = $this->Cruces->newEntity($this->request->getData());
            
            if ($this->Cruces->save($cruce)) {
                $code = 200;
                $message = 'El cruce fue guardado correctamente';
            } else {
                $errors = $cruce->errors();
                $code = 500;
                $message = 'El cruce no fue guardado correctamente';
            }
        }
        $this->set(compact('cruce', 'message', 'code', 'errors'));
        $this->set('_serialize', ['cruce', 'message', 'code', 'errors']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cruce id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cruce = $this->Cruces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cruce = $this->Cruces->patchEntity($cruce, $this->request->getData());
            if ($this->Cruces->save($cruce)) {
                $this->Flash->success(__('The cruce has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cruce could not be saved. Please, try again.'));
        }
        $this->set(compact('cruce'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cruce id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cruce = $this->Cruces->get($id);
        if ($this->Cruces->delete($cruce)) {
            $this->Flash->success(__('The cruce has been deleted.'));
        } else {
            $this->Flash->error(__('The cruce could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
