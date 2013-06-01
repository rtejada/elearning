<?php
App::uses('AppController', 'Controller');
/**
 * Cursos Controller
 *
 * @property Curso $Curso
 */
class CursosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->restringirExceptoAdmin();
		$this->Curso->recursive = 0;
		$this->set('cursos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Curso->exists($id)) {
			throw new NotFoundException(__('El curso es inválido'));
		}
		$options = array('conditions' => array('Curso.' . $this->Curso->primaryKey => $id));
		$this->set('curso', $this->Curso->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->restringirExceptoAdmin();
		if ($this->request->is('post')) {
			$this->Curso->create();
			if ($this->Curso->save($this->request->data)) {
				$this->Session->setFlash(__('El curso se ha guardado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El curso no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		}

        $modulos = $this->Curso->Modulo->find('list');
        $this->set(compact("modulos"));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->restringirExceptoAdmin();
		if (!$this->Curso->exists($id)) {
			throw new NotFoundException(__('El curso es inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Curso->save($this->request->data)) {
				$this->Session->setFlash(__('El curso se ha guardado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El curso no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Curso.' . $this->Curso->primaryKey => $id));
			$this->request->data = $this->Curso->find('first', $options);
		}

        $modulos = $this->Curso->Modulo->find('list');
        $this->set(compact("modulos"));
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
        $this->restringirExceptoAdmin();
		$this->Curso->id = $id;
		if (!$this->Curso->exists()) {
			throw new NotFoundException(__('El curso es inválido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Curso->delete()) {
			$this->Session->setFlash(__('Curso eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El curso no se ha eliminado'));
		$this->redirect(array('action' => 'index'));
	}
}
