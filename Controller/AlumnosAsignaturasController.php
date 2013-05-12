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

        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');
        $conditions = array();

        switch($tipo) {
            case 1:
                    $conditions[] = array('AlumnosAsignatura.usuario_id =' => $user_id);
                    break;
            case 2:

                    if (isset($this->params['data']['submit'])) {
                        if (!empty($this->params['data']['Basica']['asignaturas'])) {
                            $txtdsc = $this->params['data']['Basica']['asignaturas'];
                            $conditions[] = array('AlumnosAsignatura.asignatura_id =' => $txtdsc);
                        }

                        if (!empty($this->params['data']['Basica']['alumnos'])) {
                            $txtdsc = $this->params['data']['Basica']['alumnos'];
                            $conditions[] = array('AlumnosAsignatura.usuario_id =' => $txtdsc);
                        }
                    }

                    $asignaturas = $this->AlumnosAsignatura->Asignatura->find("list");
                    $alumnos = $this->AlumnosAsignatura->Usuario->find("list", array('conditions' => array('Usuario.tipo' => 1)));
                    $this->set('asignaturas', $asignaturas);
                    $this->set('alumnos', $alumnos);
                    break;
        }

        $this->paginate = array(
            'limit' => 20,
            'order' => array('AlumnosAsignatura.dsc' => 'ASC'),
            'conditions' => $conditions	);

		$this->AlumnosAsignatura->recursive = 0;
		$this->set('alumnosAsignaturas', $this->paginate());
        $this->set('tipo', $tipo);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

        $this->restringirAlumno();
		$this->AlumnosAsignatura->id = $id;
		if (!$this->AlumnosAsignatura->exists()) {
			throw new NotFoundException(__('Invalid alumnos asignatura'));
		}
		$this->set('alumnosAsignatura', $this->AlumnosAsignatura->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

        $this->restringirAlumno();

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

        $this->restringirAlumno();
		$this->AlumnosAsignatura->id = $id;
		if (!$this->AlumnosAsignatura->exists()) {
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
			$this->request->data = $this->AlumnosAsignatura->read(null, $id);
		}
		$usuarios = $this->AlumnosAsignatura->Usuario->find('list', array('conditions' => array('Usuario.tipo' => 1)));
		$asignaturas = $this->AlumnosAsignatura->Asignatura->find('list');
		$this->set(compact('usuarios', 'asignaturas'));
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
        $this->restringirAlumno();
		$this->AlumnosAsignatura->id = $id;
		if (!$this->AlumnosAsignatura->exists()) {
			throw new NotFoundException(__('Invalid alumnos asignatura'));
		}
		if ($this->AlumnosAsignatura->delete()) {
			$this->Session->setFlash(__('Alumnos asignatura deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Alumnos asignatura was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

    /**
     * Obtiene las asignaturas del alumno y las devuelve en
     * un array.
     *
     * @param $usuario_id
     * @return mixed
     */
    public function obtenerAsignaturasAlumno($usuario_id) {

        $asignaturas = $this->AlumnosAsignatura->find('list', array('fields' => 'AlumnosAsignatura.id', 'conditions' => array('AlumnosAsignatura.usuario_id' => $usuario_id)));
        return $asignaturas;

    }


    public function isAuthorized($user) {
        return true;
    }
}
