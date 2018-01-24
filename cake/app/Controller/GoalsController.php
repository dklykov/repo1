<?php
App::uses('AppController', 'Controller');
/**
 * Goals Controller
 *
 * @property Goal $Goal
 */
class GoalsController extends AppController {
 public $helpers = array('Js');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Goal->recursive = 0;
		$this->set('goals', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Goal->id = $id;
		if (!$this->Goal->exists()) {
			throw new NotFoundException(__('Invalid goal'));
		}
		$this->set('goal', $this->Goal->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	$this->set('userid',$this->Auth->user('id'));
	$this->set('areas', $this->Goal->Area->find('list'));
		if ($this->request->is('post')) {
			$this->Goal->create();
			if ($this->Goal->save($this->request->data)) {
				$this->Session->setFlash(__('The goal has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The goal could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
public function getTitle($gid)
{

}

 public function edit($id = null) {
       $this->set('areas', $this->Goal->Area->find('list'));
	   $this->Goal->id = $id;
		if (!$this->Goal->exists()) {
			throw new NotFoundException(__('Invalid goal'));
		}
	//	$this->set('comed',$this->request->data['Goal']['achieved']);
	
		if ($this->request->is('post') || $this->request->is('put')) {
	//	$this->log(print_r($this->request->data, true),'debug');
					if ($this->Goal->save($this->request->data)) {
				$this->Session->setFlash(__('The goal has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The goal could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Goal->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Goal->id = $id;
		if (!$this->Goal->exists()) {
			throw new NotFoundException(__('Invalid goal'));
		}
		if ($this->Goal->delete()) {
			$this->Session->setFlash(__('Goal deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Goal was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
public function beforeRender() { 
    $this->set('userid', $this->Auth->user('id'));
	if ($this->action === 'edit')
	{
	$this->set('comed',$this->request->data['Goal']['achieved']);
	}
} 	

public function isAuthorized($user) {
    // All registered users can add posts
    $userid=$user['id'];
	if ($this->action === 'add') {
        return true;
    }
    // The owner of a post can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        $goal_id = $this->request->params['pass'][0];
        if ($this->Goal->isOwnedBy($goal_id, $userid)) {
        return true;
        }
    }
    return parent::isAuthorized($user);
}
}
