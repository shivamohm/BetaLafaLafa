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
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Coupon->recursive = 0;
		$this->set('coupons', $this->Paginator->paginate());
	}

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
                
		$categories = $this->Coupon->Category->generateTreeList(null, null, null, '--');
		$this->set(compact('stores', 'brands', 'categories', 'affiliates'));
	}
	
	public function admin_script() {
            
            //is_uploaded_file($this->data['Coupon']['couponcsv']['tmp_name']))
            if ($this->request->is('post')) {
                
                $csvFileName	=	$this->request->data['Coupon']['couponcsv']['tmp_name'];
                
                if($this->request->data['Coupon']['couponcsv']['type'] != "text/csv"){
                     return $this->Session->setFlash(__('Invalid Formate. Please, try again.'));
                     #throw new NotFoundException('Invalid Formate. Please, try again');
                     #throw new BadRequestException('Invalid Formate. Please, try again');
                     #throw new NotFoundException(__('missing eventdetail'));
                    
                }
                        
                if($csvFileName != ""){
                    $messages = $this->Coupon->import($csvFileName);
                    
                    if(sizeof($messages['errors']) != 0){
                        foreach($messages['errors'] as $keys=>$errors){
                            $this->Session->setFlash(__('Line no '.$keys.' coupon could not be saved. Please, try again.'));
                        }
                    }
                    if(sizeof($messages['messages']) != 0){
                        foreach($messages['messages'] as $key=>$messages){
                            #echo 'Line no '.$key.' coupon has been be saved.';
                            $this->Session->setFlash(__(' coupon has been be saved.'));
                           # return $this->redirect(array('action' => 'index'));
			}
                    }
                    /*
                        $this->Coupon->create();
                        if ($this->Coupon->save($this->request->data)) {
                                $this->Session->setFlash(__('The coupon has been saved.'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The coupon could not be saved. Please, try again.'));
                        }*/
                    }else {
                        $this->Session->setFlash(__('The coupon could not be saved. Please, try again.'));
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
				$this->Session->setFlash(__('The coupon has been saved.'));
				return $this->redirect(array('action' => 'index'));
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
		$categories = $this->Coupon->Category->generateTreeList(null, null, null, '--');
		$this->set(compact('stores', 'brands', 'categories','affiliates'));
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
