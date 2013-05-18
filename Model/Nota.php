<?php
App::uses('AppModel', 'Model');
/**
 * Nota Model
 *
 * @property Usuario $Usuario
 * @property Asignatura $Asignatura
 */
class Nota extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nota';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

    public $validate = array(
        'nota' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Debe introducir una nota',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'El valor de nota debe ser numérico',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tipo_nota' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Debe seleccionar un valor',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
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
