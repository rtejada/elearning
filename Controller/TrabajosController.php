<?php
App::uses('AppController', 'Controller');
/**
 * Trabajos Controller
 *
 * @property Trabajo $Trabajo
 */
class TrabajosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Trabajo->recursive = 0;
		$this->set('trabajos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Trabajo->exists($id)) {
			throw new NotFoundException(__('Invalid trabajo'));
		}
		$options = array('conditions' => array('Trabajo.' . $this->Trabajo->primaryKey => $id));
		$this->set('trabajo', $this->Trabajo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Trabajo->create();
			if ($this->Trabajo->save($this->request->data)) {
				$this->Session->setFlash(__('The trabajo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajo could not be saved. Please, try again.'));
			}
		}

		$trabajosEnunciados = $this->Trabajo->TrabajosEnunciado->find('list');
		$usuarios = $this->Trabajo->Usuario->find('list');
		$this->set(compact('trabajosEnunciados', 'usuarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Trabajo->exists($id)) {
			throw new NotFoundException(__('Invalid trabajo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Trabajo->save($this->request->data)) {
				$this->Session->setFlash(__('The trabajo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Trabajo.' . $this->Trabajo->primaryKey => $id));
			$this->request->data = $this->Trabajo->find('first', $options);
		}
		//$asignaturas = $this->Trabajo->Asignatura->find('list');
		$trabajosEnunciados = $this->Trabajo->TrabajosEnunciado->find('list');
		$usuarios = $this->Trabajo->Usuario->find('list');
		$this->set(compact('trabajosEnunciados', 'usuarios'));

        $this->loadModel("Nota");

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
		$this->Trabajo->id = $id;
		if (!$this->Trabajo->exists()) {
			throw new NotFoundException(__('Invalid trabajo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Trabajo->delete()) {
			$this->Session->setFlash(__('Trabajo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Trabajo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
