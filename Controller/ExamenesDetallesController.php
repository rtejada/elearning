<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'AlumnosAsignaturas');
/**
 * ExamenesDetalles Controller
 *
 * @property ExamenesDetalle $ExamenesDetalle
 */
class ExamenesDetallesController extends AppController {

    public $components = array('Paginator', 'DescargasFicheros');
/**
 * index method
 *
 * @return void
 */
	public function index() {

        $tipo = $this->Auth->user('tipo');
        $user_id = $this->Auth->user('id');
        $conditions = array();
        $examen = array();

        //los alumnos sólo podrán visualizar sus propios exámenes

        if ($tipo ==1 ) {
            $conditions[] = array('ExamenesDetalle.usuario_id =' => $user_id);

            $examen = array(
                'Examen' => array(
                    'limit' => 5,
                    'maxLimit' => 100,
                    'order' => array('ExamenesDetalle.id' => 'ASC'),
                    'conditions' => $conditions,
                ),
            );

            $this->Paginator->settings = $examen;

        }

        $this->ExamenesDetalle->recursive = 0;

        $this->set('examenesDetalles', $this->Paginator->paginate());

        if($tipo==1) {
            $condiciones_examenes_cabecera = $this->_obtenerCondicionExamenes();
            $examenesCabeceras = $this->ExamenesDetalle->ExamenesCabecera->find('all', array('conditions' => $condiciones_examenes_cabecera));
            $this->set('examenesCabeceras', $examenesCabeceras);
        }

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
			throw new NotFoundException(__('Invalid examenes detalle'));
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
				$this->Session->setFlash(__('The examenes detalle has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The examenes detalle could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ExamenesDetalle->id = $id;
		if (!$this->ExamenesDetalle->exists()) {
			throw new NotFoundException(__('Invalid examenes detalle'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ExamenesDetalle->save($this->request->data)) {
				$this->Session->setFlash(__('The examenes detalle has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The examenes detalle could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ExamenesDetalle->read(null, $id);
		}
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
		$this->ExamenesDetalle->id = $id;
		if (!$this->ExamenesDetalle->exists()) {
			throw new NotFoundException(__('Invalid examenes detalle'));
		}
		if ($this->ExamenesDetalle->delete()) {
			$this->Session->setFlash(__('Examenes detalle deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Examenes detalle was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
