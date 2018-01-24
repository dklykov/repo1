<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 */
class User extends AppModel {
/**
 * Display field
 *
 * @var string
 */
 /*   var $hasMany = array(
        'Goal' => array(
            'className'     => 'Goal',
            'foreignKey'    => 'id',
            'dependent'=> true
        ));
*/
 
	public $displayField = 'name';
	public $primaryKey = 'id';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Длина имени пользователя не более 18 симовлов',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pass' => array(
			'maxlength' => array(
				'rule' => array('maxlength', 18),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			    'minlength' => array(
				'rule' => array('minlength', 5),
				'message' => 'Минимальная длина пароля 5',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'pass_confirm' => array(
				'required'=>'notEmpty',
				'match'=>array(
						'rule' => 'validatePasswdConfirm',
						'message' => 'Пароль и подтверждение не совпадают'
				)),
		'location' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['pass'])) {
        $this->data[$this->alias]['pass'] = AuthComponent::password($this->data[$this->alias]['pass']);
    }
    if (isset($this->data['User']['pass_confirm']))
    {
    	unset($this->data['User']['pass_confirm']);
    }
    return true;
}

function validatePasswdConfirm($data)
{
	if ($this->data['User']['pass'] !== $data['pass_confirm'])
	{
		return false;
	}
	return true;
}
}
