<?php
App::uses('CategoriesStore', 'Model');

/**
 * CategoriesStore Test Case
 *
 */
class CategoriesStoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categories_store',
		'app.store',
		'app.brand',
		'app.brands_store',
		'app.category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriesStore = ClassRegistry::init('CategoriesStore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriesStore);

		parent::tearDown();
	}

}
