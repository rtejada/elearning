<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'AlumnosAsignaturas');
/**
 * Trabajos Controller
 *
 * @property Trabajo $Trabajo
 */
class TrabajosController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public $components = array('Paginator', 'DescargasFicheros');

	public function index() {

        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');
        $conditions = array();
        $conditions_form = array();


        if (isset($this->params['data']['submit'])) {
            if (!empty($this->params['data']['Basica']['Enunciado'])) {
                $txtdsc = $this->params['data']['Basica']['Enunciado'];
                $conditions_form[] = array('Trabajo.trabajos_enunciado_id =' => $txtdsc);
            }

            if (!empty($this->params['data']['Basica']['alumnos'])) {
                $txtdsc = $this->params['data']['Basica']['alumnos'];
                $conditions_form[] = array('Trabajo.usuario_id =' => $txtdsc);
            }

            if (!empty($this->params['data']['Basica']['corregidos']) or
                 ($this->params['data']['Basica']['corregidos']!='')) {
                $txtdsc = $this->params['data']['Basica']['corregidos'];
                if($txtdsc!= '2') {
                    $conditions_form[] = array('Trabajo.corregido =' => $txtdsc);
                }
            }
        }

        //los alumnos sólo podrán visualizar sus propios trabajos.

        if ($tipo ==1 ) {
            $conditions[] = array('Trabajo.usuario_id =' => $user_id);
            $conditions = array_merge($conditions, $conditions_form);
        } elseif($tipo==2) {
            //el profesor solo podrá ver los trabajos enviados que correspondan con los
            //examenes cabeceras que ha enviado el previamente.
            $trabajos_enunciados_id = $this->Trabajo->TrabajosEnunciado->find("list",  array('fields' => array('TrabajosEnunciado.id')
            , 'conditions' => array('TrabajosEnunciado.usuario_id = ' => $user_id)));
            $conditions[] = array('Trabajo.trabajos_enunciado_id' => $trabajos_enunciados_id);
            $conditions = array_merge($conditions, $conditions_form);
        }

        $trabajo = array(
            'Trabajo' => array(
                'limit' => 5,
                'maxLimit' => 100,
                'order' => array('Trabajo.id' => 'ASC'),
                'conditions' => $conditions,
            ),
        );
		$this->Trabajo->recursive = 0;

        $this->Paginator->settings = $trabajo;
        $this->set('trabajos', $this->Paginator->paginate('Trabajo'));

        if($tipo==1) {
            $conditions_alumno = $this->_obtenerCondicionTrabajos();
            $trabajosEnunciado = $this->Trabajo->TrabajosEnunciado->find('all', array('conditions' => $conditions_alumno));
            $this->set('trabajosEnunciados', $trabajosEnunciado);
            $trabajos = $this->Trabajo->TrabajosEnunciado->find("list", array('conditions' => $conditions_alumno));
        } elseif($tipo==2) {
            $trabajos = $this->Trabajo->TrabajosEnunciado->find("list",  array('conditions' => array('TrabajosEnunciado.usuario_id = ' => $user_id)));
        }

        $alumnos = $this->_obtenerComboAlumnos();
        $this->set('enunciados', $trabajos);
        $this->set('alumnos', $alumnos);
        $this->set('opciones', array(0 => 'Sin corregir', 1 => 'Corregidos', 2=> 'Todos'));

	}

    /**
     * Obtiene un array para llenar el combo de alumnos (con nombre y apellidos)
     * @return array
     */
    private function _obtenerComboAlumnos() {
        $usuarios = $this->Trabajo->Usuario->find('all', array('fields'=> array('Usuario.id', 'Usuario.nombre', 'Usuario.apellidos'), 'conditions' => array('Usuario.tipo' => 1)));
        $usuarios_list = array();
        foreach($usuarios as $usuario) {
            $usuarios_list[$usuario['Usuario']['id']] = $usuario['Usuario']['nombre'].' '.$usuario['Usuario']['apellidos'];
        }

        return $usuarios_list;
    }

    /**
     * obtener sólo el listado de trabajos para las asignaturas
     * en las que está matriculado el alumno
     *
     * @return array
     */

    private function _obtenerCondicionTrabajos() {
        $user_id = $this->Auth->user('id');
        $AlumnosAsignaturas = new AlumnosAsignaturasController();
        $asignaturas_del_alumno = $AlumnosAsignaturas->obtenerAsignaturasAlumno($user_id);

        $conditions = array();
        $conditions[] = array('TrabajosEnunciado.asignatura_id' => $asignaturas_del_alumno);
        $conditions[] = array('TrabajosEnunciado.fecha_tope >=' => date('Y-m-d H:i:s'));

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
		if (!$this->Trabajo->exists($id)) {
			throw new NotFoundException(__('Invalid trabajo'));
		}
        $this->Trabajo->id = $id;

        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');
        //los alumnos sólo podrán visualizar sus propios trabajos.
        if (($tipo ==1 ) and ($this->Trabajo->field('usuario_id') <> $user_id)) {
            $this->restringirAlumno();
        }

		$options = array('conditions' => array('Trabajo.' . $this->Trabajo->primaryKey => $id));
		$this->set('trabajo', $this->Trabajo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Trabajo->create();
			if ($this->Trabajo->save($this->request->data)) {
				$this->Session->setFlash(__('El trabajo se ha guardado correctamente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El trabajo no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		}

        $conditions = $this->_obtenerCondicionTrabajos();
		$trabajosEnunciados = $this->Trabajo->TrabajosEnunciado->find('list', array('conditions' => $conditions));
		$this->set(compact('trabajosEnunciados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Trabajo->exists($id)) {
			throw new NotFoundException(__('Trabajo Inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Trabajo->save($this->request->data)) {
				$this->Session->setFlash(__('El trabajo se ha guardado correctamente.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El trabajo no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Trabajo.' . $this->Trabajo->primaryKey => $id));
			$this->request->data = $this->Trabajo->find('first', $options);
		}

        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');
        //los alumnos sólo podrán editar sus propios trabajos.
        if (($tipo ==1 ) and ($this->Trabajo->field('usuario_id') <> $user_id)) {
            $this->restringirAlumno();
        }

        $conditions = $this->_obtenerCondicionTrabajos();
        $trabajosEnunciados = $this->Trabajo->TrabajosEnunciado->find('list', array('conditions' => $conditions));
		$this->set(compact('trabajosEnunciados'));

	}

    /**
     * Corregir trabajo (profesor)
     *
     * @param null $id
     * @throws NotFoundException
     */

    public function corregir($id = null) {
        $this->restringirAlumno();
        if (!$this->Trabajo->exists($id)) {
            throw new NotFoundException(__('Invalid trabajo'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Trabajo->id =  $id;
            if($this->Trabajo->saveField('nota', $this->request->data['Trabajo']['nota'])) {
                $this->Session->setFlash(__('El trabajo se ha guardado correctamente.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El trabajo no se pudo guardar. Por favor, inténtelo de nuevo.'));
            }

        } else {
            $options = array('conditions' => array('Trabajo.' . $this->Trabajo->primaryKey => $id));
            $this->request->data = $this->Trabajo->find('first', $options);
        }

        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');

        //$asignaturas = $this->Trabajo->Asignatura->find('list');
        $trabajosEnunciados = $this->Trabajo->TrabajosEnunciado->find('list');
        $usuarios = $this->Trabajo->Usuario->find('list');
        $this->set(compact('trabajosEnunciados', 'usuarios'));

        $options = array('conditions' => array('Trabajo.' . $this->Trabajo->primaryKey => $id));
        $this->set('trabajo', $this->Trabajo->find('first', $options));

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
		$this->Trabajo->id = $id;
		if (!$this->Trabajo->exists()) {
			throw new NotFoundException(__('Trabajo inválido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Trabajo->delete()) {
			$this->Session->setFlash(__('Trabajo eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El trabajo no se ha eliminado.'));
		$this->redirect(array('action' => 'index'));
	}


}
