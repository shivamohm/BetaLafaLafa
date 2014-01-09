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
        $header		=	array( '0'=>'coupon_code','1'=>'name','2'=>'desc','3'=>'start_date','4'=>'end_date','5'=>'link','6'=>'store','7'=>'brand','8'=>'category','9'=>'subcategory','10'=>'subsubcategory','11'=>'except_category','12'=>'coupon_tag','13'=>'pricerule','14'=>'reviews','15'=>'affiliate', '16'=>'coupon_type' );
        $return		=	array(  'messages' => array(), 'errors' => array(), );
        $i			=	1;
        $return		=	array(  'messages' => array(), 'errors' => array(), );
        while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
            
            if(count($row) < 16 ){
                return $return  =   array(  'messages' => array(), 'errors' => array(__(sprintf('CSV file currupted. Please you can create new csv file then import here'), true)), );
            }
            if($row[1] == ""){
                return $return		=	array(  'messages' => array(), 'errors' => array(__(sprintf('Coupon Name can not be NUll for Row %d failed to save.',$i), true)), );
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
                        $categoryData   =   $expCats;
                        $categoryData	=   $this->categoryMatch($categoryData);
                        if($categoryData !=""){
                            $categoryCount  = $this->Category->find('count', array('conditions' => array('Category.name' => trim($categoryData), 'Category.parent_id' => '0') ));
                            $categoryQuery  = $this->Category->find('list', array( 'fields' => array('id'),'conditions' => array('name' => trim($categoryData), 'Category.parent_id' => '0') ));
                            
                            if($categoryCount == 0){
                                return $return  =   array(  'messages' => array(), 'errors' => array(__(sprintf('Category Name  '.$categoryData. ' does not match  %d failed to save.',$i), true)), );
                            }
                            if(!empty($categoryCount)){
                               foreach($categoryQuery as $catKey=>$value){
                                       $categoryQuery[$catKey] =   $value;
                               }
                               $CategoryId = $categoryQuery[$catKey];
                               #$dataA['Coupon']['Categorys'][]  =   $CategoryId;
                           }
                           $getAllcsvCubCatAccToMainCat = "";
                           if($SubCat !=""){
                           foreach($SubCat as $keySUb=>$keySUbValue){
                                $completeSubCat     =   explode("-",$keySUbValue);
                                foreach($completeSubCat as $completeSubCatKey=>$completeSubCatValue){
                                    if($completeSubCatValue !=""){
                                       #$getAllcsvCubCatAccToMainCat[$CategoryId][$completeSubCatKey]  =   trim($completeSubCatValue);
                                        
                                       $completeSubCatValue =   trim($completeSubCatValue);
                                       
                                        $subCatCheckQuery    =   $this->Category->find('list', array( 'fields' => array('id'),'conditions' => array('name' =>$completeSubCatValue, 'Category.parent_id' =>$CategoryId)));
                                        $subCatCheckCount    =   $this->Category->find('count', array('conditions' => array('Category.name' =>$completeSubCatValue, 'Category.parent_id' => $CategoryId) ));
                                        
                                        if($subCatCheckCount == 0){
                                            return $return  =	array(  'messages' => array(), 'errors' => array(__(sprintf('Sub Category Name  '.$completeSubCatValue. ' does not match  %d failed to save.',$i), true)), );
                                        }
                                       
                                        if(!empty($subCatCheckCount)){
                                            foreach($subCatCheckQuery as $SUBcatKey=>$SUBvalue){
                                                $subCatCheckQuery[$SUBcatKey] =  $SUBvalue;
                                            }
                                            $SubCategoryId  =   $subCatCheckQuery[$SUBcatKey];
                                            #$dataA['Coupon']['Categorys'][] =   $SubCategoryId;
                                        } 
                                        $completeSubSubCat  =   "";
                                        if($subSubCategory !=""){  
                                            foreach($SubSubCategory as $keySubSUb=>$keySUbSubValue){
                                            
                                                $completeSubSubCat     =   explode("-",$keySUbSubValue);
                                                
                                                foreach($completeSubSubCat as $completeSubSubCatKey=>$completeSubSubCatValue){
                                                    if($completeSubSubCatValue !=""){
                                                       #$getAllcsvCubCatAccToMainCat[$CategoryId][$completeSubCatKey]  =   trim($completeSubCatValue);
                                                      
                                                       $completeSubSubCatValue =   trim($completeSubSubCatValue);

                                                        $subSubCatCheckQuery    =   $this->Category->find('list', array( 'fields' => array('id'),'conditions' => array('name' =>$completeSubSubCatValue, 'Category.parent_id' =>$SubCategoryId)));
                                                        $subSubCatCheckCount    =   $this->Category->find('count', array('conditions' => array('Category.name' =>$completeSubSubCatValue, 'Category.parent_id' => $SubCategoryId) ));

                                                        if($subSubCatCheckCount == 0){
                                                            return $return  =	array(  'messages' => array(), 'errors' => array(__(sprintf('Sub Sub Category Name  '.$completeSubSubCatValue. ' does not match  %d failed to save.',$i), true)), );
                                                        }
                                                    }
                                                }
                                            }
                                        } 
                                        
                                    }
                                 }
                            }
                           }
                        }
                   }
            }

            
            foreach ($header as $k=>$head) {
                $head	=	trim($head);
                $data['Coupon'][$head]  =   (isset($row[$k])) ? $row[$k] : '';
            }
            $dataA[]  =   $data;
            #pr($row);
            #pr($data);
        }
      
        /***************************Loop**********************************************/
        
        exit;
       
        $categoryData = $subCategory =$brandData=  $storeData= $AffiliateData="";
        foreach($dataA as $key=>$couponsData){
            
           
            $categoryData       =   $couponsData['Coupon']['category'];
            $subCategory        =   $couponsData['Coupon']['subcategory'];
            $subSubCategory     =   $couponsData['Coupon']['subsubcategory'];
            $brandData          =   $couponsData['Coupon']['brand'];
            $storeData          =   $couponsData['Coupon']['store'];
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
                $dataCou['Coupon']['name']		=	trim($couponsData['Coupon']['name']);
                  
                $dataCou['Coupon']['pricerule']		=	trim($couponsData['Coupon']['pricerule']);
                $dataCou['Coupon']['reviews']		=	trim($couponsData['Coupon']['reviews']);
                $dataCou['Coupon']['coupon_tag']	=	trim($couponsData['Coupon']['coupon_tag']);
                $dataCou['Coupon']['coupontype']	=	trim($couponsData['Coupon']['coupon_type']);
                $dataCou['Coupon']['except_category']	=	trim($couponsData['Coupon']['except_category']);
                $dataCou['Coupon']['desc']		=	trim($couponsData['Coupon']['desc']);
                $dataCou['Coupon']['start_date']	=	$stDate;
                $dataCou['Coupon']['end_date']		=       $endDate;
                $dataCou['Coupon']['link']		=	trim($couponsData['Coupon']['link']);
                $dataCou['Coupon']['createby']		=	'';#$this->UserAuth->getGroupName();
                $dataCou['Coupon']['status']		=	1;
                $dataCou['Coupon']['createddate']	=	date('Y-m-d h:m:s');
                
              
               /******************************Category Save************************************************/
                $CategoryInsId  = "";
                $cat            = array();
                $catSub         = array();
		if($categoryData !=""){
                    $expCat =   explode("|",$categoryData);
                   
                    if($subCategory !=""){
                        $expPipeSubCat =   explode("|",$subCategory);
                    }
                    if($subSubCategory !=""){
                        $expPipeSubSubCat =   explode("|",$subSubCategory);
                    }
                    $cat = "";
                    foreach($expCat as $keyC=> $expCats){
                        
                        $categoryData   =   $expCats;
                        $categoryData	=   $this->categoryMatch($categoryData);
                        if($categoryData !=""){
                            
                            $categoryQuery  = $this->Category->find('list', array( 'fields' => array('id'),'conditions' => array('name' => trim($categoryData), 'Category.parent_id' => '0') ));
                            $categoryCount  = $this->Category->find('count', array('conditions' => array('Category.name' => trim($categoryData), 'Category.parent_id' => '0') ));
                            
                            if(!empty($categoryCount)){
                                foreach($categoryQuery as $catKey=>$value){
                                        $categoryQuery[$catKey] =   $value;
                                }
                                $CategoryInsId = $categoryQuery[$catKey];
                            }else{
                            App::uses('Category', 'Model');
                            $categoryAdd = new Category();
                            $dataCategory['Category']['name']		=	$categoryData;
                            $dataCategory['Category']['parent_id']	=	"0";
                            $dataCategory['Category']['shortdesc']	=	$categoryData;
                            $dataCategory['Category']['status']		=       1;
                            $dataCategory['Category']['createddate']   =	date('Y-m-d h:m:s');

                            $categoryAdd->save($dataCategory);
                            $CategoryInsId  =	$categoryAdd->getLastInsertID();
                        }
                    }
                    $cat[$keyC] =   $CategoryInsId;
                }
                
                /******************************Sub Category Save************************************************/
                if($subCategory !=""){
                    $subCatAll = "";
                    $catSub = "";
                    foreach($expPipeSubCat as $keyCats=>$catValue){
                            $catSub[$catValue]     =   $cat[$keyCats]; // compare main cate to sub cate
                    }
                    
                    foreach($catSub as $keyPipe=>$pipeValue){
                         $completeSubCat =   explode("-",$keyPipe);
                        
                         $getAllcsvCubCatAccToMainCat = "";
                         foreach($completeSubCat as $completeSubCatKey=>$completeSubCatValue){
                             if($completeSubCatValue !=""){
                                $getAllcsvCubCatAccToMainCat[$pipeValue][$completeSubCatKey]  =   $completeSubCatValue;
                            }
                         }
                    }
                    
                   $ii =1;
                   $subCatArry = "";
                   
                   $valueSubCat = "";
                    foreach($getAllcsvCubCatAccToMainCat as $mainCatKey=>$subCatArry){
                        foreach($subCatArry as $keyss=>$valueSubCat){
                            if($valueSubCat !=""){
                                
                                
                               $valueSubCats =   trim($valueSubCat); 
                               $mainCatKey =   trim($mainCatKey); 
                               
                               $subCatQuery    =   $this->Category->find('list', array( 'fields' => array('id'),'conditions' => array('name' =>$valueSubCats, 'Category.parent_id' =>$mainCatKey)));
                               $subCatCount    =   $this->Category->find('count', array('conditions' => array('Category.name' =>$valueSubCats, 'Category.parent_id' => $mainCatKey) ));
                               
                               if(!empty($subCatCount)){
                                   foreach($subCatQuery as $SUBcatKey=>$SUBvalue){
                                       $subCatQuery[$SUBcatKey] =  $SUBvalue;
                                   }
                                   $CategoryInsId  =   $subCatQuery[$SUBcatKey];
                               }else{
                                        App::uses('Category', 'Model');
                                        $categorySubAdd =   new Category();
                                        $dataSubCategory['Category']['name']        =   $valueSubCat;
                                        $dataSubCategory['Category']['parent_id']   =   $mainCatKey;
                                        $dataSubCategory['Category']['shortdesc']   =   $valueSubCat;
                                        $dataSubCategory['Category']['status']      =   1;
                                        $dataSubCategory['Category']['createddate'] =   date('Y-m-d h:m:s');

                                        $categorySubAdd->save($dataSubCategory);
                                        
                                        $CategoryInsId  =	$categorySubAdd->getLastInsertID();
                                    }
                                    $subCatAll[$ii] =   $CategoryInsId;
                                    $third[]        =   $CategoryInsId;
                                } $ii++;
                            }
                        }
                        
                        $cat    =   array_merge($cat,$subCatAll);
                        /******************************Sub Category Save************************************************/
                        
                        /******************************Sub Sub Category Save************************************************/
                         $SubSubCatAll = "";
                      
                        if($subSubCategory !=""){
                            $iv  =   1;
                            $catSubSub = "";
                       
                            foreach($expPipeSubSubCat as $keySubCats=>$subCatValue){
                                
                                $catSubSub[$subCatValue]     =   $subCatAll[$iv]; // compare main cate to sub cate
                                $iv++;
                            }
                        
                            foreach($catSubSub as $keySubPipe=>$pipeSubValue){
                                    $completeSubSubCat =   explode("-",$keySubPipe);
                                    $getAllcsvSubSubCatAccToMainCat  = "";
                                    foreach($completeSubSubCat as $completeSubSubCatKey=>$completeSubSubCatValue){
                                        if($completeSubSubCatValue !=""){
                                            $getAllcsvSubSubCatAccToMainCat[$pipeSubValue][$completeSubSubCatKey]  =   $completeSubSubCatValue;
                                        }
                                    }
                            }
                            
                            $iii =1;
                            $subSubCatArry = "";
                            foreach($getAllcsvSubSubCatAccToMainCat as $mainSubSubCatKey=>$subSubCatArry){
                                foreach($subSubCatArry as $SubSUbkeyss=>$valueSubSubCat){
                                    if($valueSubSubCat !=""){
                                        
                                        $subSubCatQuery    =   $this->Category->find('list', array( 'fields' => array('id'),'conditions' => array('name' => trim($valueSubSubCat), 'Category.parent_id' => trim($mainSubSubCatKey))));
                                        $subSubCatCount    =   $this->Category->find('count', array('conditions' => array('Category.name' => trim($valueSubSubCat), 'Category.parent_id' => trim($mainSubSubCatKey))));
                                
                                        if(!empty($subSubCatCount)){
                                            foreach($subSubCatQuery as $SUBSUBCatKey=>$SUBSUBvalue){
                                                $subSubCatQuery[$SUBSUBCatKey] =  $SUBSUBvalue;
                                            }
                                        }else{
                                            
                                            App::uses('Category', 'Model');
                                            $categorySubSubAdd =   new Category();
                                            $dataSubSubCategory['Category']['name']        =   $valueSubSubCat;
                                            $dataSubSubCategory['Category']['parent_id']   =   $mainSubSubCatKey;
                                            $dataSubSubCategory['Category']['shortdesc']   =   $valueSubSubCat;
                                            $dataSubSubCategory['Category']['status']      =   1;
                                            $dataSubSubCategory['Category']['createddate'] =   date('Y-m-d h:m:s');

                                            $categorySubSubAdd->save($dataSubSubCategory);

                                            $CategoryInsId  =	$categorySubSubAdd->getLastInsertID();
                                        } 
                                        $SubSubCatAll[$iii] =   $CategoryInsId;
                                   
                                    } $iii++;
                                }
                            }
                            
                        $cat    =   array_merge($cat,$SubSubCatAll);
                        } 
                       
                 }
                 /******************************Sub Category Save************************************************/
               }
               
              
               $dataCou['Category']['Category']    =   $cat;
               $cat = "";
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
                    /*
                    if($StoreInsId){
                        App::uses('Store', 'Model');
                        $storeAdd = new Store();
                        $dataStore['Store']['id']		=	$StoreInsId;
                        $dataStore['Category']['Category']	=	$dataCou['Category']['Category'];
                        echo $StoreInsId.$storeData;
                        pr($dataCou['Category']['Category']);
                        $storeAdd->save($dataStore);
                    }*/
                }
                $dataCou['Coupon']['store_id']		=	$StoreInsId;
                
                /******************************Store Save************************************************/
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
           
            if (!$this->save($dataCou)) {
                echo "adasds";
                #$return['messages'][] = __(sprintf('Post for Row %d  to save.',$i), true);
                 #$return['errors'][] = __(sprintf('Post for Row %d failed to save.',$i), true);
                 #$return['messages'] = __('', true);
                 $return    =	array(  'messages' => array(), 'errors' => array('Post for Row %d failed to save.',$i), );
            } else {
               # $return['messages'][] = __(sprintf('Post for Row %d  to save.',$i), true);
                #$return['errors'] = __('', true);
               # $return['errors'] = __('', false);
                $return		=	array(  'messages' => array('Post for Row %d  to save.',$i), 'errors' => array(), );
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
