<?php
App::uses('AppModel', 'Model');
/**
 * Coupon Model
 *
 * @property Store $Store
 * @property Brand $Brand
 * @property Category $Category
 */
 App::uses('Hash', 'Utility');
App::uses('Validation', 'Utility');

class Coupon extends AppModel {
    
    #var $name = 'coupon';
    
    public $name = 'Coupon';
    public $actsAs = array('Search.Searchable');
    
    public $filterArgs = array(
        array('name' => 'id', 'type' => 'like'),
        array('name' => 'name', 'type' => 'like'),
        array('name' => 'status', 'type' => 'value'),
        array('name' => 'coupon_code', 'type' => 'value'),
       
    );
	
    function import($filename) {
        
        #$filename	=	TMP . 'uploads' . DS . 'coupon' . DS . $filename;
        $handle		=	fopen($filename, "r");
        $header		=	fgetcsv($handle);
        #$header		=	array( '0'=>'category_id','1'=>'subcategory_id','2'=>'brand_id','3'=>'store','4'=>'coupon_code','5'=>'name','6'=>'desc','7'=>'start date','8'=>'end_date','9'=>'link'); 
        $header		=	array( '0'=>'coupon_code','1'=>'name','2'=>'desc','3'=>'start_date','4'=>'end_date','5'=>'link','6'=>'store','7'=>'brand','8'=>'category','9'=>'subcategory','10'=>'subsubcategory','11'=>'except_category','12'=>'coupon_tag','13'=>'pricerule','14'=>'reviews','15'=>'affiliate', '16'=>'coupon_type' );
        #$return		=	array(  'messages' => array(), 'errors' => array(), );
        $i		=	1;
        #$return		=	array(  'messages' => array(), 'errors' => array(), );
        	 
		$return	= "";
		$errorFlag = true;
        while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
            
            if(count($row) < 16 ){
                #return $return  =   array(  'messages' => array(), 'errors' => array(__(sprintf('CSV file currupted. Please you can create new csv file then import here'), true)), );
                return $return[]  =   array('CSV file currupted. Please you can create new csv file then import here');
                $errorFlag = false;
            }
            if($row[1] == ""){
                 #$return		=	array(  'messages' => array(), 'errors' => array(__(sprintf('Coupon Name can not be NUll for Row %d failed to save.',$i), true)), );
                 return $return[]		=	array('Coupon Name can not be NUll for Row %d failed to save. '.$i);
                 $errorFlag = false;
            }
            
            
            
            $data = array();
            
            if($row[15] !=""){
                    $AffiliateData	=	trim($row[15]);
            }else{  $AffiliateData = "";}
            
             if($row[10] !=""){
                    $subSubCategory	=	trim($row[10]);
            }else{  $subSubCategory = "";}
            
            
            if($row[9] !=""){
                    $subCategory	=	trim($row[9]);
            }else{  $subCategory = "";}
            
            if($row[8] !=""){
                    $categoryData	=	trim($row[8]);
            }else{  $categoryData = "";}

            if($row[7] !=""){
                    $brandData	=	trim($row[7]);
            }else{  $brandData = "";}

            if($row[6] !=""){
                    $storeData	=	trim($row[6]);
            }else{  $storeData = ""; }
            
            if($categoryData !=""){
                   
                   $expCat =   explode("|",$categoryData);
                   
                    if($subCategory !=""){
                        $SubCat =   explode("|",$subCategory);
                    }else{  $SubCat = "";  }
                    
                    if($subSubCategory !=""){
                        $SubSubCategory =   explode("|",$subSubCategory);
                    }else{ $SubSubCategory = "";}
                    
                    foreach($expCat as $keyC=> $expCats){
                        $categoryData   =   "";
                        $categoryData   =   $expCats;
                        $categoryData	=   $this->categoryMatch($categoryData);
                        
                        if($categoryData !=""){
                            $categoryCount  = $this->Category->find('count', array('conditions' => array('Category.name' => trim($categoryData), 'Category.parent_id' => '0') ));
                            $categoryQuery  = $this->Category->find('list', array( 'fields' => array('id'),'conditions' => array('name' => trim($categoryData), 'Category.parent_id' => '0') ));
                            
                            if($categoryCount == 0){
                                 #$return  =   array(  'messages' => array(), 'errors' => array(__(sprintf('Category Name  '.$categoryData. ' does not match for Row %d failed to save.',$i), true)), );
                                  return $return[]  =   array('Category Name  '.$categoryData. ' does not match for Row %d failed to save.'.$i);
                                 $errorFlag = false;
                            }
                            if(!empty($categoryCount)){
                               foreach($categoryQuery as $catKey=>$value){
                                       $categoryQuery[$catKey] =   $value;
                               }
                               $CategoryId[] = $categoryQuery[$catKey];
                           }
                        }
                   }
                   
                    $cateCoupon=   $CategoryId;
                    if(is_array($SubCat)){
                        if(count($CategoryId) == count($SubCat)){
                            $subCategoryId = "";
                            foreach($SubCat as $keySUb=>$keySUbValue){
                                
                                $subCatNameAll   =    trim($keySUbValue);
                                $mainCateId      =   "";
                                $mainCateId      =   $CategoryId[$keySUb];
                                if($subCatNameAll){
                                    $expSubCatNameAll  =   explode("-",$subCatNameAll);
                                    
                                    foreach($expSubCatNameAll as $expSubCatNameAllKay=>$expSubCatNameAllValue){
                                        
                                        $subCatName  =   trim($expSubCatNameAllValue);
                                        $subCategoryCount = $this->Category->find('count', array('conditions' => array('Category.name' => $subCatName, 'Category.parent_id' => $mainCateId) ));
                                        $subCategoryQuery = $this->Category->find('list', array( 'fields' => array('id'),'conditions' => array('name' => $subCatName, 'Category.parent_id' => $mainCateId) ));
                                        
                                        if($subCategoryCount == 0){
                                          #return $return  =   array(  'messages' => array(), 'errors' => array(__(sprintf('Sub Category Name  '.$subCatName. ' does not match for Row %d failed to save.',$i), true)), );
                                           return $return[]  =   array('Sub Category Name  '.$subCatName. ' does not match for Row %d failed to save.'.$i);
                                          $errorFlag = false;
                                        }
                                      
                                        if(!empty($subCategoryCount)){
                                            foreach($subCategoryQuery as $subCategoryQueryKey=>$subCategoryQueryValue){
                                                $subCategoryQuery[$subCategoryQueryKey] =   $subCategoryQueryValue;
                                            }
                                            $subCategoryId[] = $subCategoryQuery[$subCategoryQueryKey];
                                        }
                                    }
                                }
                          } 
                          $cateCoupon = array_merge($cateCoupon, $subCategoryId);
                     }else{ 
                         #return $return  =   array(  'messages' => array(), 'errors' => array(__(sprintf('Category Name  and Sub Categoey  does not match for Row %d failed to save.',$i), true)), );
                         return $return[]  =  array( 'Category Name  and Sub Categoey  does not match for Row %d failed to save.'.$i);
                         $errorFlag = false;
                     }
                   }
                   
                    if(is_array($SubSubCategory)){
                        
                        foreach($SubSubCategory as $keySubSUb=>$keySubSubValue){
                            
                            $subSubCatNameAll  =   trim($keySubSubValue);
                            $mainSubCategoryId =   "";
                            $mainSubCategoryId =   $subCategoryId[$keySubSUb];
                            
                            $expSubSubCatNameAll  =   explode("-",$subSubCatNameAll);
                            
                            foreach($expSubSubCatNameAll as $expSubSubCatNameAllKay=>$expSubSubCatNameAllValue){
                                if($expSubSubCatNameAllValue){
                                    $subSubCatName       =  trim($expSubSubCatNameAllValue);
                                    $subSubCategoryCount = $this->Category->find('count', array('conditions' => array('Category.name' => $subSubCatName, 'Category.parent_id' => $mainSubCategoryId) ));
                                    $subSubCategoryQuery = $this->Category->find('list', array( 'fields' => array('id'),'conditions' => array('name' => $subSubCatName, 'Category.parent_id' => $mainSubCategoryId) ));
                                    
                                    if($subSubCategoryCount == 0){
                                        #return $return  =   array(  'messages' => array(), 'errors' => array(__(sprintf('Sub Sub Category Name  '.$subSubCatName. ' does not match for Row %d failed to save.',$i), true)), );
                                         return $return  =   array('Sub Sub Category Name  '.$subSubCatName. ' does not match for Row %d failed to save.'.$i);
                                        $errorFlag = false;
                                    }
                                    if(!empty($subSubCategoryCount)){
                                        foreach($subSubCategoryQuery as $subSubCategoryQueryKey=>$subSubCategoryQueryValue){
                                            $subSubCategoryQuery[$subSubCategoryQueryKey] =   $subSubCategoryQueryValue;
                                        }
                                        $subSubCategoryId[] = $subSubCategoryQuery[$subSubCategoryQueryKey];
                                    }
                               }
                           }
                       }
                      
                        $cateCoupon = array_merge($cateCoupon, $subSubCategoryId);
                   }
            }
			$checkCategoryId	=	$CategoryId;
            $CategoryId =$subCategoryId= $subSubCategoryId="";
            
             foreach ($header as $k=>$head) {
                $head	=	trim($head);
                $data['Coupon'][$head]  =   (isset($row[$k])) ? $row[$k] : '';
            }
            
            $brandData          =   $data['Coupon']['brand'];
            $storeData          =   $data['Coupon']['store'];
            
            
               /******************************Brand Save************************************************/
                $BrandInsId =   "";
                if($brandData !=""){
					$BrandInsId		=	$this->brandSave($brandData);
                } 
                $data['Coupon']['brand']		=	$BrandInsId;
                
                /******************************Brand Save************************************************/
                 /******************************Store Save************************************************/
                $StoreInsId =   "";
                if($storeData !=""){
					$StoreInsId = $this->storeSave($storeData, $BrandInsId, $cateCoupon);
					$data['Coupon']['store_id']	= $StoreInsId;
					
                }
              
               /******************************Store Save************************************************/
                
            #$CouponNameCount  = $this->find('all', array('conditions' => array('Coupon.name' => trim($row[1]), 'Coupon.status' => '1') ));
           # $CouponNameCount  = $this->find('first', array('conditions' => array('Coupon.store_id' => trim(14),'Coupon.Category.id' => trim(74), 'Coupon.status' => '1') ));
          
           $CouponNameCount = $this->find('count', 
									array( 'conditions' => 
										array('Coupon.name' => trim($row[1]),
											   'Coupon.store_id' => $StoreInsId),
											   'joins' => array(
															array('table' => 'categories_coupons',
															'alias' => 'CategoriesCoupon',
															'type' => 'INNER',
															'conditions' => array(
																			'CategoriesCoupon.category_id' => $checkCategoryId,
																			'CategoriesCoupon.coupon_id = Coupon.id'
																			)
															  )
															),
															'group' => 'Coupon.id'
										));
			
            if($CouponNameCount !=""){
				 
				$return[]  =   $row[1].'  coupon name duplicate not allowed. Issue Row No. '.$i;
				$errorFlag = false;
			}
            
            $data['Category']['Category']= $cateCoupon;
            $dataA[]  =   $data;
            
            $i++;
            #pr($row);
           
        }
        
