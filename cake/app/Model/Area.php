<?php
App::uses('AppModel', 'Model');
/**
 * Area Model
 *
 */
class Area extends AppModel {
/**
 * Display field
 *
 * @var string
 */
    var $hasMany = array(
        'Stuff' => array(
            'className'     => 'Stuff',
            'foreignKey'    => 'area_id',
          ));
		
	public $displayField = 'descr';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descr' => array(
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
}
