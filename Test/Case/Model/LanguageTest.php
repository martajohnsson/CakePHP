<?php
/* Language Test cases generated on: 2012-01-19 16:02:55 : 1326988975*/
App::uses('Language', 'Model');

/**
 * Language Test Case
 *
 */
class LanguageTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.language', 'app.snippet');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Language = ClassRegistry::init('Language');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Language);

		parent::tearDown();
	}

}
