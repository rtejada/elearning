<?php
/**
 *  Admin controller
 *
 *  Controlador para la sección Admin
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class AdminController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Admin';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();


	public function admin() {
        $this->restringirAlumno();
    }
}
