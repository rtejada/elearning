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

        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');
        $conditions = array();

        if (isset($this->params['data']['submit'])) {
            if (!empty($this->params['data']['Basica']['asignaturas'])) {
                $txtdsc = $this->params['data']['Basica']['asignaturas'];
                $conditions[] = array('TrabajosEnunciado.asignatura_id =' => $txtdsc);
            }


        }

        $asignaturas = $this->TrabajosEnunciado->Asignatura->find("list");
        $this->set('asignaturas', $asignaturas);


        $this->restringirAlumno();
        $usuario_id = $this->Auth->user('id');
        $conditions[] = array('TrabajosEnunciado.usuario_id =' => $usuario_id);

        $this->paginate = array(
            'limit' => 20,
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
			throw new NotFoundException(__('Invalid trabajos enunciado'));
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
				$this->Session->setFlash(__('The trabajos enunciado has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajos enunciado could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid trabajos enunciado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TrabajosEnunciado->save($this->request->data)) {
				$this->Session->setFlash(__('The trabajos enunciado has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajos enunciado could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid trabajos enunciado'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TrabajosEnunciado->delete()) {
			$this->Session->setFlash(__('Trabajos enunciado deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Trabajos enunciado was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
