<?php
App::uses('AppController', 'Controller');
/**
 * Affiliates Controller
 *
 * @property Affiliate $Affiliate
 * @property PaginatorComponent $Paginator
 */
class AffiliatesController extends AppController {

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
		$this->Affiliate->recursive = 0;
		$this->set('affiliates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Affiliate->exists($id)) {
			throw new NotFoundException(__('Invalid affiliate'));
		}
		$options = array('conditions' => array('Affiliate.' . $this->Affiliate->primaryKey => $id));
                
		$this->set('affiliate', $this->Affiliate->find('first', $options));
                
              
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Affiliate->create();
			if ($this->Affiliate->save($this->request->data)) {
				$this->Session->setFlash(__('The affiliate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The affiliate could not be saved. Please, try again.'));
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
		if (!$this->Affiliate->exists($id)) {
			throw new NotFoundException(__('Invalid affiliate'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Affiliate->save($this->request->data)) {
				$this->Session->setFlash(__('The affiliate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The affiliate could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Affiliate.' . $this->Affiliate->primaryKey => $id));
			$this->request->data = $this->Affiliate->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Affiliate->id = $id;
		if (!$this->Affiliate->exists()) {
			throw new NotFoundException(__('Invalid affiliate'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Affiliate->delete()) {
			$this->Session->setFlash(__('The affiliate has been deleted.'));
		} else {
			$this->Session->setFlash(__('The affiliate could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
