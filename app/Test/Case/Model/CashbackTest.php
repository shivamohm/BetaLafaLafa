<?php
App::uses('Cashback', 'Model');

/**
 * Cashback Test Case
 *
 */
class CashbackTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.brands_cashback',
		'app.categories_cashback'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cashback = ClassRegistry::init('Cashback');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cashback);

		parent::tearDown();
	}

}
