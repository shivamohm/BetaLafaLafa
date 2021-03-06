<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

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
                $name   =   $this->params['data']['Category']['name'];
                #$parentId   =   $this->params['data']['Category']['parent_id'];
                $arr    =   array('Category.name LIKE'=> "%".$name."%");
                #$arr    =   array('Category.parent_id'=>0 );
                
                
		$this->Category->recursive = 0;
                $ord = array("Category.id" => "DESC");
                
               # $this->paginate = array('order' => $ord);
                if($name !=""){
                    $this->paginate = array('conditions' => $arr, "order" => $ord);
                }else{
                    $this->paginate = array("order" => $ord);    
                }
                
		$this->set('categories', $this->Paginator->paginate());
                $parentCategories = $this->Category->generateTreeList(null, null, null, ' ----');
                $this->set(compact('parentCategories'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
                
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		#$parentCategories = $this->Category->ParentCategory->find('list');
		#$parentCategories = $this->Category->ParentCategory->find('list', array('conditions' => array('parent_id' => 0,'status' => 1) ));
                $parentCategories = $this->Category->generateTreeList(null, null, null, ' ----');
                
                
		$this->set(compact('parentCategories'));
		
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		#$parentCategories = $this->Category->ParentCategory->find('list');
		#$parentCategories = $this->Category->ParentCategory->find('list', array('conditions' => array('parent_id' => 0,'status' => 1) ));
                $parentCategories = $this->Category->generateTreeList(null, null, null, '--');
		$this->set(compact('parentCategories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('The category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
