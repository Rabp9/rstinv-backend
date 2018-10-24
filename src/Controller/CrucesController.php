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
        $cruces = $this->Cruces->find()->where(['estado_id' => 1]);

        $this->set(compact('cruces'));
        $this->set('_serialize', ['cruces']);

        $estado_id = $this->request->getQuery('estado_id');
        $items_per_page = $this->request->getQuery('items_per_page');
        
        $this->paginate = [
            'limit' => $items_per_page
        ];
        
        $query = $this->Cruces->find();
        if ($estado_id) {
            $query->where(['cruces.estado_id' => $estado_id]);
        }
        
        $count = $query->count();
        $cruces = $this->paginate($query);
        $paginate = $this->request->getParam('paging')['Cruces'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('cruces', 'pagination', 'count'));
        $this->set('_serialize', ['cruces', 'pagination', 'count']);
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

    public function search($texto = null) {
        $texto = $this->request->getParam('texto');
        $cruce = $this->Cruces->find()
            ->contain(['Cruces'])
            ->where(['OR' => [
                'cruces.codigoCruce' => $texto,
                'cruces.descripcion' => $texto
            ]])
            ->first();
        
        $this->set(compact('cruce'));
        $this->set('_serialize', ['cruce']);
    }
    
    public function searchMany($search = null) {
        $servicio = $this->request->getParam('search');
        $servicios = $this->Servicios->find()
            ->where([
                'OR' => [
                    'cruces.codigoCruce LIKE' => '%' . $servicio . '%',
                    'cruces.descripcion LIKE' => '%' . $servicio . '%'
                ],
                'cruces.estado_id' => 1
            ]);
        
        $this->set(compact('cruces'));
        $this->set('_serialize', ['cruces']);
    }
}
