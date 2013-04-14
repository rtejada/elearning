<?php
App::uses('AppController', 'Controller');
/**
 * ContenidosTemarios Controller
 *
 * @property ContenidosTemario $ContenidosTemario
 */
class ContenidosTemariosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ContenidosTemario->recursive = 0;
		$this->set('contenidosTemarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ContenidosTemario->id = $id;
		if (!$this->ContenidosTemario->exists()) {
			throw new NotFoundException(__('Invalid contenidos temario'));
		}
		$this->set('contenidosTemario', $this->ContenidosTemario->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ContenidosTemario->create();
			if ($this->ContenidosTemario->save($this->request->data)) {
				$this->Session->setFlash(__('The contenidos temario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contenidos temario could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ContenidosTemario->id = $id;
		if (!$this->ContenidosTemario->exists()) {
			throw new NotFoundException(__('Invalid contenidos temario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ContenidosTemario->save($this->request->data)) {
				$this->Session->setFlash(__('The contenidos temario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contenidos temario could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ContenidosTemario->read(null, $id);
		}
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
		$this->ContenidosTemario->id = $id;
		if (!$this->ContenidosTemario->exists()) {
			throw new NotFoundException(__('Invalid contenidos temario'));
		}
		if ($this->ContenidosTemario->delete()) {
			$this->Session->setFlash(__('Contenidos temario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contenidos temario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
