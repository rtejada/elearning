<?php
App::uses('AppModel', 'Model');
/**
 * ExamenesCabecera Model
 *
 * @property Asignaturas $Asignaturas
 * @property ExamenesDetalle $ExamenesDetalle
 */
class ExamenesCabecera extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'enunciado';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Asignaturas' => array(
			'className' => 'Asignaturas',
			'foreignKey' => 'asignaturas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ExamenesDetalle' => array(
			'className' => 'ExamenesDetalle',
			'foreignKey' => 'examenes_cabecera_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
