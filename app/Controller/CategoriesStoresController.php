<?php
App::uses('AppController', 'Controller');
/**
 * CategoriesStores Controller
 *
 * @property CategoriesStore $CategoriesStore
 * @property PaginatorComponent $Paginator
 */
class CategoriesStoresController extends AppController {

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
		$this->CategoriesStore->recursive = 0;
		$this->set('categoriesStores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategoriesStore->exists($id)) {
			throw new NotFoundException(__('Invalid categories store'));
		}
		$options = array('conditions' => array('CategoriesStore.' . $this->CategoriesStore->primaryKey => $id));
		$this->set('categoriesStore', $this->CategoriesStore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoriesStore->create();
			if ($this->CategoriesStore->save($this->request->data)) {
				$this->Session->setFlash(__('The categories store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories store could not be saved. Please, try again.'));
			}
		}
		$stores = $this->CategoriesStore->Store->find('list');
		$categories = $this->CategoriesStore->Category->find('list');
		$parentCategoriesStores = $this->CategoriesStore->ParentCategoriesStore->find('list');
		$this->set(compact('stores', 'categories', 'parentCategoriesStores'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CategoriesStore->exists($id)) {
			throw new NotFoundException(__('Invalid categories store'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategoriesStore->save($this->request->data)) {
				$this->Session->setFlash(__('The categories store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories store could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategoriesStore.' . $this->CategoriesStore->primaryKey => $id));
			$this->request->data = $this->CategoriesStore->find('first', $options);
		}
		$stores = $this->CategoriesStore->Store->find('list');
		$categories = $this->CategoriesStore->Category->find('list');
		$parentCategoriesStores = $this->CategoriesStore->ParentCategoriesStore->find('list');
		$this->set(compact('stores', 'categories', 'parentCategoriesStores'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CategoriesStore->id = $id;
		if (!$this->CategoriesStore->exists()) {
			throw new NotFoundException(__('Invalid categories store'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CategoriesStore->delete()) {
			$this->Session->setFlash(__('The categories store has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categories store could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
