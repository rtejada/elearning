<?php
App::uses('AppController', 'Controller');
/**
 * Modulos Controller
 *
 * @property Modulo $Modulo
 */
class ModulosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Modulo->recursive = 0;
		$this->set('modulos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Modulo->exists($id)) {
			throw new NotFoundException(__('Invalid modulo'));
		}
		$options = array('conditions' => array('Modulo.' . $this->Modulo->primaryKey => $id));
		$this->set('modulo', $this->Modulo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Modulo->create();
			if ($this->Modulo->save($this->request->data)) {
				$this->Session->setFlash(__('The modulo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modulo could not be saved. Please, try again.'));
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
		if (!$this->Modulo->exists($id)) {
			throw new NotFoundException(__('Invalid modulo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Modulo->save($this->request->data)) {
				$this->Session->setFlash(__('The modulo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modulo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Modulo.' . $this->Modulo->primaryKey => $id));
			$this->request->data = $this->Modulo->find('first', $options);
		}
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
		$this->Modulo->id = $id;
		if (!$this->Modulo->exists()) {
			throw new NotFoundException(__('Invalid modulo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Modulo->delete()) {
			$this->Session->setFlash(__('Modulo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Modulo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
