<?php
App::uses('AppController', 'Controller');
/**
 * BrandsCoupons Controller
 *
 * @property BrandsCoupon $BrandsCoupon
 * @property PaginatorComponent $Paginator
 */
class BrandsCouponsController extends AppController {

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
	public function index() {
		$this->BrandsCoupon->recursive = 0;
		$this->set('brandsCoupons', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BrandsCoupon->exists($id)) {
			throw new NotFoundException(__('Invalid brands coupon'));
		}
		$options = array('conditions' => array('BrandsCoupon.' . $this->BrandsCoupon->primaryKey => $id));
		$this->set('brandsCoupon', $this->BrandsCoupon->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BrandsCoupon->create();
			if ($this->BrandsCoupon->save($this->request->data)) {
				$this->Session->setFlash(__('The brands coupon has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brands coupon could not be saved. Please, try again.'));
			}
		}
		$coupons = $this->BrandsCoupon->Coupon->find('list');
		$brands = $this->BrandsCoupon->Brand->find('list');
		$this->set(compact('coupons', 'brands'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BrandsCoupon->exists($id)) {
			throw new NotFoundException(__('Invalid brands coupon'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BrandsCoupon->save($this->request->data)) {
				$this->Session->setFlash(__('The brands coupon has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brands coupon could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BrandsCoupon.' . $this->BrandsCoupon->primaryKey => $id));
			$this->request->data = $this->BrandsCoupon->find('first', $options);
		}
		$coupons = $this->BrandsCoupon->Coupon->find('list');
		$brands = $this->BrandsCoupon->Brand->find('list');
		$this->set(compact('coupons', 'brands'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BrandsCoupon->id = $id;
		if (!$this->BrandsCoupon->exists()) {
			throw new NotFoundException(__('Invalid brands coupon'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BrandsCoupon->delete()) {
			$this->Session->setFlash(__('The brands coupon has been deleted.'));
		} else {
			$this->Session->setFlash(__('The brands coupon could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
