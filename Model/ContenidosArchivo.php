<?php
App::uses('AppModel', 'Model');
/**
 * ContenidosArchivo Model
 *
 * @property Usuario $Usuario
 * @property Asignatura $Asignatura
 */
class ContenidosArchivo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'archivo_dir';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Asignatura' => array(
			'className' => 'Asignatura',
			'foreignKey' => 'asignatura_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
