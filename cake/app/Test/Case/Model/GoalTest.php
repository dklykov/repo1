<?php
App::uses('Goal', 'Model');

/**
 * Goal Test Case
 *
 */
class GoalTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.goal', 'app.area', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Goal = ClassRegistry::init('Goal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Goal);

		parent::tearDown();
	}

}
