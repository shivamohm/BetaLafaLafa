<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Category $ParentCategory
 * @property Category $ChildCategory
 */
class Category extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $actsAs = array('Tree');
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			/*'isUnique' => array(
                            'rule' => 'isUnique',
                            'allowEmpty'=> false,
                            'required' => true,
                            'message' => 'This Brand Name already exists. Please enter a Brand Name'
              ), */
		),
		#'parent_id' => array(
		#	'numeric' => array(
		#		'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
		#	),
		#),
		
		'image' => array(
                    'extension' => array(
                        'rule' => array('extension', array('png', 'jpg','jpeg','gif')),
                        'required' => false,
                        'allowEmpty' => true,
                        'message' => 'Images must be in PNG, JPG,JPEG,GIF format'
                    ),
                    'size' => array(
                        'rule' => array('fileSize', '<', '2MB'),
                        'message' => 'Images must be no larger than 2MB'
                    )
		),
		
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentCategory' => array(
			'className' => 'Category',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ChildCategory' => array(
			'className' => 'Category',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
