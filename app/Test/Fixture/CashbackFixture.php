<?php
/**
 * CashbackFixture
 *
 */
class CashbackFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'store_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'affiliate_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'short_desc' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'price_rule' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'payout' => array('type' => 'integer', 'null' => false, 'default' => null),
		'discount' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Tag' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'url' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'no_of_click' => array('type' => 'integer', 'null' => false, 'default' => null),
		'last_sale_track' => array('type' => 'integer', 'null' => false, 'default' => null),
		'start_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'expiry_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'utm' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'affiliatekey' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1),
		'createdby' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'createddate' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modifiedby' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'modifieddate' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'store_id' => 1,
			'affiliate_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'short_desc' => 'Lorem ipsum dolor sit amet',
			'price_rule' => 'Lorem ipsum dolor sit amet',
			'payout' => 1,
			'discount' => 'Lor',
			'Tag' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet',
			'no_of_click' => 1,
			'last_sale_track' => 1,
			'start_date' => '2013-12-30 16:28:50',
			'expiry_date' => '2013-12-30 16:28:50',
			'type' => 'Lorem ip',
			'utm' => 'Lorem ipsum dolor sit amet',
			'affiliatekey' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'createdby' => 'Lorem ipsum dolor sit amet',
			'createddate' => '2013-12-30 16:28:50',
			'modifiedby' => 'Lorem ipsum dolor sit amet',
			'modifieddate' => '2013-12-30 16:28:50'
		),
	);

}
