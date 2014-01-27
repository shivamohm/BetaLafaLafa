<?php
App::uses('AppModel', 'Model');
/**
 * Cashback Model
 *
 * @property Store $Store
 * @property Affiliate $Affiliate
 * @property Brand $Brand
 * @property Category $Category
 */
class Cashback extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */     
    public $name = 'Cashback';
    public $actsAs = array('Search.Searchable');
    
    public $filterArgs = array(
        array('name' => 'id', 'type' => 'like'),
        array('name' => 'name', 'type' => 'like'),
        array('name' => 'status', 'type' => 'value'),
        array('name' => 'store_id', 'type' => 'value'),
    );
    
    function import($filename){
        $return	= "";
		$errorFlag = true;
		
        $handle		=	fopen($filename, "r");
        $headers		=	fgetcsv($handle);
        
        $header		=	array( '0'=>'name','1'=>'price_rule','2'=>'payout','3'=>'discount','4'=>'details','5'=>'tag','6'=>'start_date','7'=>'expiry_date','8'=>'cashback_type','9'=>'link','10'=>'utm','11'=>'affilite_key','12'=>'terms_cond','13'=>'store','14'=>'brand','15'=>'category','16'=>'subcategory','17'=>'subsubcategory','18'=>'affiliate');
        /*
        if($header[0] != $headers[0]){
			    return $return[]  =   array('Invalid Fields Name');
                $errorFlag = false;
		}*/
        #$return		=	array(  'messages' => array(), 'errors' => array(), );
        $i			=	1;
        
      
        
        while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
            
            if(count($row) < 16 ){
                #return $return  =   array(  'messages' => array(), 'errors' => array(__(sprintf('CSV file currupted. Please you can create new csv file then import here'), true)), );
                return $return[]  =   array('CSV file currupted. Please you can create new csv file then import here ');
                $errorFlag = false;
            }
            if($row[0] == ""){
                #return $return		=	array(  'messages' => array(), 'errors' => array(__(sprintf('Cashback Name can not be NUll for Row %d failed to save.',$i), true)), );
                return $return[]  =   array('Cashback Name can not be NUll for Row %d failed to save '.$i);
                $errorFlag = false;
            }
            if($row[2] == ""){
                #return $return		=	array(  'messages' => array(), 'errors' => array(__(sprintf('Payout can not be NULL for Row %d failed to save ',$i), true)), );
                return $return[]  =   array('Payout can not be NULL for Row %d failed to save '.$i);
                $errorFlag = false;
            }
            if($row[3] == ""){
                #return $return		=	array(  'messages' => array(), 'errors' => array(__(sprintf('Discount can not be NULL for Row %d failed to save .',$i), true)), );
                return $return[]  =   array('Discount can not be NULL for Row %d failed to save '.$i);
                $errorFlag = false;
            }
            if($row[6] == ""){
                #return $return		=	array(  'messages' => array(), 'errors' => array(__(sprintf('Cashback Start Date can not be NULL for Row %d failed to save  .',$i), true)), );
                return $return[]  =   array('Cashback Start Date can not be NULL for Row %d failed to save '.$i);
                $errorFlag = false;
            }
            if($row[7] == ""){
                #return $return		=	array(  'messages' => array(), 'errors' => array(__(sprintf('Cashback Expiry Date can not be NULL for Row %d failed to save  .',$i), true)), );
                return $return[]  =   array('Cashback Expiry Date can not be NULL for Row %d failed to save '.$i);
                $errorFlag = false;
            }
            if($row[9] == ""){
                #return $return		=	array(  'messages' => array(), 'errors' => array(__(sprintf('Cashback URL can not be NULL for Row %d failed to save  .',$i), true)), );
                return $return[]  =   array('Cashback URL can not be NULL for Row %d failed to save '.$i);
                $errorFlag = false;
            }
            if($row[13] == ""){
                #return $return		=	array(  'messages' => array(), 'errors' => array(__(sprintf('Merchant Name can not be NULL for Row %d failed to save .',$i), true)), );
                return $return[]  =   array('Merchant Name can not be NULL for Row %d failed to save '.$i);
                $errorFlag = false;
            }
            
            $data = array();
            
            if($row[18] !=""){
                    $AffiliateData	=	trim($row[18]);
            }else{  $AffiliateData = "";}
            
             if($row[17] !=""){
                    $subSubCategory	=	trim($row[17]);
            }else{  $subSubCategory = "";}
            
            
            if($row[16] !=""){
                    $subCategory	=	trim($row[16]);
            }else{  $subCategory = "";}
            
            if($row[15] !=""){
                    $categoryData	=	trim($row[15]);
            }else{  $categoryData = "";}

            if($row[14] !=""){
                    $brandData	=	trim($row[14]);
            }else{  $brandData = "";}

            if($row[13] !=""){
                    $storeData	=	trim($row[13]);
            }else{  $storeData = ""; }
            
             $cateCashback  = array();
            if($categoryData !=""){
                    $expCat =   explode("|",$categoryData);
                   
                    if($subCategory !=""){
                        $SubCat =   explode("|",$subCategory);
                    }else{  $SubCat = "";  }
                    
                    if($subSubCategory !=""){
                        $SubSubCategory =   explode("|",$subSubCategory);
                    }else{ $SubSubCategory = "";}
                    
                    #$CategoryId =   "";
                    foreach($expCat as $keyC=> $expCats){
                        $categoryData   =   "";
                        $categoryData   =   $expCats;
                        $categoryData	=   $this->categoryMatch($categoryData);
                        
                        if($categoryData !=""){
                            $categoryCount  = $this->Category->find('count', array('conditions' => array('Category.name' => trim($categoryData), 'Category.parent_id' => '0') ));
                            $categoryQuery  = $this->Category->find('list', array( 'fields' => array('id'),'conditions' => array('name' => trim($categoryData), 'Category.parent_id' => '0') ));
                            
                            if($categoryCount == 0){
                                #return $return  =   array(  'messages' => array(), 'errors' => array(__(sprintf('Category Name  '.$categoryData. ' does not match for Row %d failed to save.',$i), true)), );
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
                  
                  $cateCashback=   $CategoryId;
                  if(is_array($SubCat)){
                    if(count($CategoryId) == count($SubCat)){

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
                          } $cateCashback = array_merge($cateCashback, $subCategoryId);
                     }else{ 
                         #return $return  =   array(  'messages' => array(), 'errors' => array(__(sprintf('Category Name  and Sub Categoey  does not match for Row %d failed to save.',$i), true)), );
                         return $return[]  =   array('Category Name  and Sub Categoey  does not match for Row %d failed to save.'.$i);
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
                                        
                                        $subSubCatName   =  trim($expSubSubCatNameAllValue);
                                        $subSubCategoryCount = $this->Category->find('count', array('conditions' => array('Category.name' => $subSubCatName, 'Category.parent_id' => $mainSubCategoryId) ));
                                        $subSubCategoryQuery = $this->Category->find('list', array( 'fields' => array('id'),'conditions' => array('name' => $subSubCatName, 'Category.parent_id' => $mainSubCategoryId) ));

                                        if($subSubCategoryCount == 0){
                                            #return $return  =   array(  'messages' => array(), 'errors' => array(__(sprintf('Sub Sub Category Name  '.$subSubCatName. ' does not match for Row %d failed to save.',$i), true)), );
                                            return $return[]  =   array('Sub Sub Category Name  '.$subSubCatName. ' does not match for Row %d failed to save.'.$i);
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
                      
                        $cateCashback = array_merge($cateCashback, $subSubCategoryId);
                   }
            }
             $checkCategoryId	=	$CategoryId;
             
             $CategoryId =$subCategoryId= $subSubCategoryId="";
             
             foreach ($header as $k=>$head) {
                $head	=	trim($head);
                $data['Cashback'][$head]  =   (isset($row[$k])) ? $row[$k] : '';
            }
             
             $brandData          =   $data['Cashback']['brand'];
			 $storeData          =   $data['Cashback']['store'];
			 
			 /******************************Brand Save************************************************/
                $BrandInsId =   "";
                if($brandData !=""){
					$BrandInsId		=	$this->brandSave($brandData);
                } 
                $data['Cashback']['brand']		=	$BrandInsId;
                
                /******************************Brand Save************************************************/
                 /******************************Store Save************************************************/
                $StoreInsId =   "";
                if($storeData !=""){
					$StoreInsId = $this->storeSave($storeData, $BrandInsId, $cateCashback);
					$data['Cashback']['store_id']	= $StoreInsId;
					
                }
             
               /******************************Store Save************************************************/
               
				$CouponNameCount = $this->find('count', 
									array( 'conditions' => 
										array('Cashback.name' => trim($row[0]),
											   'Cashback.store_id' => $StoreInsId),
											   'joins' => array(
															array('table' => 'categories_cashbacks',
															'alias' => 'CategoriesCashback',
															'type' => 'INNER',
															'conditions' => array(
																			'CategoriesCashback.category_id' => $checkCategoryId,
																			'CategoriesCashback.cashback_id = Cashback.id'
																			)
															  )
															),
															'group' => 'Cashback.id'
										));
		
            if($CouponNameCount !=""){
				 
				$return[]  =   $row[0].'  Cashback name duplicate not allowed. Issue Row No. '.$i;
				$errorFlag = false;
			}
            
            $data['Category']['Category']= $cateCashback;
            $dataA[]  =   $data;
            $i++;
        }
       
		if(!$errorFlag){
			return $return;
			}
      
      
      
        /***************************After Validation**********************************************/
       
        $brandData=  $storeData= $AffiliateData="";
        if($errorFlag){
			$ii=1;
        foreach($dataA as $key=>$cashbackData){
            
          
            $categoryData       =   $cashbackData['Cashback']['category'];
            $subCategory        =   $cashbackData['Cashback']['subcategory'];
            $subSubCategory     =   $cashbackData['Cashback']['subsubcategory'];
          
            $brandId          	=   $cashbackData['Cashback']['brand'];
            $storeId          	=   $cashbackData['Cashback']['store_id'];
            $AffiliateData      =   $cashbackData['Cashback']['affiliate'];
            
            
            if($cashbackData['Cashback']['start_date'] != ""){
                    $stDate    =   date('Y-m-d H:m:s',strtotime(trim($cashbackData['Cashback']['start_date'])));
                }else{
                    $stDate    =   "0000-00-00 00:00:00";
                }
                
                if($cashbackData['Cashback']['expiry_date'] != ""){
                     $endDate    =   date('Y-m-d H:m:s',strtotime(trim($cashbackData['Cashback']['expiry_date'])));
                }else{
                    $endDate    =   "0000-00-00 00:00:00";
                }
                
                
                
                $dataCou['Cashback']['name']		=	trim($cashbackData['Cashback']['name']);
                $dataCou['Cashback']['price_rule']	=	trim($cashbackData['Cashback']['price_rule']);
                $dataCou['Cashback']['payout']		=       trim($cashbackData['Cashback']['payout']);
                $dataCou['Cashback']['discount']	=	trim($cashbackData['Cashback']['discount']);
                $dataCou['Cashback']['short_desc']	=	trim($cashbackData['Cashback']['details']);
                $dataCou['Cashback']['Tag']             =	trim($cashbackData['Cashback']['tag']);
                $dataCou['Cashback']['start_date']	=	$stDate;
                $dataCou['Cashback']['expiry_date']	=       $endDate;
                $dataCou['Cashback']['type']            =	trim($cashbackData['Cashback']['cashback_type']);
                $dataCou['Cashback']['url']             =	trim($cashbackData['Cashback']['link']);
                $dataCou['Cashback']['utm']		=	trim($cashbackData['Cashback']['utm']);
                $dataCou['Cashback']['affiliatekey']    =	trim($cashbackData['Cashback']['affilite_key']);
                $dataCou['Cashback']['terms_cond']      =	trim($cashbackData['Cashback']['terms_cond']);
                $dataCou['Cashback']['createdby']	=	'Admin';#$this->UserAuth->getGroupName();
                $dataCou['Cashback']['status']		=	1;
                $dataCou['Cashback']['createddate']	=	date('Y-m-d h:m:s');
                $dataCou['Cashback']['store_id']			=	$storeId;
                $dataCou['Brand']['Brand']					=	$brandId;
                
              
               /******************************Category Save************************************************/
                
              
              $dataCou['Category']['Category']    =   $cashbackData['Category']['Category'];
              
               /******************************Category Save************************************************/
              
                /******************************Affiliate Save************************************************/
               
                if($AffiliateData !=""){
                    $AffiliateQuery = $this->Affiliate->find('list', array( 'fields' => array('id'),'conditions' => array('name' => $AffiliateData) ));
                    $AffiliateCount = $this->Affiliate->find('count', array('conditions' => array('name' => $AffiliateData) ));
                    
                    if(!empty($AffiliateCount)){
                        foreach($AffiliateQuery as $affiliKey=>$value){
                            $AffiliateQuery[$affiliKey] =	$value;
                        }
                        $AffiliInsId = $AffiliateQuery[$affiliKey];
                    }else{
                        App::uses('Affiliate', 'Model');
                        $AffiliateAdd = new Affiliate();
                        $dataAffiliate['Affiliate']['name']             =	$AffiliateData;
                        #$dataAffiliate['Affiliate']['url']              =	trim($data['Cashback']['link']);
                        $dataAffiliate['Affiliate']['affiliate_source'] =	'LafaLafakomli';

                        $AffiliateAdd->save($dataAffiliate);
                        $AffiliInsId	=	$AffiliateAdd->getLastInsertID();
                    }
                }else{$AffiliInsId =   0;}
               
                $dataCou['Cashback']['affiliate_id']    =   $AffiliInsId;
                
                /******************************Affiliate Save************************************************/
                
                
        
            $this->create();
            $this->set($dataCou);
           
            if (!$this->save($dataCou, array('validates'=>false))) {
               
                 #$return    =	array(  'messages' => array(), 'errors' => array('Post for Row %d failed to save.',$i), );
                 $return  =   array('There are some problem in your Cashback File. Please check Cashback URL and  Category   '. $ii);
            } else {
              
                $return  =   array('19999'=>'Cashback File has been uploaded successfully. Total Recored - '. $ii);
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
			 count($storeQuery['Category']);
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

	
	
    public $validate = array(
		'cashbackcsv' => array(
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
		),/*
		'affiliate_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),/*
		'short_desc' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price_rule' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'payout' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'discount' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),/*
		'Tag' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'url' => array(
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
		
		'start_date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'expiry_date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
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
		#'pincodes' => array(
		#	'numeric' => array(
		#		'rule' => array('numeric'), 
		#		'message' => 'Please enter a valid Postal Code for India.',
				#'allowEmpty' => false,
				#'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
		#	),
		#	'minLength'=> array( 
         #       'rule' => array('minLength', 6), 
          #      'message' => 'Please enter a valid Postal Code for India.' 
           # ), 
            #'maxLength'=> array( 
             #   'rule' => array('maxLength', 6), 
              #  'message' => 'Please enter a valid Postal Code for India.' 
            #) 
		#),
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
			'joinTable' => 'brands_cashbacks',
			'foreignKey' => 'cashback_id',
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
			'joinTable' => 'categories_cashbacks',
			'foreignKey' => 'cashback_id',
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
