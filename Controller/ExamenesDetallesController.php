<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'AlumnosAsignaturas');
App::import('Controller', 'Asignaturas');
/**
 * ExamenesDetalles Controller
 *
 * @property ExamenesDetalle $ExamenesDetalle
 */
class ExamenesDetallesController extends AppController {

    public $components = array('Paginator', 'DescargasFicheros');
    public $helpers =  array('Session', 'Time');
/**
 * index method
 *
 * @return void
 */
	public function index() {

        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');
        $conditions = array();
        $conditions_form = array();
        $examen = array();


        if (isset($this->params['data']['submit'])) {
            if (!empty($this->params['data']['Basica']['Enunciado'])) {
                $txtdsc = $this->params['data']['Basica']['Enunciado'];
                $conditions_form[] = array('ExamenesDetalle.examenes_cabecera_id =' => $txtdsc);
            }

            if (!empty($this->params['data']['Basica']['alumnos'])) {
                $txtdsc = $this->params['data']['Basica']['alumnos'];
                $conditions_form[] = array('ExamenesDetalle.usuario_id =' => $txtdsc);
            }

            if (!empty($this->params['data']['Basica']['corregidos']) or
                ($this->params['data']['Basica']['corregidos']!='')) {
                $txtdsc = $this->params['data']['Basica']['corregidos'];
                if($txtdsc!= '2') {
                    $conditions_form[] = array('ExamenesDetalle.corregido =' => $txtdsc);
                }
            }
        }

        //los alumnos sólo podrán visualizar sus propios exámenes
        if ($tipo ==1 ) {
            $conditions[] = array('ExamenesDetalle.usuario_id =' => $user_id);
        }

        $conditions = array_merge($conditions, $conditions_form);
        $examen = array(
            'ExamenesDetalle' => array(
                'limit' => 5,
                'maxLimit' => 100,
                'order' => array('ExamenesDetalle.id' => 'ASC'),
                'conditions' => $conditions,
            ),
        );

        $this->Paginator->settings = $examen;

        $this->ExamenesDetalle->recursive = 0;

        $this->set('examenesDetalles', $this->Paginator->paginate('ExamenesDetalle'));

        if($tipo==1) {
            // obtener sólo el listado de examenes para las asignaturas  en las que está matriculado el alumno
            $condiciones_examenes_cabecera = $this->_obtenerCondicionExamenes();

            $examenesCabeceras = $this->ExamenesDetalle->ExamenesCabecera->find('all',
            array('conditions' => $condiciones_examenes_cabecera));

            $this->set('examenesCabeceras', $examenesCabeceras);
        } elseif($tipo==2) {
            //obtiene los examenes de examenes cabecera del profesor  (si se trata de un profesor).
            $condiciones_examenes_profesor = $this->_obtenerCondicionAsignaturasProfesor('ExamenesCabecera');

            $enunciados = $this->ExamenesDetalle->ExamenesCabecera->find('list', array('fields' => array('ExamenesCabecera.id',
            'ExamenesCabecera.dsc'), 'conditions' => $condiciones_examenes_profesor));
            $this->set('enunciados', $enunciados);
        }

        $alumnos = $this->_obtenerComboAlumnos();
        $this->set('alumnos', $alumnos);
        $this->set('opciones', array(0 => 'Sin corregir', 1 => 'Corregidos', 2=> 'Todos'));

	}

    /**
     * Obtiene un array para llenar el combo de alumnos (con nombre y apellidos)
     * @return array
     */
    private function _obtenerComboAlumnos() {
        $usuarios = $this->ExamenesDetalle->Usuario->find('all', array('fields'=> array('Usuario.id', 'Usuario.nombre', 'Usuario.apellidos'), 'conditions' => array('Usuario.tipo' => 1)));
        $usuarios_list = array();
        foreach($usuarios as $usuario) {
            $usuarios_list[$usuario['Usuario']['id']] = $usuario['Usuario']['nombre'].' '.$usuario['Usuario']['apellidos'];
        }

        return $usuarios_list;
    }

    /**
     * obtener sólo el listado de examenes para las asignaturas
     * en las que está matriculado el alumno
     *
     * @return array
     */

