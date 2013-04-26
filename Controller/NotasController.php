<?php
App::uses('AppController', 'Controller');
/**
 * Notas Controller
 *
 * @property Nota $Nota
 */
class NotasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Nota->recursive = 0;
		$this->set('notas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Nota->id = $id;
		if (!$this->Nota->exists()) {
			throw new NotFoundException(__('Invalid nota'));
		}
		$this->set('nota', $this->Nota->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Nota->create();
			if ($this->Nota->save($this->request->data)) {
				$this->Session->setFlash(__('The nota has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nota could not be saved. Please, try again.'));
			}
		}
		$alumnosAsignaturas = $this->Nota->AlumnosAsignatura->find('list');
		$this->set(compact('alumnosAsignaturas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Nota->id = $id;
		if (!$this->Nota->exists()) {
			throw new NotFoundException(__('Invalid nota'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Nota->save($this->request->data)) {
				$this->Session->setFlash(__('The nota has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nota could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Nota->read(null, $id);
		}
		$alumnosAsignaturas = $this->Nota->AlumnosAsignatura->find('list');
		$this->set(compact('alumnosAsignaturas'));
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
		$this->Nota->id = $id;
		if (!$this->Nota->exists()) {
			throw new NotFoundException(__('Invalid nota'));
		}
		if ($this->Nota->delete()) {
			$this->Session->setFlash(__('Nota deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Nota was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
