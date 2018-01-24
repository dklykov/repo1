<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}



public function login() {
    if ($this->request->is('post')) {
    //	$this->log(print_r($_POST,true),'debug');
    //	var_dump($_POST);
        if ($this->Auth->login()) {
        	$url= $this->Auth->redirect();
        	$this->log('URL will be '.print_r($url,true),'debug');
           	if ($url!=='/')
           	{
           		$this->log('Url not empty: '.print_r($url,true),'debug');
           		$this->redirect($url);
           	}
           		else { 
           			$this->log('Url is empty: '.print_r($url,true),'debug');
           			$this->redirect(array('controller'=>'opinions','action'=>'index'));
           		}
         } else {
            $this->Session->setFlash(__('Неправильное имя пользователя или пароль'));
        }
    }
}

public function logout() {
    $this->redirect($this->Auth->logout());
}	

public function register () {
	if ($this->request->is('post')) {
		$this->User->create();
		if ($this->User->save($this->request->data)) {
			$this->Session->setFlash(__('Пользователь зарегистрирован'));
			$this->redirect(array('action' => 'index','controller'=>'opinions'));
		} else {
			$this->Session->setFlash(__('Ошибка регистрации.'));
		}
	}
 }
}

