<?php
App::uses('AppController', 'Controller');
/**
 * Payments Controller
 *
 * @property Payment $Payment
 * @property PaginatorComponent $Paginator
 */
class PaymentsController extends AppController {

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
	public function close_admin_index() {
		$this->Payment->recursive = 0;
		$this->set('payments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function close_admin_view($id = null) {
		if (!$this->Payment->exists($id)) {
			throw new NotFoundException(__('Invalid payment'));
		}
		$options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
		$this->set('payment', $this->Payment->find('first', $options));
	}
	
	
	public function admin_paymentview($id = null) {
		
		$options = array('conditions' => array('Payment.customer_id' => $id),'recursive' => 1 );
		$payment	=	$this->Payment->find('first', $options);
		
		#$payments	=	$this->Payment->find('first', array('conditions' => array('Payment.customer_id' => $customerId), 'recursive' => -1 ));
		
		
		if(count($payment) == 0){
			$this->Session->setFlash(__('In Valid Customer ID.'));
			return $this->redirect(array('controller'=>'customers','action' => 'index'));
		}
		$this->set(compact('payment')); 
		
		/*
		$payment	=	$this->Payment->findByCustomerId($id);
		if(count($payment) == 0){
			throw new NotFoundException(__('Invalid payment'));
			}
		$this->set(compact('payment')); */
	}
	
	

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Payment->create();
			if ($this->Payment->save($this->request->data)) {
				$this->Session->setFlash(__('The payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment could not be saved. Please, try again.'));
			}
		}
		$customers = $this->Payment->Customer->find('list');
		$this->set(compact('customers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function close_admin_edit($id = null) {
		if (!$this->Payment->exists($id)) {
			throw new NotFoundException(__('Invalid payment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Payment->save($this->request->data)) {
				$this->Session->setFlash(__('The payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
			$this->request->data = $this->Payment->find('first', $options);
		}
		$customers = $this->Payment->Customer->find('list');
		$this->set(compact('customers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Payment->id = $id;
		if (!$this->Payment->exists()) {
			throw new NotFoundException(__('Invalid payment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Payment->delete()) {
			$this->Session->setFlash(__('The payment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The payment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function payment() {
		$customerId	=	$this->Session->read('Auth.User.id');
		$payments	=	$this->Payment->find('first', array('conditions' => array('Payment.customer_id' => $customerId), 'recursive' => -1 ));
		
		
		if ($this->request->is('post')) {
			
			
			$this->request->data['Payment']['customer_id']		=	$this->Session->read('Auth.User.id');
			$this->request->data['Payment']['slug']				=	$this->Session->read('Auth.User.slug');
			
			
			
			$this->Payment->create();
			
			
			
			if ($this->Payment->save($this->request->data)) {
				$this->Session->setFlash(__('The payment has been saved.'));
				return $this->redirect(array('action' => 'payment'));
			} else {
				$this->Session->setFlash(__('The payment could not be saved. Please, try again.'));
			}
		}
		if (!$this->request->data) {
			
			if(count($payments) == 0){
				$payments['Payment']['customer_id']		=   "";
				$payments['Payment']['id']				=	"";
				
				$payments['Payment']['bank_account']	=	"";
				$payments['Payment']['bank_name']		=	"";
				$payments['Payment']['branch_name']		=	"";
				$payments['Payment']['acc_no']			=	"";
				$payments['Payment']['ifsc_code']		=	"";
				
				
				
				$payments['Payment']['name_on_address']	=	"";
				$payments['Payment']['address']			=	"";
				$payments['Payment']['city']				=	"";
				$payments['Payment']['state']			=	"";
				$payments['Payment']['pincode']			=	"";
				$payments['Payment']['mobile']			=	"";
				
			}
			$this->request->data	=	"";#$payments;
		}
		$this->set(compact('payments'));
		#$customers = $this->Payment->Customer->find('list');
		#$this->set(compact('customers'));
		 
	}
	
	
	}
