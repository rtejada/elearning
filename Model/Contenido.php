<?php
App::uses('AppModel', 'Model');
/**
 * ContenidosTemario Model
 *
 * @property Usuario $Usuario
 * @property Asignatura $Asignatura
 */
class Contenido extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'dsc';

    public $actsAs = array(
        'Upload.Upload' => array(
            'fichero' => array(
                'fields' => array(
                    'dir' => 'fichero_dir'
                )
            )
        )
    );


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
