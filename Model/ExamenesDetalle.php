<?php
App::uses('AppModel', 'Model');
/**
 * ExamenesDetalle Model
 *
 * @property Usuario $Usuario
 * @property ExamenesCabecera $ExamenesCabecera
 * @property ExamenesAdjunto $ExamenesAdjunto
 */
class ExamenesDetalle extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'dsc';


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
		'ExamenesCabecera' => array(
			'className' => 'ExamenesCabecera',
			'foreignKey' => 'examenes_cabecera_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
