<?php
App::uses('AppController', 'Controller');
/**
 * Notas Controller
 *
 * @property Nota $Nota
 */
class NotasController extends AppController {

    //array con tipos de notas
    private $array_tipo_nota = array(0 => '', 1=> 'Primera Evaluación', 2=> 'Segunda Evaluación',
        3=>'Tercera Evaluación', 4=>'Final Junio', 5=> 'Recuperación Septiembre');

/**
 * index method
 *
 * @return void
 */
	public function index() {

        $user_id = $this->Auth->user('id');
        $tipo = $this->Auth->user('tipo');
        $conditions = array();

        if (isset($this->params['data']['submit'])) {
            if (!empty($this->params['data']['Basica']['asignatura'])) {
                $txtdsc = $this->params['data']['Basica']['Enunciado'];
                $conditions[] = array('Nota.asignatura_id =' => $txtdsc);
            }

            if (!empty($this->params['data']['Basica']['alumno'])) {
                $txtdsc = $this->params['data']['Basica']['alumno'];
                $conditions[] = array('Nota.usuario_id =' => $txtdsc);
            }

            if (!empty($this->params['data']['Basica']['tipo_nota'])) {
                $txtdsc = $this->params['data']['Basica']['tipo_nota'];
                $conditions[] = array('Nota.tipo_nota =' => $txtdsc);
            }
        }

        //los alumnos solo podran ver sus propias notas
        if ($tipo==1) {
            $conditions[] = array('Nota.usuario_id' => $user_id);
        }

        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 10,
            'order' => array(
                'Nota.usuario_id' => 'asc',
                'Nota.tipo_nota' => 'asc',
                'Nota.asignatura_id' => 'asc',
            )
        );

		$this->Nota->recursive = 1;

        $asignaturas_profesor = $this->Nota->Asignatura->find('all', array('conditions' => array('Asignatura.id' => $user_id) ));
        $asignaturas_profesor_combo = $this->Nota->Asignatura->find('list', array('conditions' => array('Asignatura.id' => $user_id) ));
        $alumnos = $this->Nota->Usuario->find('list', array('conditions' => array('Usuario.tipo' => 1)));
        $this->set('asignaturas_profesor', $asignaturas_profesor);
        $this->set('asignaturas_profesor_combo', $asignaturas_profesor_combo);
        $this->set('tipo_notas', $this->array_tipo_nota);
        $this->set('alumnos', $alumnos);
		$this->set('notas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Nota->id = $id;
		if (!$this->Nota->exists()) {
			throw new NotFoundException(__('Nota Inválida'));
		}
		$this->set('nota', $this->Nota->read(null, $id));
	}

   /**
     * add method
     *
     * @return void
     */
	public function add($asignatura_id = NULL) {

        $this->restringirAlumno();

		if ($this->request->is('post')) {
			$this->Nota->create();
			if ($this->Nota->save($this->request->data)) {
				$this->Session->setFlash(__('La nota ha sido guardada de forma correcta'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La nota no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		}


        //obtener todos los ID de alumnos relacionados con la asignatura
        $lista_alumnos_asignatura = $this->_obtenerAlumnosRelacionadosAsignatura($asignatura_id);

        //obtener los datos de los alumnos de la asignatura en formato para rellenar el combo
        $alumnos = $this->Nota->Usuario->find('list',
            array('conditions' => array('Usuario.id' => $lista_alumnos_asignatura)));

        $asignaturas = $this->_obtenerListaAsignaturasProfesor();

        $this->set(compact('alumnos'));
        $this->set('tipo_notas', $this->array_tipo_nota);
        $this->set('asignatura_default', $asignatura_id);
        $this->set('asignaturas', $asignaturas);

	}

   /**
     * obtener todos los ID de alumnos relacionados con la asignatura
     *
     * @param $asignatura_id
     * @return mixed
     */
    private function _obtenerAlumnosRelacionadosAsignatura($asignatura_id)  {
        $this->loadModel('AlumnosAsignatura');
        $lista_alumnos_asignatura = $this->AlumnosAsignatura->find('list',
            array('fields' => array('AlumnosAsignatura.usuario_id'),
                'conditions' => array('AlumnosAsignatura.asignatura_id' => $asignatura_id)));
        return $lista_alumnos_asignatura;
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
		$this->Nota->id = $id;
		if (!$this->Nota->exists()) {
			throw new NotFoundException(__('Nota Inválida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Nota->save($this->request->data)) {
				$this->Session->setFlash(__('La nota ha sido guardada de forma correcta'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La nota no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$this->request->data = $this->Nota->read(null, $id);
		}

        $asignatura_id = $this->Nota->field('asignatura_id');

        //obtener todos los ID de alumnos relacionados con la asignatura
        $lista_alumnos_asignatura = $this->_obtenerAlumnosRelacionadosAsignatura($asignatura_id);

        //obtener los datos de los alumnos de la asignatura en formato para rellenar el combo
        $alumnos = $this->Nota->Usuario->find('list',
            array('conditions' => array('Usuario.id' => $lista_alumnos_asignatura)));

        $asignaturas = $this->_obtenerListaAsignaturasProfesor();

        $this->set(compact('alumnos'));
        $this->set('asignaturas', $asignaturas);
        $this->set('tipo_notas', $this->array_tipo_nota);
	}

/**
 * Metodo eliminar nota
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
		$this->Nota->id = $id;
		if (!$this->Nota->exists()) {
			throw new NotFoundException(__('Nota Inválida'));
		}
		if ($this->Nota->delete()) {
			$this->Session->setFlash(__('Nota Eliminada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La Nota no ha sido eliminada'));
		$this->redirect(array('action' => 'index'));
	}

}
