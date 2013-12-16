<?php
App::uses('AppController', 'Controller');
/**
 * CategoriesCoupons Controller
 *
 * @property CategoriesCoupon $CategoriesCoupon
 * @property PaginatorComponent $Paginator
 */
class CategoriesCouponsController extends AppController {

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
		$this->CategoriesCoupon->recursive = 0;
		$this->set('categoriesCoupons', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategoriesCoupon->exists($id)) {
			throw new NotFoundException(__('Invalid categories coupon'));
		}
		$options = array('conditions' => array('CategoriesCoupon.' . $this->CategoriesCoupon->primaryKey => $id));
		$this->set('categoriesCoupon', $this->CategoriesCoupon->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoriesCoupon->create();
			if ($this->CategoriesCoupon->save($this->request->data)) {
				$this->Session->setFlash(__('The categories coupon has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories coupon could not be saved. Please, try again.'));
			}
		}
		$coupons = $this->CategoriesCoupon->Coupon->find('list');
		$categories = $this->CategoriesCoupon->Category->find('list');
		$parentCategoriesCoupons = $this->CategoriesCoupon->ParentCategoriesCoupon->find('list');
		$this->set(compact('coupons', 'categories', 'parentCategoriesCoupons'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CategoriesCoupon->exists($id)) {
			throw new NotFoundException(__('Invalid categories coupon'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategoriesCoupon->save($this->request->data)) {
				$this->Session->setFlash(__('The categories coupon has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories coupon could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategoriesCoupon.' . $this->CategoriesCoupon->primaryKey => $id));
			$this->request->data = $this->CategoriesCoupon->find('first', $options);
		}
		$coupons = $this->CategoriesCoupon->Coupon->find('list');
		$categories = $this->CategoriesCoupon->Category->find('list');
		$parentCategoriesCoupons = $this->CategoriesCoupon->ParentCategoriesCoupon->find('list');
		$this->set(compact('coupons', 'categories', 'parentCategoriesCoupons'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CategoriesCoupon->id = $id;
		if (!$this->CategoriesCoupon->exists()) {
			throw new NotFoundException(__('Invalid categories coupon'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CategoriesCoupon->delete()) {
			$this->Session->setFlash(__('The categories coupon has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categories coupon could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
