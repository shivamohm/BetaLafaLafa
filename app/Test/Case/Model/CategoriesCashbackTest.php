<?php
App::uses('CategoriesCashback', 'Model');

/**
 * CategoriesCashback Test Case
 *
 */
class CategoriesCashbackTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categories_cashback',
		'app.cashback',
		'app.store',
		'app.brand',
		'app.brands_store',
		'app.category',
		'app.categories_store',
		'app.affiliate',
		'app.coupon',
		'app.brands_coupon',
		'app.categories_coupon',
		'app.brands_cashback'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriesCashback = ClassRegistry::init('CategoriesCashback');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriesCashback);

		parent::tearDown();
	}

}
