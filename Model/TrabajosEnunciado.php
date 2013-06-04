<?php
App::uses('AppModel', 'Model');
/**
 * TrabajosEnunciado Model
 *
 * @property Asignatura $Asignatura
 * @property Trabajo $Trabajo
 */
class TrabajosEnunciado extends AppModel {

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
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'dsc' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe introducir un título',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'enunciado' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Este campo no puede estar vacío',
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Trabajo' => array(
			'className' => 'Trabajo',
			'foreignKey' => 'trabajos_enunciado_id',
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

    function beforeSave() {
        //se obtiene el ID de usuario activo
        $uid = CakeSession::read("Auth.User.id");
        //se establece el campo usuario_id del modelo trabajo, como el usuario activo.
        $this->data['TrabajosEnunciado']['usuario_id'] = $uid;

        return true;
    }
}
