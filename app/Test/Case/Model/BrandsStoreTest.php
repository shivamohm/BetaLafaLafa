<?php
App::uses('BrandsStore', 'Model');

/**
 * BrandsStore Test Case
 *
 */
class BrandsStoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.brands_store',
		'app.store',
		'app.brand',
		'app.category',
		'app.categories_store'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BrandsStore = ClassRegistry::init('BrandsStore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BrandsStore);

		parent::tearDown();
	}

}
