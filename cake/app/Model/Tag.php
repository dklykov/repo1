<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 */
class Tag extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $primaryKey = 'id';
/**
 * Validation rules
 *
 * @var array
 */
	var $hasMany = array(
			'Tagged' => array(
					'className' => 'Tagged',
					'foreignKey' => 'tag_id'
			)
	);
	
	public $validate = array(
		'name' => array(
			'maxlength' => array(
				'rule' => array('maxlength',50),
				'message' => 'Максимальная длина тега не более 50 символов',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength',3),
				'message' => 'Минимальная длина тега не более 3 символов',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
}

