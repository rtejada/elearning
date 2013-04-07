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
        )
    );

    public function isAuthorized($user) {
        // Los profesores pueden acceder a todo.
        if (isset($user['tipo']) && $user['tipo'] === '2') {
            return true;
        }

        // Default deny
        return false;
    }

    public function beforeFilter() {
      //TODO aqui las opciones permitidas sin que el usuario esté logueado.
      //  $this->Auth->allow('index', 'view', 'add');

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


}
