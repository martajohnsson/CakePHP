<?php
/* Comment Test cases generated on: 2012-01-19 16:02:19 : 1326988939*/
App::uses('Comment', 'Model');

/**
 * Comment Test Case
 *
 */
class CommentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.comment', 'app.snippet');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Comment = ClassRegistry::init('Comment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Comment);

		parent::tearDown();
	}

}
