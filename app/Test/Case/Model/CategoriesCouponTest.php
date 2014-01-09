<?php
App::uses('CategoriesCoupon', 'Model');

/**
 * CategoriesCoupon Test Case
 *
 */
class CategoriesCouponTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categories_coupon',
		'app.coupon',
		'app.store',
		'app.brand',
		'app.brands_store',
		'app.category',
		'app.categories_store',
		'app.brands_coupon'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriesCoupon = ClassRegistry::init('CategoriesCoupon');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriesCoupon);

		parent::tearDown();
	}

}
