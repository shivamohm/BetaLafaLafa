<?php
App::uses('AppModel', 'Model');
/**
 * Brand Model
 *
 */
class Brand extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
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
			'isUnique' => array(
                            'rule' => 'isUnique',
                            'allowEmpty'=> false,
                            'required' => true,
                            'message' => 'This Brand Name already exists. Please enter a Brand Name'
              ),
		),
		
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
		//'shortdesc' => array(
			//'notEmpty' => array(
				//'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		//),
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
}
