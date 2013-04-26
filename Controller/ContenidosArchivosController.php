<?php
App::uses('AppController', 'Controller');
/**
 * ContenidosArchivos Controller
 *
 * @property ContenidosArchivo $ContenidosArchivo
 */
class ContenidosArchivosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ContenidosArchivo->recursive = 0;
		$this->set('contenidosArchivos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ContenidosArchivo->id = $id;
		if (!$this->ContenidosArchivo->exists()) {
			throw new NotFoundException(__('Invalid contenidos archivo'));
		}
		$this->set('contenidosArchivo', $this->ContenidosArchivo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ContenidosArchivo->create();
			if ($this->ContenidosArchivo->save($this->request->data)) {
				$this->Session->setFlash(__('The contenidos archivo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contenidos archivo could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->ContenidosArchivo->Usuario->find('list');
		$asignaturas = $this->ContenidosArchivo->Asignatura->find('list');
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
		$this->ContenidosArchivo->id = $id;
		if (!$this->ContenidosArchivo->exists()) {
			throw new NotFoundException(__('Invalid contenidos archivo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ContenidosArchivo->save($this->request->data)) {
				$this->Session->setFlash(__('The contenidos archivo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contenidos archivo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ContenidosArchivo->read(null, $id);
		}
		$usuarios = $this->ContenidosArchivo->Usuario->find('list');
		$asignaturas = $this->ContenidosArchivo->Asignatura->find('list');
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
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ContenidosArchivo->id = $id;
		if (!$this->ContenidosArchivo->exists()) {
			throw new NotFoundException(__('Invalid contenidos archivo'));
		}
		if ($this->ContenidosArchivo->delete()) {
			$this->Session->setFlash(__('Contenidos archivo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contenidos archivo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
