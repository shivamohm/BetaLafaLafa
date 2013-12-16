<?php
App::uses('AppModel', 'Model');
/**
 * Coupon Model
 *
 * @property Store $Store
 * @property Brand $Brand
 * @property Category $Category
 */
class Coupon extends AppModel {
    
    var $name = 'coupon';
    
    function import($filename) {
        
        #$filename	=	TMP . 'uploads' . DS . 'coupon' . DS . $filename;
        $handle		=	fopen($filename, "r");
        $header		=	fgetcsv($handle);
        #$header		=	array( '0'=>'category_id','1'=>'subcategory_id','2'=>'brand_id','3'=>'store','4'=>'coupon_code','5'=>'name','6'=>'desc','7'=>'start date','8'=>'end_date','9'=>'link');
        $header		=	array( '0'=>'coupon_code','1'=>'name','2'=>'desc','3'=>'start_date','4'=>'end_date','5'=>'link','6'=>'store','7'=>'brand_id','8'=>'category_id','9'=>'subcategory_id');
        $return		=	array(  'messages' => array(), 'errors' => array(), );
        $i			=	1;
        
        while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
            
            $data = array();

            #if($row[0] !=""){
            if($row[9] !=""){
                    $AffiliateData	=	trim($row[9]);

            }else{  $AffiliateData = "";}
            if($row[8] !=""){
                    $categoryData	=	trim($row[8]);

            }else{  $categoryData = "";}

            #if($row[2] !=""){
            if($row[7] !=""){
                    $brandData	=	trim($row[7]);

            }else{  $brandData = "";}

            if($row[6] !=""){
                    $storeData	=	trim($row[6]);

            }else{  $storeData = ""; }


            foreach ($header as $k=>$head) {
                $head	=	trim($head);
                $data['Coupon'][$head]=(isset($row[$k])) ? $row[$k] : '';
            }
           # pr($data);
            if($data['Coupon']){
                
                if($data['Coupon']['start_date'] != ""){
                    $stDate    =   date('Y-m-d H:m:s',strtotime(trim($data['Coupon']['start_date'])));
                }else{
                    $stDate    =   "0000-00-00 00:00:00";
                }
                if($data['Coupon']['end_date'] != ""){
                    $endDate    =   date('Y-m-d H:m:s',strtotime(trim($data['Coupon']['end_date'])));
                }else{
                    $endDate    =   "0000-00-00 00:00:00";
                }
                $dataCou['Coupon']['coupon_code']	=	trim($data['Coupon']['coupon_code']);
                $dataCou['Coupon']['name']		=	trim($data['Coupon']['name']);
                $dataCou['Coupon']['desc']		=	trim($data['Coupon']['desc']);
                $dataCou['Coupon']['start_date']	=	$stDate;
                $dataCou['Coupon']['end_date']		=       $endDate;
                $dataCou['Coupon']['link']		=	trim($data['Coupon']['link']);
                $dataCou['Coupon']['createby']		=	'';#$this->UserAuth->getGroupName();
                $dataCou['Coupon']['status']		=	1;
                $dataCou['Coupon']['createddate']	=	date('Y-m-d h:m:s');
                
                /******************************Category Save************************************************/
                $CategoryInsId      =   "";
		if($categoryData !=""){
                    $categoryData	= $this->categoryMatch($categoryData);
                    if($categoryData !=""){
                        $categoryQuery 	= $this->Category->ParentCategory->find('list', array( 'fields' => array('id'),'conditions' => array('name' => $categoryData) ));
                        $categoryCount = $this->Category->find('count', array('conditions' => array('Category.name' => $categoryData) ));

                        if(!empty($categoryCount)){
                                foreach($categoryQuery as $catKey=>$value){
                                        $categoryQuery[$catKey] =	$value;
                                }
                                $CategoryInsId = $categoryQuery[$catKey];

                        }else{

                            App::uses('Category', 'Model');
                            $categoryAdd = new Category();
                            $dataCategory['Category']['name']		=	$categoryData;
                            $dataCategory['Category']['parent_id']	=	"0";
                            $dataCategory['Category']['shortdesc']	=	$categoryData;
                            $dataCategory['Category']['status']		=       1;
                            #$dataCategory['Category']['createddate']   =	"";

                            $categoryAdd->save($dataCategory);
                            $CategoryInsId  =	$categoryAdd->getLastInsertID();
                        }
                   
                    }
                } $dataCou['Category']['Category']		=	$CategoryInsId;
                /******************************Category Save************************************************/
                /******************************Brand Save************************************************/
                $BrandInsId =   "";
                if($brandData !=""){
                    $brandCount =	$this->Brand->find('count', array('fields' => array('id'), 'conditions' => array('name' =>$brandData)));
                    $brandQuery =	$this->Brand->find('list', array('fields' => array('id'), 'conditions' => array('name' =>$brandData)));
                
                    if(!empty($brandCount)){
                        foreach($brandQuery as $key=>$value){
                            $brandQuery[$key] =	$value;
                        }
                        $BrandInsId    = $brandQuery[$key];
                       
                    }else{
                        App::uses('Brand', 'Model');
                        $brandAdd = new Brand();
                        $dataBrand['Brand']['name']		=	$brandData;
                        $dataBrand['Brand']['shortdesc']	=	$brandData;
                        $dataBrand['Brand']['status']	=	'1';

                        $brandAdd->save($dataBrand);

                        $BrandInsId	=	$brandAdd->getLastInsertID();
                        
                    }
                }
                $dataCou['Brand']['Brand']		=	$BrandInsId;
                /******************************Brand Save************************************************/
                /******************************Store Save************************************************/
                $StoreInsId =   "";
                if($storeData !=""){
                    $storeQuery = $this->Store->find('list', array( 'fields' => array('id'),'conditions' => array('name' => $storeData) ));
                    $storeCount = $this->Store->find('count', array('conditions' => array('name' => $storeData) ));
                    #pr($storeQuery);

                    if(!empty($storeCount)){
                        foreach($storeQuery as $storeKey=>$value){
                            $storeQuery[$storeKey] =	$value;
                        }
                        $StoreInsId = $storeQuery[$storeKey];
                    }else{
                        App::uses('Store', 'Model');
                        $storeAdd = new Store();
                        $dataStore['Store']['name']		=	$storeData;
                        $dataStore['Store']['storedesc']	=	$storeData;
                        $dataStore['Store']['status']           =	'1';
                        $dataStore['Brand']['Brand']            =	$dataCou['Brand']['Brand'];
                        $dataStore['Category']['Category']	=	$dataCou['Category']['Category'];

                        $storeAdd->save($dataStore);
                        $StoreInsId	=	$storeAdd->getLastInsertID();
                    }
                }
                $dataCou['Coupon']['store_id']		=	$StoreInsId;
                /******************************Store Save************************************************/
                
                /******************************Affiliate Save************************************************/
                
                
                if($AffiliateData !=""){
                    $AffiliateQuery = $this->Affiliate->find('list', array( 'fields' => array('id'),'conditions' => array('name' => $AffiliateData) ));
                    echo $AffiliateCount = $this->Affiliate->find('count', array('conditions' => array('name' => $AffiliateData) ));
                    pr($AffiliateQuery);

                    if(!empty($AffiliateCount)){
                        foreach($AffiliateQuery as $affiliKey=>$value){
                            $AffiliateQuery[$affiliKey] =	$value;
                        }
                        $AffiliInsId = $AffiliateQuery[$affiliKey];
                    }else{
                        App::uses('Affiliate', 'Model');
                        $AffiliateAdd = new Affiliate();
                        $dataAffiliate['Affiliate']['name']             =	$AffiliateData;
                        $dataAffiliate['Affiliate']['url']              =	trim($data['Coupon']['link']);
                        $dataAffiliate['Affiliate']['affiliate_source'] =	'LafaLafakomli';

                        $AffiliateAdd->save($dataAffiliate);
                        $AffiliInsId	=	$AffiliateAdd->getLastInsertID();
                    }
                }else{$AffiliInsId =   0;}
                
                $dataCou['Coupon']['affiliate_id']		=	$AffiliInsId;
                
                /******************************Affiliate Save************************************************/
                
	}
        
	pr($dataCou);
        
        $this->create();
        $this->set($dataCou);
        #$this->set($data);
        #if ( !$this->save($data)) {
        #if ( !$this->save($dataCou)) {
            #$return['errors'][] = __(sprintf('Post for Row %d failed to save.',$i), true);
        #}
        if ($this->save($dataCou)) {
            $return['messages'][] = __(sprintf('Post for Row %d  to save.',$i), true);
	} else {
            $return['errors'][] = __(sprintf('Post for Row %d failed to save.',$i), true);
        }
        $i++;
     }
     
     fclose($handle);
     return $return;
    }
    
    function categoryMatch($categoryName){
        
        $categoryData	=	strtolower($categoryName);
	$stCate			=	$this->SiteSelfCategory();
	if(array_key_exists($categoryData, $stCate)){
            return  $stCate[$categoryData];
	}else{
            return $categoryName;
        }
    }
    
    function SiteSelfCategory(){
        
        $stCate		=	array("Footwear"=>"Shoes","Sneakers"=>"Shoes","Customized Products"=>"");
	$files		=	array_map('strtolower', $stCate);
	$data		=	array_change_key_case($files,CASE_LOWER);
	return $data;
    }
    
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'store_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
               
            'coupon_type' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
		'link' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
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
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'store_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
            'Affiliate' => array(
			'className' => 'Affiliate',
			'foreignKey' => 'affiliate_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Brand' => array(
			'className' => 'Brand',
			'joinTable' => 'brands_coupons',
			'foreignKey' => 'coupon_id',
			'associationForeignKey' => 'brand_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Category' => array(
			'className' => 'Category',
			'joinTable' => 'categories_coupons',
			'foreignKey' => 'coupon_id',
			'associationForeignKey' => 'category_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
