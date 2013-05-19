<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');
App::uses('Sanitize', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    var $helpers = array('Session', 'Chosen.Chosen');

    public $components = array(
        'Session',
        'Auth' => array(
            'loginAction' => array(
                'controller' => 'usuarios',
                'action' => 'login',
            ),
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'Usuario',
                    'fields' => array(
                        'username' => 'login',
                        'password' => 'password'
                    )
                )
            ),
            //TODO poner aqui la página de inicio para usuarios autentificados
            'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
            'authorize' => array('Controller'),
            'authError' => 'No tiene permisos para acceder a esta sección'
        ),
        'DescargasFicheros',
        'DebugKit.Toolbar'
    );



    public function isAuthorized($user) {

        return true;
    }

    public function beforeFilter() {
      //TODO aqui las opciones permitidas sin que el usuario esté logueado.
      // $this->Auth->allow('index', 'view', 'add');

    }


    function isLogged($user) {
        if (isset($user['id']) && ($user['id']>0)) {
            return true;
        } else {
            return false;
        }
    }


    function beforeRender() {
        parent::beforeRender();
       /* if ($this->name === 'Usuarios') {
            $this->layout = 'login';
        }*/
    }

    /**
     * Este metodo sirve para restringir el acceso a los alumnos
     * desde cualquier sitio donde se llame.
     *
     * @access public
     * @autor Roxana
     */
    public function restringirAlumno() {
        $tipo = $this->Auth->user('tipo');
        if ($tipo == 1) {
            $this->Session->setFlash('No puede accder a ese área.');
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * downloadFile method
     *
     *  @param string $foto_dir    Subdirectorio donde se almacena la foto
     *  @param string $foto        Nombre del fichero de imagen
     *  @param string $foto        Nombre del campo que tiene la imagen
     *  @access public
     *  @author Roxana
     *
     *
     *   Este método sirve imágenes de perfíl de usuario.
     */
    public function downloadFile($foto_dir, $foto, $campo='foto', $modelo='') {

        $this->layout = "ajax";
        $mfoto = Sanitize::html($foto);
        $mfoto_dir = Sanitize::html($foto_dir);
        if($modelo=='') {
            $modelo = strtolower($this->modelClass);
        }
        if($modelo=='examenesdetalle')
            $modelo = 'examenes_detalle';
        if($modelo=='trabajosenunciado')
            $modelo = 'trabajos_enunciado';

        $this->DescargasFicheros->descarga($modelo,$mfoto_dir,$mfoto, $campo);
    }

    /**
     * obtiene un array de condiciones que se podrá usar en todos los controladores
     * donde haya que filtrar la tabla asignaturas según el user_id del profesor actual
     *
     * @author Roxana
     * @access protected
     * @param string $modelo            Nombre del modelo
     * @return array                    Array de condiciones para $this->paginate();
     */
    protected function _obtenerCondicionAsignaturasProfesor($modelo = '') {
        $user_id = $this->Auth->user('id');
        App::import('Controller','Asignaturas');
        $Asignaturas = new AsignaturasController();
        $asignaturas_profesor = $Asignaturas->obtenerAsignaturasProfesor($user_id, 'list');
        $conditions = array();
        $conditions[] = array($modelo.'.asignatura_id' => $asignaturas_profesor);

        return $conditions;
    }

    /**
     * Obtiene las asignaturas asignadas al profesor en formato list
     * para usar con los combos
     *
     * @access protected
     * @return array
     */
    protected function _obtenerListaAsignaturasProfesor() {
        App::import('Controller','Asignaturas');
        $user_id = $this->Auth->user('id');
        $Asignaturas = new AsignaturasController();
        $asignaturas_profesor = $Asignaturas->obtenerListaAsignaturasProfesor($user_id, 'list');
        return $asignaturas_profesor;
    }


}
