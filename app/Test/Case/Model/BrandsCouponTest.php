<?php
App::uses('BrandsCoupon', 'Model');

/**
 * BrandsCoupon Test Case
 *
 */
class BrandsCouponTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.brands_coupon',
		'app.coupon',
		'app.store',
		'app.brand',
		'app.brands_store',
		'app.category',
		'app.categories_store',
		'app.categories_coupon'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BrandsCoupon = ClassRegistry::init('BrandsCoupon');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BrandsCoupon);

		parent::tearDown();
	}

}
