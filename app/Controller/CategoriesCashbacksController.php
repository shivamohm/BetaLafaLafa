<?php
App::uses('AppController', 'Controller');
/**
 * CategoriesCashbacks Controller
 *
 * @property CategoriesCashback $CategoriesCashback
 * @property PaginatorComponent $Paginator
 */
class CategoriesCashbacksController extends AppController {

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
		$this->CategoriesCashback->recursive = 0;
		$this->set('categoriesCashbacks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategoriesCashback->exists($id)) {
			throw new NotFoundException(__('Invalid categories cashback'));
		}
		$options = array('conditions' => array('CategoriesCashback.' . $this->CategoriesCashback->primaryKey => $id));
		$this->set('categoriesCashback', $this->CategoriesCashback->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoriesCashback->create();
			if ($this->CategoriesCashback->save($this->request->data)) {
				$this->Session->setFlash(__('The categories cashback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories cashback could not be saved. Please, try again.'));
			}
		}
		$cashbacks = $this->CategoriesCashback->Cashback->find('list');
		$categories = $this->CategoriesCashback->Category->find('list');
		$parentCategoriesCashbacks = $this->CategoriesCashback->ParentCategoriesCashback->find('list');
		$this->set(compact('cashbacks', 'categories', 'parentCategoriesCashbacks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CategoriesCashback->exists($id)) {
			throw new NotFoundException(__('Invalid categories cashback'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategoriesCashback->save($this->request->data)) {
				$this->Session->setFlash(__('The categories cashback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories cashback could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategoriesCashback.' . $this->CategoriesCashback->primaryKey => $id));
			$this->request->data = $this->CategoriesCashback->find('first', $options);
		}
		$cashbacks = $this->CategoriesCashback->Cashback->find('list');
		$categories = $this->CategoriesCashback->Category->find('list');
		$parentCategoriesCashbacks = $this->CategoriesCashback->ParentCategoriesCashback->find('list');
		$this->set(compact('cashbacks', 'categories', 'parentCategoriesCashbacks'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CategoriesCashback->id = $id;
		if (!$this->CategoriesCashback->exists()) {
			throw new NotFoundException(__('Invalid categories cashback'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CategoriesCashback->delete()) {
			$this->Session->setFlash(__('The categories cashback has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categories cashback could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
