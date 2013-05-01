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
	public function index() {

        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');
        $conditions = array();
        //los alumnos sólo podrán visualizar sus propios trabajos.
        if ($tipo ==1 ) {
            $conditions[] = array('Trabajo.usuario_id =' => $user_id);
            $this->paginate = array(
                        'limit' => 20,
                        'order' => array('Trabajo.id' => 'ASC'),
                        'conditions' => $conditions,
                        'contain' => array('Trabajo')
            );
        }

		$this->Trabajo->recursive = 0;
		$this->set('trabajos', $this->paginate());

        //obtener sólo el listado de trabajos para las asignaturas
        //en las que está matriculado el alumno
        $AlumnosAsignaturas = new AlumnosAsignaturasController();
        $asignaturas_del_alumno = $AlumnosAsignaturas->obtenerAsignaturasAlumno($user_id);

        $conditions = array();
        $conditions[] = array('TrabajosEnunciado.asignatura_id' => $asignaturas_del_alumno);
        $conditions[] = array('TrabajosEnunciado.fecha_tope >=' => date('Y-m-d H:i:s'));

        $this->paginate = array(
            'limit' => 20,
            'order' => array('TrabajosEnunciado.id' => 'ASC'),
            'conditions' => $conditions,
            'contain' => array('TrabajosEnunciado')
        );

        $this->set('trabajosEnunciados', $this->paginate('TrabajosEnunciado'));

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

		$trabajosEnunciados = $this->Trabajo->TrabajosEnunciado->find('list');
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
