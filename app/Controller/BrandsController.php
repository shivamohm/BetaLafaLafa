<?php
App::uses('AppController', 'Controller');
/**
 * Brands Controller
 *
 * @property Brand $Brand
 * @property PaginatorComponent $Paginator
 */
class BrandsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	#public $components = array('Paginator');
        
    public $name = 'Brands';
    public $components = array('Search.Prg');
    public $presetVars = array(
        array('field' => 'id', 'type' => 'value'),
        array('field' => 'name', 'type' => 'value'),
        array('field' => 'status', 'type' => 'value'),
       
    );

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Brand->recursive = 0;
                $this->Prg->commonProcess();
                $cond = $this->Brand->parseCriteria($this->passedArgs);
                $ord = array("Brand.id" => "DESC");
                $this->paginate = array("order" => $ord, 'conditions' => $cond);
                
                
                
		#$this->set('brands', $this->Paginator->paginate());
		$this->set('brands', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Invalid brand'));
		}
		$options = array('conditions' => array('Brand.' . $this->Brand->primaryKey => $id));
		$this->set('brand', $this->Brand->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Brand->create();
			if ($this->Brand->save($this->request->data)) {
				$this->Session->setFlash(__('The brand has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again.'));
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
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Invalid brand'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Brand->save($this->request->data)) {
				$this->Session->setFlash(__('The brand has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Brand.' . $this->Brand->primaryKey => $id));
			$this->request->data = $this->Brand->find('first', $options);
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
		$this->Brand->id = $id;
		if (!$this->Brand->exists()) {
			throw new NotFoundException(__('Invalid brand'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Brand->delete()) {
			$this->Session->setFlash(__('The brand has been deleted.'));
		} else {
			$this->Session->setFlash(__('The brand could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
