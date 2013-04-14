<?php
App::uses('AppController', 'Controller');
/**
 * ExamenesDetalles Controller
 *
 * @property ExamenesDetalle $ExamenesDetalle
 */
class ExamenesDetallesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ExamenesDetalle->recursive = 0;
		$this->set('examenesDetalles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ExamenesDetalle->id = $id;
		if (!$this->ExamenesDetalle->exists()) {
			throw new NotFoundException(__('Invalid examenes detalle'));
		}
		$this->set('examenesDetalle', $this->ExamenesDetalle->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ExamenesDetalle->create();
			if ($this->ExamenesDetalle->save($this->request->data)) {
				$this->Session->setFlash(__('The examenes detalle has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The examenes detalle could not be saved. Please, try again.'));
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
		$this->ExamenesDetalle->id = $id;
		if (!$this->ExamenesDetalle->exists()) {
			throw new NotFoundException(__('Invalid examenes detalle'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ExamenesDetalle->save($this->request->data)) {
				$this->Session->setFlash(__('The examenes detalle has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The examenes detalle could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ExamenesDetalle->read(null, $id);
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
		$this->ExamenesDetalle->id = $id;
		if (!$this->ExamenesDetalle->exists()) {
			throw new NotFoundException(__('Invalid examenes detalle'));
		}
		if ($this->ExamenesDetalle->delete()) {
			$this->Session->setFlash(__('Examenes detalle deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Examenes detalle was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
