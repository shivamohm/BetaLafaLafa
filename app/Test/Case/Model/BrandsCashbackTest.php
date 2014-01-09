<?php
App::uses('BrandsCashback', 'Model');

/**
 * BrandsCashback Test Case
 *
 */
class BrandsCashbackTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.brands_cashback',
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
		'app.categories_cashback'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BrandsCashback = ClassRegistry::init('BrandsCashback');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BrandsCashback);

		parent::tearDown();
	}

}
