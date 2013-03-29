<?php
App::uses('AppModel', 'Model');
/**
 * Usuario Model
 *
 * @property alumnos_asignaturas $alumnos_asignaturas
 * @property asignaturas $asignaturas_profesor
 * @property trabajos $trabajos
 * @property examenes_detalle $examenes_detalle
 */
class Usuario extends AppModel {

    public $actsAs = array(
        'Upload.Upload' => array(
            'foto' => array(
                'fields' => array(
                    'dir' => 'foto_dir'
                )
            )
        )
    );

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'login';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'No se permite nombre en blanco',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'apellidos' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'No se permite apellidos en blanco',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha_nacimiento' => array(
			/*'date' => array(
				'rule' => array('date'),
				'message' => 'La fecha no está en el formato correcto',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),*/
			'notempty' => array(
				'rule' => array('notempty'),
                'message' => 'No se permite fecha de nacimiento en blanco'
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'direccion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe introducir una dirdcción',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Su email no parece correcto',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El campo email no puede permanecer vacío',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'unico' => array(
                'rule'    => 'isUnique',
                'message' => 'El email ya existe en la base de datos.'
            )
		),
		'telefono' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe introducir su teléfono',
				'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'login' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El campo Login no puede estar en blanco',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength', '5'),
				'message' => 'El campo login es de 5 caracteres como mínimo',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'login' => array(
                'rule'    => 'isUnique',
                'message' => 'El nombre de usuario ya existe, debe introducir otro.'
            )
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El campo password no puede estar en blanco',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength', '5'),
				'message' => 'El campo contraseña debe ser de 5 caracteres como mínimo',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'allowedChoice' => array(
                'rule'    => array('inList', array('1', '2')),
                'message' => 'Debe introducir tipo Usuario o Profesor'
            )
		),
        /*  'foto' => array (
                 'photo' => array(
                    'rule' => 'isSuccessfulWrite',
                    'message' => 'La imagen se ha escrito correctamente en el servidor'
                ),
               'photofail' => array(
                    'rule' => array('isSuccessfulWrite', false),
                    'message' => 'Ha ocurrido un error al subir la imagen'
                ),
                'photodir' => array(
                    'rule' => array('isValidDir'),
                    'message' => 'File upload directory does not exist'
                ),
                'photowrit' => array(
                    'rule' => array('isWritable', false),
                    'message' => 'File upload directory was not writable'
                ),
        ),*/

	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
        //Relaciona al usuario de tipo alumno con sus asignaturas
		'alumnos_asignaturas' => array(
			'className' => 'alumnos_asignaturas',
			'foreignKey' => 'alumno_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
        //Relaciona al usuario de tipo profesor con las asignaturas que imparte
		'asignaturas' => array(
			'className' => 'asignaturas',
			'foreignKey' => 'profesor_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
        //Relaciona al usuario de tipo alumno con los trabajo
		'trabajos' => array(
			'className' => 'trabajos',
			'foreignKey' => 'alumno_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
        //Relaciona al usuario de tipo alumno con sus examenes
		'examenes_detalles' => array(
			'className' => 'examenes_detalle',
			'foreignKey' => 'alumno_id',
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
