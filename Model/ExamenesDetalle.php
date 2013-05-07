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
		'ExamenesCabecera' => array(
			'className' => 'ExamenesCabecera',
			'foreignKey' => 'examenes_cabecera_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    /**
     * Esta función permite establecer el usuario activo como usuario_id del examen.
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
            $this->data['ExamenesDetalle']['usuario_id'] = $uid;
        }

        return true;
    }

}
