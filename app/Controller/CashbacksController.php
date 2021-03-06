<?php
App::uses('AppController', 'Controller');
/**
 * Cashbacks Controller
 *
 * @property Cashback $Cashback
 * @property PaginatorComponent $Paginator
 */
class CashbacksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	#public $components = array('Paginator');
    public $name = 'Cashbacks';
    public $components = array('Search.Prg');
    public $presetVars = array(
        array('field' => 'id', 'type' => 'value'),
        array('field' => 'name', 'type' => 'value'),
        array('field' => 'status', 'type' => 'value'),
        array('field' => 'store_id', 'type' => 'value'),
       
    );

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Cashback->recursive = 0;
                
                $this->Prg->commonProcess();
                $cond = $this->Cashback->parseCriteria($this->passedArgs);
                $ord = array("Cashback.id" => "DESC");
                $this->paginate = array("order" => $ord, 'conditions' => $cond);
                #$this->set('cashbacks', $this->Paginator->paginate());
		$this->set('cashbacks', $this->paginate());
                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Cashback->exists($id)) {
			throw new NotFoundException(__('Invalid cashback'));
		}
		$options = array('conditions' => array('Cashback.' . $this->Cashback->primaryKey => $id));
		$this->set('cashback', $this->Cashback->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Cashback->create();
			if ($this->Cashback->save($this->request->data)) {
				$this->Session->setFlash(__('The cashback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cashback could not be saved. Please, try again.'));
			}
		}
		$stores     = $this->Cashback->Store->find('list');
		$affiliates = $this->Cashback->Affiliate->find('list');
		$brands     = $this->Cashback->Brand->find('list');
		$categories = $this->Cashback->Category->generateTreeList(null, null, null, '-- --');
		$this->set(compact('stores', 'affiliates', 'brands', 'categories'));
	}
        
        public function admin_script() {
            
            if ($this->request->is('post')) {
               
                $csvFileName	=	$this->request->data['Cashback']['cashbackcsv']['tmp_name'];
                $csvFileNameCsv	=	$this->request->data['Cashback']['cashbackcsv']['name'];
                
                if($this->request->data['Cashback']['cashbackcsv']['type'] != "text/csv"){
                     return $this->Session->setFlash(__('Invalid Formate. Please, try again.'));
                }
                
                if($this->request->data['Cashback']['cashbackcsv']['error'] !=0){
					return $this->Session->setFlash(__($csvFileNameCsv.' File some Error. Please upload correct file again.'));
				}
				
				if($this->request->data['Cashback']['cashbackcsv']['size'] ==0){
					return $this->Session->setFlash(__($csvFileNameCsv. ' File size is zero. Please upload correct file again'));
				}
                
				$FileNameCsv	=	explode(".",$csvFileNameCsv);
				if($FileNameCsv[1] != "csv"){
						 return $this->Session->setFlash(__('Invalid Formate. Please try again.'));
				}
				
                 if($FileNameCsv[1] == "csv"){
                    $messages = $this->Cashback->import($csvFileName);
                       
                       if(count($messages) !=0){
						 foreach($messages as $keys=>$errValue){
							 if($keys == '19999'){ 
								$this->Session->setFlash(__($errValue));
								return $this->redirect(array('action' => 'index'));
							}else{
								$this->_flash(__($errValue, true),'message');
							}
						 }
					 }
                    }else {
                        $this->Session->setFlash(__('Cashback could not be saved. Please, try again.'));
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
		if (!$this->Cashback->exists($id)) {
			throw new NotFoundException(__('Invalid cashback'));
		}
		if ($this->request->is(array('post', 'put'))) {
                   
			if ($this->Cashback->save($this->request->data)) {
				$this->Session->setFlash(__('The cashback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cashback could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cashback.' . $this->Cashback->primaryKey => $id));
			$this->request->data = $this->Cashback->find('first', $options);
		}
		$stores     = $this->Cashback->Store->find('list');
		$affiliates = $this->Cashback->Affiliate->find('list');
		$brands     = $this->Cashback->Brand->find('list');
		$categories = $this->Cashback->Category->generateTreeList(null, null, null, '-- --');
		$this->set(compact('stores', 'affiliates', 'brands', 'categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Cashback->id = $id;
		if (!$this->Cashback->exists()) {
			throw new NotFoundException(__('Invalid cashback'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cashback->delete()) {
			$this->Session->setFlash(__('The cashback has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cashback could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
