<?php
App::uses('AppController', 'Controller');
/**
 * TrabajosEnunciados Controller
 *
 * @property TrabajosEnunciado $TrabajosEnunciado
 */
class TrabajosEnunciadosController extends AppController {


    // TODO solo permitir agregar trabajos para las asignaturas de cada profesor
    // (filtrar el combo para que saque sólo las asignaturas de cada profesor).

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TrabajosEnunciado->recursive = 0;
		$this->set('trabajosEnunciados', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TrabajosEnunciado->exists($id)) {
			throw new NotFoundException(__('Invalid trabajos enunciado'));
		}
		$options = array('conditions' => array('TrabajosEnunciado.' . $this->TrabajosEnunciado->primaryKey => $id));
		$this->set('trabajosEnunciado', $this->TrabajosEnunciado->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TrabajosEnunciado->create();
			if ($this->TrabajosEnunciado->save($this->request->data)) {
				$this->Session->setFlash(__('The trabajos enunciado has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajos enunciado could not be saved. Please, try again.'));
			}
		}
		$asignaturas = $this->TrabajosEnunciado->Asignatura->find('list');
		$this->set(compact('asignaturas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TrabajosEnunciado->exists($id)) {
			throw new NotFoundException(__('Invalid trabajos enunciado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TrabajosEnunciado->save($this->request->data)) {
				$this->Session->setFlash(__('The trabajos enunciado has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajos enunciado could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TrabajosEnunciado.' . $this->TrabajosEnunciado->primaryKey => $id));
			$this->request->data = $this->TrabajosEnunciado->find('first', $options);
		}
		$asignaturas = $this->TrabajosEnunciado->Asignatura->find('list');
		$this->set(compact('asignaturas'));
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
		$this->TrabajosEnunciado->id = $id;
		if (!$this->TrabajosEnunciado->exists()) {
			throw new NotFoundException(__('Invalid trabajos enunciado'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TrabajosEnunciado->delete()) {
			$this->Session->setFlash(__('Trabajos enunciado deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Trabajos enunciado was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
