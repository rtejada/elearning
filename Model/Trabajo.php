<?php
App::uses('AppModel', 'Model');
App::uses('CakeSession', 'Model/Datasource');
/**
 * Trabajo Model
 *
 * @property Asignatura $Asignatura
 * @property TrabajosEnunciado $TrabajosEnunciado
 * @property Usuario $Usuario
 */
class Trabajo extends AppModel {


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
				'message' => 'Debe introducir un valor',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'fichero' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Debe seleccionar un fichero',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                'on' => 'create', // Limit validation to 'create' or 'update' operations
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

		'TrabajosEnunciado' => array(
			'className' => 'TrabajosEnunciado',
			'foreignKey' => 'trabajos_enunciado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);



    /**
     * Esta función permite establecer el usuario activo como usuario_id del trabajo.
     * La functión beforeSave se ejecuta justo antes de que se guarden los datos.
     * La función deberá devolver true o de lo contrario no se almacenarán los cambios.
     *
     * @return bool
     */
    function beforeSave() {
        //se obtiene el ID de usuario activo
        $uid = CakeSession::read("Auth.User.id");
        $tipo = CakeSession::read("Auth.User.tipo");
        //se establece el campo usuario_id del modelo trabajo, como el usuario activo.
        //siempre que sea un alumno.
        if($tipo==1) {
            $this->data['Trabajo']['usuario_id'] = $uid;
        } elseif ($tipo == 2) {
            $this->data['Trabajo']['corregido'] = 1;
        }

        return true;
    }





}
