<?php
/* Snippet Test cases generated on: 2012-01-19 16:03:34 : 1326989014*/
App::uses('Snippet', 'Model');

/**
 * Snippet Test Case
 *
 */
class SnippetTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.snippet', 'app.language', 'app.user', 'app.comment');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Snippet = ClassRegistry::init('Snippet');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Snippet);

		parent::tearDown();
	}

}
