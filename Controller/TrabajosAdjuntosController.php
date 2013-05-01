<?php
App::uses('AppController', 'Controller');
/**
 * TrabajosAdjuntos Controller
 *
 * @property TrabajosAdjunto $TrabajosAdjunto
 */
class TrabajosAdjuntosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TrabajosAdjunto->recursive = 0;
		$this->set('trabajosAdjuntos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TrabajosAdjunto->exists($id)) {
			throw new NotFoundException(__('Invalid trabajos adjunto'));
		}
		$options = array('conditions' => array('TrabajosAdjunto.' . $this->TrabajosAdjunto->primaryKey => $id));
		$this->set('trabajosAdjunto', $this->TrabajosAdjunto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TrabajosAdjunto->create();
			if ($this->TrabajosAdjunto->save($this->request->data)) {
				$this->Session->setFlash(__('The trabajos adjunto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajos adjunto could not be saved. Please, try again.'));
			}
		}
		$trabajos = $this->TrabajosAdjunto->Trabajo->find('list');
		$this->set(compact('trabajos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TrabajosAdjunto->exists($id)) {
			throw new NotFoundException(__('Invalid trabajos adjunto'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TrabajosAdjunto->save($this->request->data)) {
				$this->Session->setFlash(__('The trabajos adjunto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajos adjunto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TrabajosAdjunto.' . $this->TrabajosAdjunto->primaryKey => $id));
			$this->request->data = $this->TrabajosAdjunto->find('first', $options);
		}
		$trabajos = $this->TrabajosAdjunto->Trabajo->find('list');
		$this->set(compact('trabajos'));
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
		$this->TrabajosAdjunto->id = $id;
		if (!$this->TrabajosAdjunto->exists()) {
			throw new NotFoundException(__('Invalid trabajos adjunto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TrabajosAdjunto->delete()) {
			$this->Session->setFlash(__('Trabajos adjunto deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Trabajos adjunto was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
