<?php
/**
 * GoalFixture
 *
 */
class GoalFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'goal_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'descr' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 300, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'area_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'achieved' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'rating' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'tags' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 300, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'goal_id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'goal_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'descr' => 'Lorem ipsum dolor sit amet',
			'area_id' => 1,
			'user_id' => 1,
			'created' => '2012-08-28 10:05:56',
			'achieved' => '2012-08-28 10:05:56',
			'rating' => 1,
			'tags' => 'Lorem ipsum dolor sit amet'
		),
	);
}
