<?php
App::uses('AppModel', 'Model');
/**
 * AlumnosAsignatura Model
 *
 * @property Nota $Nota
 * @property Alumno $Alumno
 * @property Asignatura $Asignatura
 */
class AlumnosAsignatura extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'usuario_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'usuario_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'asignatura_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Nota' => array(
			'className' => 'Nota',
			'foreignKey' => 'alumnos_asignatura_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

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
