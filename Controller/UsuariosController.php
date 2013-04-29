<?php
App::uses('AppController', 'Controller');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 */
class UsuariosController extends AppController {

/**
 * index method
 *
 * @return void
 *
 *
 */
    public $components = array('DescargasFicheros');

	public function index() {
        $this->restringirAlumno();
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

        $tipo = $this->Auth->user('tipo');
        $usuario_id = $this->Auth->user('id');
        if($tipo==1) {
            $id = $usuario_id;
        }

		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
		$this->set('usuario', $this->Usuario->find('first', $options));

        $this->Usuario->id = $id;

        //link para recibir la imagen desde componente de download
        $directorio = $this->Usuario->field("foto_dir");
        $url_fichero = $this->Usuario->field("foto");
        $link = array('controller' => 'usuarios', 'action' => 'downloadFile', $directorio, $url_fichero);
        $this->set("link", $link);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->restringirAlumno();
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
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

        $tipo = $this->Auth->user('tipo');
        $usuario_id = $this->Auth->user('id');
        if($tipo==1) {
            $id = $usuario_id;
        }

		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		} else {

           $options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
		   $this->request->data = $this->Usuario->find('first', $options);

            $this->Usuario->id = $id;

            //link para recibir la imagen desde componente de download
            $directorio = $this->Usuario->field("foto_dir");
            $url_fichero = $this->Usuario->field("foto");
            $link = array('controller' => 'usuarios', 'action' => 'downloadFile', $directorio, $url_fichero);
            $this->set("link", $link);

		}
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
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('Usuario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usuario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

 /**
  * downloadFile method
  *
  *  @param string $foto_dir    Subdirectorio donde se almacena la foto
  *  @param string $foto        Nombre del fichero de imagen
  *
  *   Este método sirve imágenes de perfíl de usuario.
  */

    public function downloadFile($foto_dir, $foto) {
        $this->layout = "ajax";
        $mfoto = Sanitize::html($foto);
        $mfoto_dir = Sanitize::html($foto_dir);
        $this->DescargasFicheros->descarga('usuario',$mfoto_dir,$mfoto);
    }


    public function beforeFilter() {
        $this->Auth->autoRedirect=FALSE;
        $this->Auth->allow('*','add');
        parent::beforeFilter();
       // $this->Auth->authenticate = array('Form');
        //$this->Auth->allow('*','add');
    }


    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {

                $tipo = $this->Auth->user('tipo');

                switch($tipo) {
                    case 1:     $this->redirect(array('controller' => 'AlumnosAsignaturas', 'action' => 'index'));
                                break;

                    case 2:     $this->redirect(array('controller' => 'Asignaturas', 'action' => 'index'));
                                break;
                }

               // $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }



}