    private function _obtenerCondicionExamenes() {
        $user_id = $this->Auth->user('id');
        $AlumnosAsignaturas = new AlumnosAsignaturasController();
        $asignaturas_del_alumno = $AlumnosAsignaturas->obtenerAsignaturasAlumno($user_id);

        $conditions = array();
        $conditions[] = array('ExamenesCabecera.asignatura_id' => $asignaturas_del_alumno);
        $conditions[] = array('ExamenesCabecera.dia_examen =' => date('Y-m-d'));
        $conditions[] = array('ExamenesCabecera.activo =' => 1);

        return $conditions;
    }


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ExamenesDetalle->id = $id;
		if (!$this->ExamenesDetalle->exists()) {
			throw new NotFoundException(__('Exámen Inválido'));
		}
		$this->set('examenesDetalle', $this->ExamenesDetalle->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ExamenesDetalle->create();
			if ($this->ExamenesDetalle->save($this->request->data)) {
				$this->Session->setFlash(__('El Exámen ha sido guardado de forma correcta'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El exámen no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		}

        // obtener sólo el listado de examenes para las asignaturas  en las que está matriculado el alumno
        $conditions = $this->_obtenerCondicionExamenes();
        $examenesCabeceras = $this->ExamenesDetalle->ExamenesCabecera->find('list',
            array('fields' => array('ExamenesCabecera.id', 'ExamenesCabecera.dsc'), 'conditions' => $conditions));
        $this->set('examenesCabeceras', $examenesCabeceras);

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');
		$this->ExamenesDetalle->id = $id;

		if (!$this->ExamenesDetalle->exists()) {
			throw new NotFoundException(__('Exámen Inválida'));
		}
        //los alumnos sólo podrán editar sus propios exámenes.
        if(($this->ExamenesDetalle->field('usuario_id') != $user_id) and
          ($tipo==1)) {
            $this->restringirAlumno();
        }
        //si el examen ya estaba corregido tampoco editar
        if(($tipo==1) and ($this->ExamenesDetalle->field('corregido')==1)) {
            $this->restringirAlumno();
        }

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ExamenesDetalle->save($this->request->data)) {
				$this->Session->setFlash(__('El exámen ha sido guardado de forma correcta'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El exámen no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$this->request->data = $this->ExamenesDetalle->read(null, $id);
		}

        // obtener sólo el listado de examenes para las asignaturas  en las que está matriculado el alumno
        $conditions = $this->_obtenerCondicionExamenes();
        $examenesCabeceras = $this->ExamenesDetalle->ExamenesCabecera->find('list',
            array('fields' => array('ExamenesCabecera.id', 'ExamenesCabecera.dsc'), 'conditions' => $conditions));
        $this->set('examenesCabeceras', $examenesCabeceras);


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
        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');

		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ExamenesDetalle->id = $id;

        //los alumnos sólo podrán eliminar sus propios exámenes, siempre
        //que no estén corregidos
        if(($this->ExamenesDetalle->field('usuario_id') != $user_id) and
            ($tipo==1)) {
            $this->restringirAlumno();
        }
        //si el examen ya estaba corregido tampoco se puede borrar
        if(($tipo==1) and ($this->ExamenesDetalle->field('corregido')==1)) {
            $this->restringirAlumno();
        }

		if (!$this->ExamenesDetalle->exists()) {
			throw new NotFoundException(__('Exámen Invalido'));
		}
		if ($this->ExamenesDetalle->delete()) {
			$this->Session->setFlash(__('Exámen eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El exámen no ha sido eliminada'));
		$this->redirect(array('action' => 'index'));
	}


    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function corregir($id = null) {
        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');
        $this->ExamenesDetalle->id = $id;
        if (!$this->ExamenesDetalle->exists()) {
            throw new NotFoundException(__('Examen no válido'));
        }

        $this->restringirAlumno();

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->ExamenesDetalle->id =  $id;
            if($this->ExamenesDetalle->saveField('nota', $this->request->data['ExamenesDetalle']['nota'])) {
                $this->Session->setFlash(__('El examen ha sido corregido satisfactoriamente'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El examen no ha podido ser guardado, inténtelo otra vez.'));
            }
        } else {
            $this->request->data = $this->ExamenesDetalle->read(null, $id);
        }

        $this->set('examenesDetalle', $this->ExamenesDetalle->read(null, $id));
    }


}
