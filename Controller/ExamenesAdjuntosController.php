<?php
App::uses('AppController', 'Controller');
/**
 * ExamenesAdjuntos Controller
 *
 * @property ExamenesAdjunto $ExamenesAdjunto
 */
class ExamenesAdjuntosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ExamenesAdjunto->recursive = 0;
		$this->set('examenesAdjuntos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ExamenesAdjunto->id = $id;
		if (!$this->ExamenesAdjunto->exists()) {
			throw new NotFoundException(__('Invalid examenes adjunto'));
		}
		$this->set('examenesAdjunto', $this->ExamenesAdjunto->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ExamenesAdjunto->create();
			if ($this->ExamenesAdjunto->save($this->request->data)) {
				$this->Session->setFlash(__('The examenes adjunto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The examenes adjunto could not be saved. Please, try again.'));
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
		$this->ExamenesAdjunto->id = $id;
		if (!$this->ExamenesAdjunto->exists()) {
			throw new NotFoundException(__('Invalid examenes adjunto'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ExamenesAdjunto->save($this->request->data)) {
				$this->Session->setFlash(__('The examenes adjunto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The examenes adjunto could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ExamenesAdjunto->read(null, $id);
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
		$this->ExamenesAdjunto->id = $id;
		if (!$this->ExamenesAdjunto->exists()) {
			throw new NotFoundException(__('Invalid examenes adjunto'));
		}
		if ($this->ExamenesAdjunto->delete()) {
			$this->Session->setFlash(__('Examenes adjunto deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Examenes adjunto was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
