<?php
App::uses('AppModel', 'Model');
/**
 * Trabajo Model
 *
 * @property Asignatura $Asignatura
 * @property TrabajosEnunciado $TrabajosEnunciado
 * @property Usuario $Usuario
 */
class Trabajo extends AppModel {


    public $displayField = 'dsc';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'dsc' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe introducir un valor',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */


	public $belongsTo = array(

		'Asignatura' => array(
			'className' => 'Asignatura',
			'foreignKey' => 'asignatura_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TrabajosEnunciado' => array(
			'className' => 'TrabajosEnunciado',
			'foreignKey' => 'trabajos_enunciado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
