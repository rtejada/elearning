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
			throw new NotFoundException(__('Módulo Inválido'));
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
				$this->Session->setFlash(__('El módulo ha sido guardado de forma correcta'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El módulo no se pudo guardar. Por favor, inténtelo de nuevo.'));
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
			throw new NotFoundException(__('Módulo Inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Modulo->save($this->request->data)) {
				$this->Session->setFlash(__('El módulo ha sido guardado de forma correcta'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Módulo no se pudo guardar. Por favor, inténtelo de nuevo.'));
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
			throw new NotFoundException(__('Módulo Inválido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Modulo->delete()) {
			$this->Session->setFlash(__('Módulo Eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('EL Módulo no ha sido eliminada'));
		$this->redirect(array('action' => 'index'));
	}
}
