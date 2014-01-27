<?php
App::uses('AppModel', 'Model');
/**
 * Payment Model
 *
 * @property Customer $Customer
 */
class Payment extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
		'bank_account' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'pattern'=>array(
				'rule'      => '/^[a-zA-Z]+/i',
				'message'   => 'Please enter valid Bank Account',
			),
			'notEmpty'=> array( 
                'rule' => 'notEmpty', 
                'message' => 'Please enter valid Bank Account.' 
            ), 
            'allowedCharacters'=> array( 
                'rule' => '|^[a-zA-Z ]*$|', 
                'message' => 'Please enter valid Bank Account.' 
            ), 
            'minLength'=> array( 
                'rule' => array('minLength', 5), 
                'message' => 'Bank Account must be at least 5 characters long.' 
            ), 
            'maxLength'=> array( 
                'rule' => array('maxLength', 30), 
                'message' => 'Bank Account can not be longer that 30 characters.' 
            ) 
		),
		'bank_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter valid bank name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'pattern'=>array(
				'rule'      => '/^[a-zA-Z]+/i',
				'message'   => 'Please enter valid Bank Name',
			),
			'notEmpty'=> array( 
                'rule' => 'notEmpty', 
                'message' => 'Please enter valid Bank Account.' 
            ), 
            'allowedCharacters'=> array( 
                'rule' => '|^[a-zA-Z ]*$|', 
                'message' => 'Please enter valid Bank Account.' 
            ), 
            'minLength'=> array( 
                'rule' => array('minLength', 5), 
                'message' => 'Bank Name must be at least 5 characters long.' 
            ), 
            'maxLength'=> array( 
                'rule' => array('maxLength', 30), 
                'message' => 'Bank Name can not be longer that 30 characters.' 
            ) 
		),
		'branch_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'pattern'=>array(
				'rule'      => '/^[a-zA-Z]+/i',
				'message'   => 'Please enter valid Branch Name',
			),
			'notEmpty'=> array( 
                'rule' => 'notEmpty', 
                'message' => 'Please enter valid Branch Name.' 
            ), 
            'allowedCharacters'=> array( 
                'rule' => '|^[a-zA-Z ]*$|', 
                'message' => 'Please enter valid Branch Name.' 
            ), 
            'minLength'=> array( 
                'rule' => array('minLength', 5), 
                'message' => 'Branch Name must be at least 5 characters long.' 
            ), 
            'maxLength'=> array( 
                'rule' => array('maxLength', 30), 
                'message' => 'Branch Name can not be longer that 30 characters.' 
            ) 
		),
		'acc_no' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Enter your account carefully',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength'=> array( 
                'rule' => array('minLength', 10), 
                'message' => 'Account No must be at least 10 characters long.' 
            ), 
            'maxLength'=> array( 
                'rule' => array('maxLength', 15), 
                'message' => 'Account No can not be longer that 15 characters.' 
            )
		),
		'ifsc_code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength'=> array( 
                'rule' => array('minLength', 10), 
                'message' => 'IFSC Code must be at least 10 characters long.' 
            ), 
            'maxLength'=> array( 
                'rule' => array('maxLength', 15), 
                'message' => 'IFSC Code can not be longer that 15 characters.' 
            )
		),
		
		'name_on_address' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'pattern'=>array(
				'rule'      => '/^[a-zA-Z]+/i',
				'message'   => 'Please enter valid Name on Address',
			),
			'notEmpty'=> array( 
                'rule' => 'notEmpty', 
                'message' => 'Please enter valid Name on Address.' 
            ), 
            'allowedCharacters'=> array( 
                'rule' => '|^[a-zA-Z ]*$|', 
                'message' => 'Please enter valid Name on Address.' 
            ), 
            
            'maxLength'=> array( 
                'rule' => array('maxLength', 150), 
                'message' => 'Name on Address can not be longer that 30 characters.' 
            ) 
		),
		'address' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'pattern'=>array(
				'rule'      => '/^[a-zA-Z]+/i',
				'message'   => 'Please enter valid Name on Address',
			),
			'notEmpty'=> array( 
                'rule' => 'notEmpty', 
                'message' => 'Please enter Name on Address.' 
            ), 
            
            'maxLength'=> array( 
                'rule' => array('maxLength', 150), 
                'message' => 'Name on Address can not be longer that 30 characters.' 
            )
		),
		'city' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'pattern'=>array(
				'rule'      => '/^[a-zA-Z]+/i',
				'message'   => 'Please enter valid City',
			),
			'notEmpty'=> array( 
                'rule' => 'notEmpty', 
                'message' => 'Please enter valid City.' 
            ), 
            'allowedCharacters'=> array( 
                'rule' => '|^[a-zA-Z ]*$|', 
                'message' => 'Please enter valid City.' 
            ), 
            'minLength'=> array( 
                'rule' => array('minLength', 4), 
                'message' => 'City must be at least 4 characters long.' 
            ), 
            'maxLength'=> array( 
                'rule' => array('maxLength', 30), 
                'message' => 'City can not be longer that 30 characters.' 
            ) 
		),
		'state' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			
		),
		'pincode' => array(
			'numeric' => array(
				'rule' => array('numeric'), 
				'message' => 'Please enter a valid Postal Code for India.',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength'=> array( 
                'rule' => array('minLength', 6), 
                'message' => 'Please enter valid Mobile no.' 
            ), 
            'maxLength'=> array( 
                'rule' => array('maxLength', 6), 
                'message' => 'Please enter valid Mobile no.' 
            ) 
			
		),
	
		'mobile' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter valid Mobile No',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength'=> array( 
                'rule' => array('minLength', 10), 
                'message' => 'Please enter valid Mobile no.' 
            ), 
            'maxLength'=> array( 
                'rule' => array('maxLength', 10), 
                'message' => 'Please enter valid Mobile no.' 
            ) 
		),
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