		if(!$errorFlag){
			return $return;
			}
      
        /***************************Loop**********************************************/
        
       
        $categoryData = $subCategory =$brandData=  $storeData= $AffiliateData="";
        if($errorFlag){
			$ii=1;
			
        foreach($dataA as $key=>$couponsData){
            
           
            $categoryData       =   $couponsData['Coupon']['category'];
            $subCategory        =   $couponsData['Coupon']['subcategory'];
            $subSubCategory     =   $couponsData['Coupon']['subsubcategory'];
            $brandId          =   $couponsData['Coupon']['brand'];
            $storeId          =   $couponsData['Coupon']['store_id'];
            $AffiliateData      =   $couponsData['Coupon']['affiliate'];
            
            if($couponsData['Coupon']['start_date'] != ""){
                    $stDate    =   date('Y-m-d H:m:s',strtotime(trim($couponsData['Coupon']['start_date'])));
                }else{
                    $stDate    =   "0000-00-00 00:00:00";
                }
                
                if($couponsData['Coupon']['end_date'] != ""){
                     $endDate    =   date('Y-m-d H:m:s',strtotime(trim($couponsData['Coupon']['end_date'])));
                }else{
                    $endDate    =   "0000-00-00 00:00:00";
                }
                
                
                $dataCou['Coupon']['coupon_code']	=	trim($couponsData['Coupon']['coupon_code']);
                $dataCou['Coupon']['name']			=	trim($couponsData['Coupon']['name']);
                  
                $dataCou['Coupon']['pricerule']		=	trim($couponsData['Coupon']['pricerule']);
                $dataCou['Coupon']['reviews']		=	trim($couponsData['Coupon']['reviews']);
                $dataCou['Coupon']['coupon_tag']	=	trim($couponsData['Coupon']['coupon_tag']);
                $dataCou['Coupon']['coupontype']	=	trim($couponsData['Coupon']['coupon_type']);
                $dataCou['Coupon']['except_category']	=	trim($couponsData['Coupon']['except_category']);
                $dataCou['Coupon']['desc']				=	trim($couponsData['Coupon']['desc']);
                $dataCou['Coupon']['start_date']		=	$stDate;
                $dataCou['Coupon']['end_date']			=       $endDate;
                $dataCou['Coupon']['link']				=	trim($couponsData['Coupon']['link']);
                $dataCou['Coupon']['createby']			=	'';#$this->UserAuth->getGroupName();
                $dataCou['Coupon']['status']			=	1;
                $dataCou['Coupon']['createddate']		=	date('Y-m-d h:m:s');
                $dataCou['Coupon']['filename']			=	$filename;
                $dataCou['Coupon']['store_id']			=	$storeId;
                $dataCou['Brand']['Brand']				=	$brandId;
                
              
               /******************************Category Save************************************************/
               $dataCou['Category']['Category']    =    $couponsData['Category']['Category'];
               
               /******************************Category Save************************************************/
               
                /******************************Affiliate Save************************************************/
                
                if($AffiliateData !=""){
                    $AffiliateQuery = $this->Affiliate->find('list', array( 'fields' => array('id'),'conditions' => array('name' => $AffiliateData) ));
                    $AffiliateCount = $this->Affiliate->find('count', array('conditions' => array('name' => $AffiliateData) ));
                    #pr($AffiliateQuery);

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
                
                #pr($dataCou);
        
            $this->create();
            $this->set($dataCou);
           
            if (!$this->save($dataCou, array('validates'=>false))) {
              
                #pr($this->validates);
               
                #$return['messages'][] = __(sprintf('Post for Row %d  to save.',$i), true);
                 #$return['errors'][] = __(sprintf('Post for Row %d failed to save.',$i), true);
                 #$return['messages'] = __('', true);
                 #$return    =	array(  'messages' => array(), 'errors' => array('Post for Row %d failed to save.',$i), );
                #$return  =   array('messages' => array(), 'errors' => array(('Coupon File for failed to save  '. $i)));
                $return  =   array('There are some problem in your Coupon File. Please check Coupon URL and  Category   '. $ii);
                 
            } else {
               # $return['messages'][] = __(sprintf('Post for Row %d  to save.',$i), true);
                #$return['errors'] = __('', true);
               # $return['errors'] = __('', false);
               $return  =   array('19999'=>'Coupon File has been uploaded successfully. Total Recored - '. $ii);
                #$return		=	array(  'messages' => array('Post for Row %d  to save.',$i), 'errors' => array(), );
            }
            $ii++;
        }
        
        fclose($handle);
		}
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
    
    
    function brandSave($brandData){
		
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
		return $BrandInsId;
	}
	
	function storeSave($storeData, $brandId, $StoreCategoryId){
		#pr($StoreCategoryId);
		
		#$storeQuery = $this->Store->find('list', array( 'fields' => array('id'),'conditions' => array('name' => $storeData) ));
		$storeQuery = $this->Store->find('first', array( 'conditions' => array('name' => $storeData) ));
		
		
		$storeCount = $this->Store->find('count', array('conditions' => array('name' => $storeData) ));
		
		
		
		App::uses('Store', 'Model');
		$storeAdd = new Store();
		if(!empty($storeCount)){
			$getCat = "";
			echo count($storeQuery['Category']);
			if(count($storeQuery['Category']) != 0){
			
			foreach($storeQuery['Category'] as $storeKey=>$value){
				
				$getCat[$storeKey]	=	$value['id'];
				
			}
			
			$StoreCategoryId	=	array_merge($getCat, $StoreCategoryId);
			}else{
				$StoreCategoryId	=	$StoreCategoryId;
				}
			
			$StoreInsId = $storeQuery['Store']['id'];
			
			
			$StoreInsId = $storeQuery['Store']['id'];
			$dataStore['Store']['id']		 	=	$StoreInsId;
			$dataStore['Store']['name']		 	=	$storeData;
			$dataStore['Store']['storedesc'] 	=	$storeData;
			$dataStore['Store']['status']    	=	'1';
			#$dataStore['Brand']['Brand']     	=	$dataCou['Brand']['Brand'];
			$dataStore['Brand']['Brand']     	=	$brandId;
			#$dataStore['Category']['Category']	=	$couponsData['Category']['Category'];
			$dataStore['Category']['Category']	=	$StoreCategoryId;
			#pr($dataStore);
			
			$storeAdd->save($dataStore);
			
		}else{
			
			
			
			$dataStore['Store']['name']		 	=	$storeData;
			$dataStore['Store']['storedesc'] 	=	$storeData;
			$dataStore['Store']['status']    	=	'1';
			#$dataStore['Brand']['Brand']     	=	$dataCou['Brand']['Brand'];
			$dataStore['Brand']['Brand']     	=	$brandId;
			#$dataStore['Category']['Category']	=	$couponsData['Category']['Category'];
			$dataStore['Category']['Category']	=	$StoreCategoryId;
			#pr($dataStore);
			
			$storeAdd->save($dataStore);
			$StoreInsId	=	$storeAdd->getLastInsertID();
		}
		
		return $StoreInsId;
	}

	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
	 
	 'couponcsv' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Your custom message here',
				#'allowEmpty' => false,
				#'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'extension' => array(
			'rule' => array('extension', array('csv')),
				#'allowEmpty' => false,
				#'required' => true,
				#'last' => false, // Stop validation after this rule
				#'on' => 'create',
				#'message' => 'Only csv files',
			),
			
		),
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
				#'message' => 'Your custom message here',
				#'allowEmpty' => false,
				#'required' => true,
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
			'isUnique' => array(
                            'rule' => 'isUnique',
                            'allowEmpty'=> false,
                            'required' => true,
                            'message' => 'This Coupon Name already exists. Please specify a unique Coupon Name'
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
			 array( 
				'required' => true, 
				'allowEmpty' => false, 
				'rule' => array('url', true), 
				'message' => 'Please enter a valid URL.', 
				'last' => true), 
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
