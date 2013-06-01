<?php
App::uses('AppController', 'Controller');
/**
 * ExamenesCabeceras Controller
 *
 * @property ExamenesCabecera $ExamenesCabecera
 */
class ExamenesCabecerasController extends AppController {

    public $components = array('DescargasFicheros');

/**
 * index method
 *
 * @return void
 *
 *
 */
    public $helpers =  array('Session', 'Time');

	public function index() {
        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');
        $conditions = array();

        if (isset($this->params['data']['submit'])) {
            if (!empty($this->params['data']['Basica']['asignaturas'])) {
                $txtdsc = $this->params['data']['Basica']['asignaturas'];
                $conditions[] = array('ExamenesCabecera.asignatura_id =' => $txtdsc);
            }
        }
        $this->paginate = array(
            'limit' => 20,
            'conditions' => $conditions	);

        $asignaturas = $this->ExamenesCabecera->Asignatura->find("list");
        $this->set('asignaturas', $asignaturas);
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
			throw new NotFoundException(__('Exámen inválido'));
		}
		$this->set('examenesCabecera', $this->ExamenesCabecera->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

        $this->restringirAlumno();
		if ($this->request->is('post')) {
			$this->ExamenesCabecera->create();
			if ($this->ExamenesCabecera->save($this->request->data)) {
				$this->Session->setFlash(__('El exámen se ha guardado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El exámen no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		}

        $usuario_id = $this->Auth->user('id');
        $asignaturas = $this->ExamenesCabecera->Asignatura->find('list', array('conditions' => array('Asignatura.usuario_id' => $usuario_id)));
        $this->set('asignaturas', $asignaturas);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {

        $this->restringirAlumno();
		$this->ExamenesCabecera->id = $id;
		if (!$this->ExamenesCabecera->exists()) {
			throw new NotFoundException(__('Exámen inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ExamenesCabecera->save($this->request->data)) {
				$this->Session->setFlash(__('El examen se ha guardado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El examen no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$this->request->data = $this->ExamenesCabecera->read(null, $id);
		}
        $usuario_id = $this->Auth->user('id');
        $asignaturas = $this->ExamenesCabecera->Asignatura->find('list', array('conditions' => array('Asignatura.usuario_id' => $usuario_id)));
        $this->set('asignaturas', $asignaturas);
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

        $this->restringirAlumno();
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ExamenesCabecera->id = $id;
		if (!$this->ExamenesCabecera->exists()) {
			throw new NotFoundException(__('Exámen inválido'));
		}
		if ($this->ExamenesCabecera->delete()) {
			$this->Session->setFlash(__('Exámen eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El exámen no se ha eliminado'));
		$this->redirect(array('action' => 'index'));
	}
}
