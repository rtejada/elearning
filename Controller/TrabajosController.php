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
        $trabajo = array();
        //los alumnos sólo podrán visualizar sus propios trabajos.

        if ($tipo ==1 ) {
            $conditions[] = array('Trabajo.usuario_id =' => $user_id);

            $trabajo = array(
                'Trabajo' => array(
                    'limit' => 5,
                    'maxLimit' => 100,
                    'order' => array('Trabajo.id' => 'ASC'),
                    'conditions' => $conditions,
                ),
            );
           // $this->Paginator->settings = $trabajo;
           /* $this->paginate = array(
                        'limit' => 5,
                        'order' => array('Trabajo.id' => 'ASC'),
                        'conditions' => $conditions,
                        'contain' => array('Trabajo')
            );*/

        }


		$this->Trabajo->recursive = 1;


        $conditions = $this->_obtenerCondicionTrabajos();

       /* $trabajosEnunciado = array(
            'TrabajosEnunciado' => array(
            'limit' => 10,
            'order' => array('TrabajosEnunciado.id' => 'ASC'),
            'conditions' => $conditions,
            )
        );*/

        $trabajosEnunciado = $this->Trabajo->TrabajosEnunciado->find('all', array('conditions' => $conditions));

        //$this->Paginator->settings = array_merge($trabajo, $trabajosEnunciado);
        /*$this->paginate = array(
            'limit' => 10,
            'order' => array('TrabajosEnunciado.id' => 'ASC'),
            'conditions' => $conditions,
            'contain' => array('TrabajosEnunciado')
        );*/

        $this->Paginator->settings = $trabajo;
        $this->set('trabajos', $this->Paginator->paginate('Trabajo'));
       /* $this->Paginator->settings = $trabajosEnunciado;*/
        //$this->set('trabajosEnunciados', $this->Paginator->paginate('TrabajosEnunciado'));

        if($tipo==1) {
            $this->set('trabajosEnunciados', $trabajosEnunciado);
        }



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
				$this->Session->setFlash(__('The trabajo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajo could not be saved. Please, try again.'));
			}
		}

        $conditions = $this->_obtenerCondicionTrabajos();

		$trabajosEnunciados = $this->Trabajo->TrabajosEnunciado->find('list', array('conditions' => $conditions));
		$usuarios = $this->Trabajo->Usuario->find('list');
		$this->set(compact('trabajosEnunciados', 'usuarios'));
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
			throw new NotFoundException(__('Invalid trabajo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Trabajo->save($this->request->data)) {
				$this->Session->setFlash(__('The trabajo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trabajo could not be saved. Please, try again.'));
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

		//$asignaturas = $this->Trabajo->Asignatura->find('list');
		$trabajosEnunciados = $this->Trabajo->TrabajosEnunciado->find('list');
		$usuarios = $this->Trabajo->Usuario->find('list');
		$this->set(compact('trabajosEnunciados', 'usuarios'));

        $this->loadModel("Nota");

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
     //   xdebug_break();
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Trabajo->id =  $id;
            if($this->Trabajo->saveField('nota', $this->request->data['Trabajo']['nota'])) {
                $this->Session->setFlash(__('The trabajo has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The trabajo could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid trabajo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Trabajo->delete()) {
			$this->Session->setFlash(__('Trabajo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Trabajo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


}
