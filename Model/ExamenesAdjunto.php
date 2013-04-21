<?php
App::uses('AppModel', 'Model');
/**
 * ExamenesAdjunto Model
 *
 * @property ExamenesDetalle $ExamenesDetalle
 */
class ExamenesAdjunto extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ruta_fichero';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ExamenesDetalle' => array(
			'className' => 'ExamenesDetalle',
			'foreignKey' => 'examenes_detalle_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
