<?php
App::uses('AppModel', 'Model');
/**
 * Nota Model
 *
 * @property AlumnosAsignatura $AlumnosAsignatura
 */
class Nota extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nota';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'AlumnosAsignatura' => array(
			'className' => 'AlumnosAsignatura',
			'foreignKey' => 'alumnos_asignatura_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
