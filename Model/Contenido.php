<?php
App::uses('AppModel', 'Model');
/**
 * ContenidosTemario Model
 *
 * @property Usuario $Usuario
 * @property Asignatura $Asignatura
 */
class Contenido extends AppModel {

    public $validate = array(
        'asignatura_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Debe seleccionar la asignatura',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'dsc' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Debe Introducir un Título',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );


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

    function beforeSave() {
        //se obtiene el ID de usuario activo
        $uid = CakeSession::read("Auth.User.id");
        $this->data['Contenido']['usuario_id'] = $uid;
        return true;
    }
}
