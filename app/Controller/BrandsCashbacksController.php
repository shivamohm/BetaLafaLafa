<?php
App::uses('AppController', 'Controller');
/**
 * BrandsCashbacks Controller
 *
 * @property BrandsCashback $BrandsCashback
 * @property PaginatorComponent $Paginator
 */
class BrandsCashbacksController extends AppController {

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
		$this->BrandsCashback->recursive = 0;
		$this->set('brandsCashbacks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BrandsCashback->exists($id)) {
			throw new NotFoundException(__('Invalid brands cashback'));
		}
		$options = array('conditions' => array('BrandsCashback.' . $this->BrandsCashback->primaryKey => $id));
		$this->set('brandsCashback', $this->BrandsCashback->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BrandsCashback->create();
			if ($this->BrandsCashback->save($this->request->data)) {
				$this->Session->setFlash(__('The brands cashback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brands cashback could not be saved. Please, try again.'));
			}
		}
		$cashbacks = $this->BrandsCashback->Cashback->find('list');
		$brands = $this->BrandsCashback->Brand->find('list');
		$this->set(compact('cashbacks', 'brands'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BrandsCashback->exists($id)) {
			throw new NotFoundException(__('Invalid brands cashback'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BrandsCashback->save($this->request->data)) {
				$this->Session->setFlash(__('The brands cashback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brands cashback could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BrandsCashback.' . $this->BrandsCashback->primaryKey => $id));
			$this->request->data = $this->BrandsCashback->find('first', $options);
		}
		$cashbacks = $this->BrandsCashback->Cashback->find('list');
		$brands = $this->BrandsCashback->Brand->find('list');
		$this->set(compact('cashbacks', 'brands'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BrandsCashback->id = $id;
		if (!$this->BrandsCashback->exists()) {
			throw new NotFoundException(__('Invalid brands cashback'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BrandsCashback->delete()) {
			$this->Session->setFlash(__('The brands cashback has been deleted.'));
		} else {
			$this->Session->setFlash(__('The brands cashback could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
