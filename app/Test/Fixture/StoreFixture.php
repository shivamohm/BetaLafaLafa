<?php
/**
 * StoreFixture
 *
 */
class StoreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'storeurl' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 160, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'affiliatesurl' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'storedesc' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'owner_email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'owner_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'owner_mobile' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'image' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1),
		'noofclick' => array('type' => 'integer', 'null' => false, 'default' => null),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'storeurl' => 'Lorem ipsum dolor sit amet',
			'affiliatesurl' => 'Lorem ipsum dolor sit amet',
			'storedesc' => 'Lorem ipsum dolor sit amet',
			'owner_email' => 'Lorem ipsum dolor sit amet',
			'owner_name' => 'Lorem ipsum dolor sit amet',
			'owner_mobile' => 'Lorem ips',
			'image' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'noofclick' => 1,
			'createdby' => 'Lorem ipsum dolor sit amet',
			'createddate' => '2013-12-06 14:27:31',
			'modifiedby' => 'Lorem ipsum dolor sit amet',
			'modifieddate' => '2013-12-06 14:27:31'
		),
	);

}
