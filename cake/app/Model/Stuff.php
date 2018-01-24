<?php
App::uses('AppModel', 'Model');
/**
 * Stuff Model
 *
 */
class Stuff extends AppModel {
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
			'Opinion' => array(
					'className' => 'Opinion',
					'foreignKey' => 'stuff_id'
			)
	);
	var $belongsTo = array(
			'Area' => array(
					'className'    => 'Area',
					'foreignKey'    => 'area_id'
			)
			);
}

