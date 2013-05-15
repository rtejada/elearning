<?php
App::uses('AppController', 'Controller');
/**
 * Contenidoss Controller
 *
 * @property Contenido $Contenido
 */
class ContenidosController extends AppController {

/**
 * index method
 *
 * @return void
 */

    public $components = array('DescargasFicheros');

	public function index() {

        $this->paginate = array(
            'conditions' => array('Recipe.title LIKE' => 'a%'),
            'limit' => 10
        );

		$this->Contenido->recursive = 1;
		$this->set('contenidos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Contenido->id = $id;
		if (!$this->Contenido->exists()) {
			throw new NotFoundException(__('Invalid contenidos temario'));
		}

		$this->set('contenido', $this->Contenido->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->restringirAlumno();
		if ($this->request->is('post')) {
			$this->Contenido->create();
			if ($this->Contenido->save($this->request->data)) {
				$this->Session->setFlash(__('The contenidos temario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contenidos temario could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Contenido->Usuario->find('list');
		$asignaturas = $this->Contenido->Asignatura->find('list');
		$this->set(compact('usuarios', 'asignaturas'));
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
		$this->Contenido->id = $id;
		if (!$this->Contenido->exists()) {
			throw new NotFoundException(__('Invalid contenidos temario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contenido->save($this->request->data)) {
				$this->Session->setFlash(__('The contenidos temario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contenidos temario could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Contenido->read(null, $id);
		}
		$usuarios = $this->Contenido->Usuario->find('list');
		$asignaturas = $this->Contenido->Asignatura->find('list');
		$this->set(compact('usuarios', 'asignaturas'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
        $this->restringirAlumno();
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Contenido->id = $id;
		if (!$this->Contenido->exists()) {
			throw new NotFoundException(__('Invalid contenidos temario'));
		}
		if ($this->Contenido->delete()) {
			$this->Session->setFlash(__('Contenidos temario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contenidos temario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
