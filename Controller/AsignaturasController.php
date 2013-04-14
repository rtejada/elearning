<?php
App::uses('AppController', 'Controller');
/**
 * Asignaturas Controller
 *
 * @property Asignatura $Asignatura
 */
class AsignaturasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {

        $conditions = array();

        if (isset($this->params['data']['submit'])) {

        if (!empty($this->params['data']['Basica']['dsc'])) {
            $txtdsc = $this->params['data']['Basica']['dsc'];
            $conditions[] = array('Asignatura.dsc LIKE' => '%'.$txtdsc.'%');
        }

        $this->paginate = array(
        'limit' => 20,
        'conditions' => $conditions	);

        }

		$this->Asignatura->recursive = 0;
		$this->set('asignaturas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Asignatura->exists($id)) {
			throw new NotFoundException(__('Invalid asignatura'));
		}
		$options = array('conditions' => array('Asignatura.' . $this->Asignatura->primaryKey => $id));
		$this->set('asignatura', $this->Asignatura->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Asignatura->create();
			if ($this->Asignatura->save($this->request->data)) {
				$this->Session->setFlash(__('The asignatura has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asignatura could not be saved. Please, try again.'));
			}
		}
		$cursos = $this->Asignatura->Curso->find('list');
		$usuarios = $this->Asignatura->Usuario->find('list', array('conditions' => array('Usuario.tipo' => 2)));
		$this->set(compact('cursos', 'usuarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Asignatura->exists($id)) {
			throw new NotFoundException(__('Invalid asignatura'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Asignatura->save($this->request->data)) {
				$this->Session->setFlash(__('The asignatura has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asignatura could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Asignatura.' . $this->Asignatura->primaryKey => $id));
			$this->request->data = $this->Asignatura->find('first', $options);
		}
		$cursos = $this->Asignatura->Curso->find('list');
        $usuarios = $this->Asignatura->Usuario->find('list', array('conditions' => array('Usuario.tipo' => 2)));
		$this->set(compact('cursos', 'usuarios'));
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
		$this->Asignatura->id = $id;
		if (!$this->Asignatura->exists()) {
			throw new NotFoundException(__('Invalid asignatura'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Asignatura->delete()) {
			$this->Session->setFlash(__('Asignatura deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Asignatura was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
