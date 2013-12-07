<?php
App::uses('AppController', 'Controller');
/**
 * BrandsStores Controller
 *
 * @property BrandsStore $BrandsStore
 * @property PaginatorComponent $Paginator
 */
class BrandsStoresController extends AppController {

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
		$this->BrandsStore->recursive = 0;
		$this->set('brandsStores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BrandsStore->exists($id)) {
			throw new NotFoundException(__('Invalid brands store'));
		}
		$options = array('conditions' => array('BrandsStore.' . $this->BrandsStore->primaryKey => $id));
		$this->set('brandsStore', $this->BrandsStore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BrandsStore->create();
			if ($this->BrandsStore->save($this->request->data)) {
				$this->Session->setFlash(__('The brands store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brands store could not be saved. Please, try again.'));
			}
		}
		$stores = $this->BrandsStore->Store->find('list');
		$brands = $this->BrandsStore->Brand->find('list');
		$this->set(compact('stores', 'brands'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BrandsStore->exists($id)) {
			throw new NotFoundException(__('Invalid brands store'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BrandsStore->save($this->request->data)) {
				$this->Session->setFlash(__('The brands store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brands store could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BrandsStore.' . $this->BrandsStore->primaryKey => $id));
			$this->request->data = $this->BrandsStore->find('first', $options);
		}
		$stores = $this->BrandsStore->Store->find('list');
		$brands = $this->BrandsStore->Brand->find('list');
		$this->set(compact('stores', 'brands'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->BrandsStore->id = $id;
		if (!$this->BrandsStore->exists()) {
			throw new NotFoundException(__('Invalid brands store'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BrandsStore->delete()) {
			$this->Session->setFlash(__('The brands store has been deleted.'));
		} else {
			$this->Session->setFlash(__('The brands store could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
