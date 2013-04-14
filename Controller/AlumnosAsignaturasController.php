<?php
App::uses('AppController', 'Controller');
/**
 * AlumnosAsignaturas Controller
 *
 * @property AlumnosAsignatura $AlumnosAsignatura
 */
class AlumnosAsignaturasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AlumnosAsignatura->recursive = 0;
		$this->set('alumnosAsignaturas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AlumnosAsignatura->exists($id)) {
			throw new NotFoundException(__('Invalid alumnos asignatura'));
		}
		$options = array('conditions' => array('AlumnosAsignatura.' . $this->AlumnosAsignatura->primaryKey => $id));
		$this->set('alumnosAsignatura', $this->AlumnosAsignatura->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AlumnosAsignatura->create();
			if ($this->AlumnosAsignatura->save($this->request->data)) {
				$this->Session->setFlash(__('The alumnos asignatura has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alumnos asignatura could not be saved. Please, try again.'));
			}
		}
        $usuarios = $this->AlumnosAsignatura->Usuario->find('list', array('conditions' => array('Usuario.tipo' => 1)));
		$asignaturas = $this->AlumnosAsignatura->Asignatura->find('list');
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
		if (!$this->AlumnosAsignatura->exists($id)) {
			throw new NotFoundException(__('Invalid alumnos asignatura'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AlumnosAsignatura->save($this->request->data)) {
				$this->Session->setFlash(__('The alumnos asignatura has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alumnos asignatura could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AlumnosAsignatura.' . $this->AlumnosAsignatura->primaryKey => $id));
			$this->request->data = $this->AlumnosAsignatura->find('first', $options);
		}
        $usuarios = $this->AlumnosAsignatura->Usuario->find('list', array('conditions' => array('Usuario.tipo' => 1)));

		$asignaturas = $this->AlumnosAsignatura->Asignatura->find('list');
		$this->set(compact('usuarios', 'asignaturas'));
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
		$this->AlumnosAsignatura->id = $id;
		if (!$this->AlumnosAsignatura->exists()) {
			throw new NotFoundException(__('Invalid alumnos asignatura'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AlumnosAsignatura->delete()) {
			$this->Session->setFlash(__('Alumnos asignatura deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Alumnos asignatura was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
