<?php
App::uses('AppModel', 'Model');
/**
 * TrabajosAdjunto Model
 *
 * @property Trabajo $Trabajo
 */
class TrabajosAdjunto extends AppModel {

/**
 * Display field
 *
 * @var string
 */
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
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
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
		'Trabajo' => array(
			'className' => 'Trabajo',
			'foreignKey' => 'trabajo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
