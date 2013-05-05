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

    function beforeSave() {
        //se obtiene el ID de usuario activo
        $uid = CakeSession::read("Auth.User.id");
        //se establece el campo usuario_id del modelo trabajo, como el usuario activo.
        $this->data['ExamenesCabecera']['usuario_id'] = $uid;

        return true;
    }

}
