<?php
App::uses('AppController', 'Controller');
/**
 * Coupons Controller
 *
 * @property Coupon $Coupon
 * @property PaginatorComponent $Paginator
 */
class CouponsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	#public $components = array('Paginator');
	
	#public $name = 'Coupon';
    public $components = array('Search.Prg');
    public $presetVars = array(       
							array('field' => 'id', 'type' => 'value'),    
							array('field' => 'name', 'type' => 'value'),
							array('field' => 'status', 'type' => 'value'),
							array('field' => 'coupon_code', 'type' => 'value'),
						  );
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		        
        $this->Coupon->recursive = 0;
        /*
		$ord = array("Coupon.id" => "DESC");
		$this->paginate = array('order' => $ord);
		$this->set('coupons', $this->Paginator->paginate());
		*/
		
		$this->Prg->commonProcess();
		$cond = $this->Coupon->parseCriteria($this->passedArgs);
		$ord = array("Coupon.id" => "DESC");
		$this->paginate = array("order" => $ord, 'conditions' => $cond);
		
		$this->set('coupons', $this->paginate());
		
                
	}
	
	/*
	public function admin_index() {
		$this->Coupon->recursive = 0;
                $ord = array("Coupon.id" => "DESC");
                $this->paginate = array('order' => $ord);
		$this->set('coupons', $this->Paginator->paginate());
	} */

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Coupon->exists($id)) {
			throw new NotFoundException(__('Invalid coupon'));
		}
		$options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
                $this->set('coupon', $this->Coupon->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Coupon->create();
			
			if ($this->Coupon->save($this->request->data)) {
				$this->Session->setFlash(__('The coupon has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coupon could not be saved. Please, try again.'));
			}
		}
		$stores     =   $this->Coupon->Store->find('list');
		$brands     =   $this->Coupon->Brand->find('list');
        $affiliates  =   $this->Coupon->Affiliate->find('list');
                
		$categories = $this->Coupon->Category->generateTreeList(null, null, null, '-- --');
		$this->set(compact('stores', 'brands', 'categories', 'affiliates'));
	}
	
	public function admin_script() {
            
            //is_uploaded_file($this->data['Coupon']['couponcsv']['tmp_name']))
            if ($this->request->is('post')) {
                
                $csvFileName	=	$this->request->data['Coupon']['couponcsv']['tmp_name'];
                $csvFileNameCsv	=	$this->request->data['Coupon']['couponcsv']['name'];
                #pr($this->request->data['Coupon']['couponcsv']);
                
                if($this->request->data['Coupon']['couponcsv']['error'] !=0){
					return $this->Session->setFlash(__($csvFileNameCsv.' File some Error. Please upload correct file again.'));
				}
				
				if($this->request->data['Coupon']['couponcsv']['size'] ==0){
					return $this->Session->setFlash(__($csvFileNameCsv. ' File size is zero. Please upload correct file again'));
				}
                
				$FileNameCsv	=	explode(".",$csvFileNameCsv);
				   
				if($FileNameCsv[1] != "csv"){
						 return $this->Session->setFlash(__('Invalid Formate. Please try again.'));
				}
                        
                if($FileNameCsv[1] == "csv"){
                    $messages = $this->Coupon->import($csvFileName);
                  
                     if(count($messages) !=0){
						 foreach($messages as $keys=>$errValue){
							 if($keys == '19999'){ 
								$this->Session->setFlash(__($errValue));
								return $this->redirect(array('action' => 'index'));
							}else{
								$this->_flash(__($errValue, true),'message');
							}
						 }
					 }
                    }else {
                        $this->Session->setFlash(__('The coupon could not be saved. Please try again.'));
                    }
		}
	}
	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Coupon->exists($id)) {
			throw new NotFoundException(__('Invalid coupon'));
		}
		if ($this->request->is(array('post', 'put'))) {
                    
			if ($this->Coupon->save($this->request->data)) {
				$this->Session->setFlash(__($this->request->data['Coupon']['name'] .' coupon has been saved.'));
				return $this->redirect(array('action' => 'index/id:'.$id));
			} else {
				$this->Session->setFlash(__('The coupon could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
			$this->request->data = $this->Coupon->find('first', $options);
		}
		$stores = $this->Coupon->Store->find('list');
		$brands = $this->Coupon->Brand->find('list');
                $affiliates  =   $this->Coupon->Affiliate->find('list');
		#$categories = $this->Coupon->Category->find('list');
		$categories = $this->Coupon->Category->generateTreeList(null, null, null, '-- --');
                $ExceptCategories = $this->Coupon->Category->generateTreeList(null, null, null, '--');
		$this->set(compact('stores', 'brands', 'categories','affiliates', 'ExceptCategories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Coupon->id = $id;
		if (!$this->Coupon->exists()) {
			throw new NotFoundException(__('Invalid coupon'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Coupon->delete()) {
			$this->Session->setFlash(__('The coupon has been deleted.'));
		} else {
			$this->Session->setFlash(__('The coupon could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
