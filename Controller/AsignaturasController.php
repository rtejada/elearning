<?php
App::uses('AppController', 'Controller');
/**
 * Asignaturas Controller
 *
 * @property Asignatura $Asignatura
 */
class AsignaturasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {

        $this->restringirAlumno();
        $conditions = array();
        $propiedades_paginate = array();
        $user_id = $this->Auth->user('id');

        if (isset($this->params['data']['submit'])) {

            if (!empty($this->params['data']['Basica']['dsc'])) {
                $txtdsc = $this->params['data']['Basica']['dsc'];
                $conditions[] = array('Asignatura.dsc LIKE' => '%'.$txtdsc.'%');
            }

        }

        $conditions[] = array('Asignatura.usuario_id' => $user_id);
        $propiedades_paginate =  array('conditions' => $conditions);
        $this->paginate = array_merge(array('limit' => 10), $propiedades_paginate);

		$this->Asignatura->recursive = 0;
		$this->set('asignaturas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Asignatura->exists($id)) {
			throw new NotFoundException(__('Asignatura inválida'));
		}
		$options = array('conditions' => array('Asignatura.' . $this->Asignatura->primaryKey => $id));
		$this->set('asignatura', $this->Asignatura->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

        $this->restringirAlumno();
		if ($this->request->is('post')) {
			$this->Asignatura->create();
			if ($this->Asignatura->save($this->request->data)) {
				$this->Session->setFlash(__('La asignatura se ha guardado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La asignatura no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		}
		$cursos = $this->_obtenerComboCursos();
        $usuarios = $this->_obtenerComboProfesores();
		$this->set(compact('cursos', 'usuarios'));
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
		if (!$this->Asignatura->exists($id)) {
			throw new NotFoundException(__('Invalid asignatura'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Asignatura->save($this->request->data)) {
				$this->Session->setFlash(__('La asignatura se ha guardado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La asignatura no se pudo guardar. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Asignatura.' . $this->Asignatura->primaryKey => $id));
			$this->request->data = $this->Asignatura->find('first', $options);
		}
        $cursos = $this->_obtenerComboCursos();
        $usuarios = $this->_obtenerComboProfesores();
		$this->set(compact('cursos', 'usuarios'));
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
        $this->restringirAlumno();
		$this->Asignatura->id = $id;
		if (!$this->Asignatura->exists()) {
			throw new NotFoundException(__('Asignatura inválida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Asignatura->delete()) {
			$this->Session->setFlash(__('Asignatura eliminada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('La asignatura no se ha eliminado'));
		$this->redirect(array('action' => 'index'));
	}

    /**
     * Este método se usa para obtener la condición de búsqueda para las asignaturas de profesor
     * @param $id
     * @param string $tipo_query
     * @return array
     */
    public function obtenerAsignaturasProfesor($id = null, $tipo_query = 'list') {
        $asignaturas = $this->Asignatura->find($tipo_query, array('fields' => array('Asignatura.id'), 'conditions' => array('Asignatura.usuario_id' => $id)));
        return $asignaturas;
    }

    /**
     * Este método se usa para obtener el listado de asignaturas de profesor válido para combo select
     * @param null $id
     * @param string $tipo_query
     * @return array
     */
    public function obtenerListaAsignaturasProfesor($id = null, $tipo_query = 'list') {
        $asignaturas = $this->Asignatura->find($tipo_query, array('fields' => array('Asignatura.id', 'Asignatura.dsc'), 'conditions' => array('Asignatura.usuario_id' => $id)));
        return $asignaturas;
    }


    /**
     * Obtiene un array para llenar el combo de cursos.
     * ID => Curso.dsc .' '.Modulo.dsc
     *
     * @return array
     */
    private function _obtenerComboCursos() {
        $cursos_data = $this->Asignatura->Curso->find('all', array('fields' => array('Curso.id', 'Curso.dsc', 'Modulo.dsc')));
        $cursos_list = array();
        foreach($cursos_data as $curso) {
            $cursos_list[$curso['Curso']['id']] = $curso['Curso']['dsc'].' '.$curso['Modulo']['dsc'];
        }
        return $cursos_list;
    }

    /**
     * Obtiene un array para llenar el combo de profesores (con nombre y apellidos)
     * @return array
     */
    private function _obtenerComboProfesores() {
        $usuarios = $this->Asignatura->Usuario->find('all', array('fields'=> array('Usuario.id', 'Usuario.nombre', 'Usuario.apellidos'), 'conditions' => array('Usuario.tipo' => 2)));
        $usuarios_list = array();
        foreach($usuarios as $usuario) {
            $usuarios_list[$usuario['Usuario']['id']] = $usuario['Usuario']['nombre'].' '.$usuario['Usuario']['apellidos'];
        }

        return $usuarios_list;
    }

}
