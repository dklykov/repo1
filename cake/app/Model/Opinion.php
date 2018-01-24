<?php
App::uses('AppModel', 'Model');
/**
 * Opinion Model
 *
 */
class Opinion extends AppModel {
/**
 * Primary key field
 *
 * @var string
 */
 //var $Opinion;	
 var $belongsTo = array(
 'User' => array(
  'className'    => 'User',
  'foreignKey'    => 'user_id'
    ),
 		'Stuff' => array(
 				'className'    => 'Stuff',
 				'foreignKey'    => 'stuff_id'
 		)
  );
 
 var $hasMany = array(
 		 		'Tagged' => array(
 				'className' => 'Tagged',
 				'foreignKey' => 'opinion_id',
 				'dependent'=>true
 		)
 );
    
	public $primaryKey = 'id';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = array('title','text');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'text' => array(
			'maxlength' => array(
				'rule' => array('maxlength', 5000),
				'message' => 'Максимальная длина текста не более 5000 символов',
			//	'allowEmpty' => false,
			//	'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			    'minlength' => array(
				'rule' => array('minlength', 30),
				'message' => 'Минимальная длина текста 30 символов',
			//	'allowEmpty' => false,
			//	'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
	);
		public function isOwnedBy($opid, $uid) {
		return $this->field('id', array('id' => $opid, 'user_id' => $uid)) === $opid;
	}
	public function beforeSave($options = array()) {
		
     return true;
	}   
}
