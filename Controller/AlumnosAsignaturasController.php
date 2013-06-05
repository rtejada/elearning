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

                    $alumnos = $this->_obtenerComboAlumnos();
                    $this->set('asignaturas', $asignaturas);
                    $this->set('alumnos', $alumnos);
                    break;
        }

        $this->paginate = array(
            'limit' => 10,
            'order' => array('AlumnosAsignatura.dsc' => 'ASC'),
            'conditions' => $conditions	);

		$this->AlumnosAsignatura->recursive = 0;
		$this->set('alumnosAsignaturas', $this->paginate());
        $this->set('tipo', $tipo);
	}

    /**
     * @return array
     */
    public function obtenerAlumnos()
    {
        $alumnos = $this->AlumnosAsignatura->Usuario->find("list", array('conditions' => array('Usuario.tipo' => 1)));
        return $alumnos;
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
			throw new NotFoundException(__('El alumno no tiene asignado la asignatura'));
		}
		$this->set('alumnosAsignatura', $this->AlumnosAsignatura->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

        $this->restringirExceptoAdmin();

		if ($this->request->is('post')) {
			$this->AlumnosAsignatura->create();
			if ($this->AlumnosAsignatura->save($this->request->data)) {
				$this->Session->setFlash(__('La asignatura para el alumno se ha guardado correctamente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('EL alumno y su asignatura no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		}
		$usuarios = $this->_obtenerComboAlumnos();
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

        $this->restringirExceptoAdmin();
		$this->AlumnosAsignatura->id = $id;
		if (!$this->AlumnosAsignatura->exists()) {
			throw new NotFoundException(__('El alumno no tiene asignado la asignatura'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AlumnosAsignatura->save($this->request->data)) {
				$this->Session->setFlash(__('La asignatura para el alumno se ha guardado correctamente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('EL alumno y su asignatura no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$this->request->data = $this->AlumnosAsignatura->read(null, $id);
		}

        $usuarios = $this->_obtenerComboAlumnos();
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
        $this->restringirExceptoAdmin();
		$this->AlumnosAsignatura->id = $id;
		if (!$this->AlumnosAsignatura->exists()) {
			throw new NotFoundException(__('El alumno no tiene asignado la asignatura'));
		}
		if ($this->AlumnosAsignatura->delete()) {
			$this->Session->setFlash(__('El alumno, asignatura eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El alumno, asignatura no se ha eliminado'));
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

        $asignaturas = $this->AlumnosAsignatura->find('list', array('fields' => 'AlumnosAsignatura.asignatura_id', 'conditions' => array('AlumnosAsignatura.usuario_id' => $usuario_id)));
        return $asignaturas;

    }

    /**
     * Comprueba que un alumno tiene asignada una asignatura. Devuelve
     * TRUE/FALSE
     *
     * @param $usuario_id           alumno
     * @param $asignatura_id        asignatura a comprobar
     * @return bool
     */
    public function comprobarAsignaturaAlumno($usuario_id, $asignatura_id) {
        $asignaturas = $this->AlumnosAsignatura->find('count', array('fields' => 'AlumnosAsignatura.id', 'conditions' => array('AlumnosAsignatura.usuario_id' => $usuario_id, 'AlumnosAsignatura.asignatura_id' => $asignatura_id)));
        if ($asignaturas>0) {
            $ret = TRUE;
        } else {
            $ret = FALSE;
        }
        return $ret;
    }


    public function isAuthorized($user) {
        return true;
    }

    /**
     * Obtiene un array para llenar el combo de alumnos (con nombre y apellidos)
     * @return array
     */
    private function _obtenerComboAlumnos() {
        $usuarios = $this->AlumnosAsignatura->Usuario->find('all', array('fields'=> array('Usuario.id', 'Usuario.nombre', 'Usuario.apellidos'), 'conditions' => array('Usuario.tipo' => 1)));
        $usuarios_list = array();
        foreach($usuarios as $usuario) {
            $usuarios_list[$usuario['Usuario']['id']] = $usuario['Usuario']['nombre'].' '.$usuario['Usuario']['apellidos'];
        }

        return $usuarios_list;
    }
}
