<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'Asignaturas');
App::import('Controller', 'AlumnosAsignaturas');
/**
 * Contenidos Controller
 *
 * @property Contenido $Contenido
 */
class ContenidosController extends AppController {

/**
 * index method
 *
 * @return void
 */

    public $components = array('DescargasFicheros');

    /**
     * Este método se usará sólo para el profesor
     */
    public function index() {

        $this->restringirAlumno();

        $this->paginate = array(
            'conditions' => $this->_obtenerCondicionAsignaturasProfesor(),
            'limit' => 10
        );

        $asignaturas = $this->_obtenerListaAsignaturasProfesor();
		$this->Contenido->recursive = 1;
        $this->set('asignaturas', $asignaturas);
		$this->set('contenidos', $this->paginate());


	}

    /**
     * Método temario. Este método se usará por los alumnos para visualizar el contenido.
     * Usa la misma view que index.
     *
     * @param null $asignatura_id
     * @return void
     */
    public function temario($asignatura_id = NULL) {

        if ($asignatura_id == NULL) {
            throw new NotFoundException(__('Asignatura incorrecta'));
        }

        $user_id = $this->Auth->user('id');
        $AlumnosAsignaturas = new AlumnosAsignaturasController();
        //si el alumno no tiene asignada la asignatura que se pasa como parámetro,
        //dar error.
        if($AlumnosAsignaturas->comprobarAsignaturaAlumno($user_id, $asignatura_id)==FALSE) {
            $this->restringirAlumno();
        }

        $this->paginate = array(
            'conditions' => array('Contenido.asignatura_id' => $asignatura_id),
            'limit' => 10
        );

        $this->Contenido->recursive = 1;
        $this->set('contenidos', $this->paginate());
        //usa la misma view que método index.
        $this->render('index');
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Contenido->id = $id;
		if (!$this->Contenido->exists()) {
			throw new NotFoundException(__('Invalid contenidos temario'));
		}

		$this->set('contenido', $this->Contenido->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->restringirAlumno();
		if ($this->request->is('post')) {
			$this->Contenido->create();
			if ($this->Contenido->save($this->request->data)) {
				$this->Session->setFlash(__('The contenidos temario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contenidos temario could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Contenido->Usuario->find('list');
		$asignaturas = $this->Contenido->Asignatura->find('list');
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
		$this->Contenido->id = $id;
		if (!$this->Contenido->exists()) {
			throw new NotFoundException(__('Invalid contenidos temario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contenido->save($this->request->data)) {
				$this->Session->setFlash(__('The contenidos temario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contenidos temario could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Contenido->read(null, $id);
		}
		$usuarios = $this->Contenido->Usuario->find('list');
		$asignaturas = $this->Contenido->Asignatura->find('list');
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
        $this->restringirAlumno();
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Contenido->id = $id;
		if (!$this->Contenido->exists()) {
			throw new NotFoundException(__('Invalid contenidos temario'));
		}
		if ($this->Contenido->delete()) {
			$this->Session->setFlash(__('Contenidos temario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contenidos temario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

    /**
     * Obtiene las asignaturas asignadas al profesor, y genera el array
     * con la condición
     *
     * @return array
     */
    private function _obtenerCondicionAsignaturasProfesor() {
        $user_id = $this->Auth->user('id');
        $Asignaturas = new AsignaturasController();
        $asignaturas_profesor = $Asignaturas->obtenerAsignaturasProfesor($user_id, 'list');
        $conditions = array();
        $conditions[] = array('Contenido.asignatura_id' => $asignaturas_profesor);

        return $conditions;
    }

    /**
     * Obtiene las asignaturas asignadas al profesor en formato list
     * para usar con los combos
     *
     * @return array
     */
    private function _obtenerListaAsignaturasProfesor() {
        $user_id = $this->Auth->user('id');
        $Asignaturas = new AsignaturasController();
        $asignaturas_profesor = $Asignaturas->obtenerAsignaturasProfesor($user_id, 'list');

        return $asignaturas_profesor;
    }


}
