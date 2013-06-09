<?php
App::uses('AppController', 'Controller');
/**
 * TrabajosEnunciados Controller
 *
 * @property TrabajosEnunciado $TrabajosEnunciado
 */
class TrabajosEnunciadosController extends AppController {

    public $components = array('DescargasFicheros');
/**
 * index method
 *
 * @return void
 */
	public function index() {

        $this->restringirAlumno();
        $conditions = array();

        if (isset($this->params['data']['submit'])) {
            if (!empty($this->params['data']['Basica']['dsc'])) {
                $txtdsc = $this->params['data']['Basica']['dsc'];
                $conditions[] = array('TrabajosEnunciado.dsc LIKE' => '%'.$txtdsc.'%');
            }


        }

        $usuario_id = $this->Auth->user('id');
        $conditions[] = array('TrabajosEnunciado.usuario_id =' => $usuario_id);

        $this->paginate = array(
            'limit' => 5,
            'conditions' => $conditions	);

		$this->TrabajosEnunciado->recursive = 0;
		$this->set('trabajosEnunciados', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TrabajosEnunciado->exists($id)) {
			throw new NotFoundException(__('Trabajo inválido.'));
		}
		$options = array('conditions' => array('TrabajosEnunciado.' . $this->TrabajosEnunciado->primaryKey => $id));
		$this->set('trabajosEnunciado', $this->TrabajosEnunciado->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->restringirAlumno();
		if ($this->request->is('post')) {
			$this->TrabajosEnunciado->create();
			if ($this->TrabajosEnunciado->save($this->request->data)) {
				$this->Session->setFlash(__('El trabajo se ha guardado correctamente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Trabajo no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		}
        $usuario_id = $this->Auth->user('id');
		$asignaturas = $this->TrabajosEnunciado->Asignatura->find('list', array('conditions' => array('Asignatura.usuario_id' => $usuario_id)));
		$this->set(compact('asignaturas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->restringirAlumno();
		if (!$this->TrabajosEnunciado->exists($id)) {
			throw new NotFoundException(__('Trabajo Inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TrabajosEnunciado->save($this->request->data)) {
				$this->Session->setFlash(__('El trabajo se ha guardado correctamente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El trabajo no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('TrabajosEnunciado.' . $this->TrabajosEnunciado->primaryKey => $id));
			$this->request->data = $this->TrabajosEnunciado->find('first', $options);
		}
        $usuario_id = $this->Auth->user('id');
        $asignaturas = $this->TrabajosEnunciado->Asignatura->find('list', array('conditions' => array('Asignatura.usuario_id' => $usuario_id)));
        $this->set(compact('asignaturas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
        $this->restringirAlumno();
        $this->TrabajosEnunciado->id = $id;
		if (!$this->TrabajosEnunciado->exists()) {
			throw new NotFoundException(__('Trabajo Inválido.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TrabajosEnunciado->delete()) {
			$this->Session->setFlash(__('Trabajo Eliminado.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El trabajo no se ha eliminado.'));
		$this->redirect(array('action' => 'index'));
	}
}
