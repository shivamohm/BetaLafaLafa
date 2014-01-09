<?php
/**
 * CategoriesCashbackFixture
 *
 */
class CategoriesCashbackFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'cashback_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'category_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => null),
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
			'cashback_id' => 1,
			'category_id' => 1,
			'parent_id' => 1
		),
	);

}
