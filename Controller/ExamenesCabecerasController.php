<?php
App::uses('AppController', 'Controller');
/**
 * ExamenesCabeceras Controller
 *
 * @property ExamenesCabecera $ExamenesCabecera
 */
class ExamenesCabecerasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ExamenesCabecera->recursive = 0;
		$this->set('examenesCabeceras', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ExamenesCabecera->id = $id;
		if (!$this->ExamenesCabecera->exists()) {
			throw new NotFoundException(__('Invalid examenes cabecera'));
		}
		$this->set('examenesCabecera', $this->ExamenesCabecera->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ExamenesCabecera->create();
			if ($this->ExamenesCabecera->save($this->request->data)) {
				$this->Session->setFlash(__('The examenes cabecera has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The examenes cabecera could not be saved. Please, try again.'));
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
		$this->ExamenesCabecera->id = $id;
		if (!$this->ExamenesCabecera->exists()) {
			throw new NotFoundException(__('Invalid examenes cabecera'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ExamenesCabecera->save($this->request->data)) {
				$this->Session->setFlash(__('The examenes cabecera has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The examenes cabecera could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ExamenesCabecera->read(null, $id);
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
		$this->ExamenesCabecera->id = $id;
		if (!$this->ExamenesCabecera->exists()) {
			throw new NotFoundException(__('Invalid examenes cabecera'));
		}
		if ($this->ExamenesCabecera->delete()) {
			$this->Session->setFlash(__('Examenes cabecera deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Examenes cabecera was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
