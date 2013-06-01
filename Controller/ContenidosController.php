<?php
App::uses('AppController', 'Controller');
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

        if (isset($this->params['data']['submit'])) {
            if (!empty($this->params['data']['Basica']['asignaturas'])) {
                $txtdsc = $this->params['data']['Basica']['asignaturas'];
                $conditions[] = array('Contenido.asignatura_id =' => $txtdsc);
            }
        } else {
                $conditions = $this->_obtenerCondicionAsignaturasProfesor('Contenido');
        }

        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 10,
            'order' => array(
                'Contenido.asignatura_id' => 'asc',
                'Contenido.orden' => 'asc',
                'Contenido.dsc' => 'asc',
            ));

        $asignaturas = $this->_obtenerListaAsignaturasProfesor();
		$this->Contenido->recursive = 1;
        $this->set('asignaturas', $asignaturas);
        $this->set('asignatura_id', NULL);
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
            'limit' => 10,
            'order' => array(
                'Contenido.orden' => 'asc',
                'Contenido.dsc' => 'asc',
            )
        );

        $asignaturas = $this->_obtenerListaAsignaturasProfesor();
        $this->Contenido->recursive = 1;
        $this->set('contenidos', $this->paginate());
        $this->set('asignatura_id', $asignatura_id);
        $this->set('asignaturas', $asignaturas);
        //usa la misma view que método index.
        $this->render('index');
    }

/**
 * view method
 *
 * Si el que visualiza es el alumno, deberá recibir el segundo parámetro
 * asignatura_id, para poder volver al action temario/asignatura_id
 *
 * @throws NotFoundException
 * @param string $id                id del documento a visualizar
 * @param string $asignatura_id     id de la asignatura para volver a su temario (alumnos)
 * @return void
 */
	public function view($id = null, $asignatura_id = NULL) {
		$this->Contenido->id = $id;
		if (!$this->Contenido->exists()) {
			throw new NotFoundException(__('El contenido es inválido'));
		}

        if($asignatura_id != NULL) {
            $this->set('asignatura_id', $asignatura_id);
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
				$this->Session->setFlash(__('El contenido se ha guardado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El contenido no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		}

		$usuarios = $this->Contenido->Usuario->find('list');
        $asignaturas = $this->_obtenerListaAsignaturasProfesor();
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
			throw new NotFoundException(__('Contenido inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contenido->save($this->request->data)) {
				$this->Session->setFlash(__('El contenido se ha guardado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El contenido no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$this->request->data = $this->Contenido->read(null, $id);
		}
		$usuarios = $this->Contenido->Usuario->find('list');
        $asignaturas = $this->_obtenerListaAsignaturasProfesor();
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
			throw new NotFoundException(__('Contenido inválido'));
		}
		if ($this->Contenido->delete()) {
			$this->Session->setFlash(__('Contenido eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contenido no se ha eliminado'));
		$this->redirect(array('action' => 'index'));
	}



}
