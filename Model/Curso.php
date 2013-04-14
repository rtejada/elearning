<?php
App::uses('AppModel', 'Model');
/**
 * Curso Model
 *
 */
class Curso extends AppModel {

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
}
