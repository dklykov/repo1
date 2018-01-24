<?php
App::uses('AppController', 'Controller');
/**
 * Opinions Controller
 *
 * @property Opinion $Opinion
 */
class OpinionsController extends AppController {
public $helpers = array('Js','Bbcode');
var $uses = array('Opinion','Tagged','Tag','Stuff');
 
/**
 * index method
 *
 * @return void
 */
	
//	public function paginate(Model $model, $conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
    // method content

	//}
	
	
	public function index($cat = null, $fortag = null) {
	//	$this->Opinion->recursive = 0;
	//$this->log('Passed args are: '.print_r($this->passedArgs,true),'debug');
	if (isset ($this->passedArgs[0]))
	$cat=$this->passedArgs[0];
	if (isset ($this->passedArgs[1]))
	$fortag=$this->passedArgs[1];
	$this->set( 'loggedIn', $this->Auth->loggedIn() );
	$this->set( 'uid', $this->Auth->user('id'));
	$this->set( 'uname', $this->Auth->user('name'));
	$conds=array('approved!=0');
	if ($cat>0) $conds[] = 'stuff_id in (select id from stuffs where area_id='.$cat.')';
	if ($fortag) $conds[] = 'Opinion.id in (select opinion_id from tagged where tag_id='.$fortag.')';
	$this->paginate = array ('contain' => array('id','title','text',
			'user_id','created','modified','rating','tags',
			'User.name','User.id','Stuff.Area.descr','Stuff.area_id','Stuff.Area.id'),'conditions'=>$conds,'limit'=>3
			,'recursive'=>2);

	$this->set('opinions', $this->paginate());
	$this->set('tags_incl', $this->Tag->find('all'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Opinion->recursive = 2;
		$this->set( 'loggedIn', $this->Auth->loggedIn() );
		$this->set( 'uid', $this->Auth->user('id'));
		$this->Opinion->id = $id;
		if (!$this->Opinion->exists()) {
			throw new NotFoundException(__('Invalid Opinion'));
		}
		$this->set('opinion', $this->Opinion->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$words = array('ножницы','мыло','фотоаппарат','занавески','горы','роща','грибы','велосипед','туча','самолет','паровоз','пляж','шоссе');
		if ($this->request->is('get'))
		{	
		 $aword=$words[rand(0,12)];
		 $this->set('word',$aword);
		 $this->Session->write('cwd',$aword);
		}
		$this->set( 'loggedIn', $this->Auth->loggedIn() );
		$this->set('areas', $this->Opinion->Stuff->Area->find('list'));
		$this->set('tags', $this->Tag->find('list'));
		$this->set('stuffs',$this->Opinion->Stuff->find('all',array('fields'=>array('name'))));
		if ($this->request->is('post')) {
		//	$this->log('Entered antispam word : '.print_r($this->request->data['Aspam']['Aword'],true),'debug');
		//	$this->log('Will be checked against  : '.print_r($aword,true),'debug');
		//	$this->log('Session array  : '.print_r($_SESSION,true),'debug');
			if ($this->request->data['Aspam']['Aword']!=$this->Session->read('cwd'))
			{  
				$this->Session->setFlash(__('Проверочное слово введено неверно'));
				$aword=$words[rand(0,12)];
				$this->set('word',$aword);
				$this->Session->write('cwd',$aword);
				return;
			}			
			$this->Opinion->create();
		$this->request->data['Opinion']['user_id'] = $this->Auth->user('id');
		foreach ($this->request->data['Tagged'] as $key => &$tt) {
			if (!$this->request->data['Tagged'][$key]['tag_id'])
				 unset($this->request->data['Tagged'][$key]);
		}
		
		
		foreach ($this->request->data['Tag'] as $key=>&$t2)
		{
			if ($this->request->data['Tag'][$key]['name']=='')
				unset ($this->request->data['Tag'][$key]);
		}
			
		//	$this->log('After sequest : '.print_r($this->request->data,true),'debug');
			
		foreach ($this->request->data['Tag'] as $key=>&$t2)
			if ($this->request->data['Tag'][$key]['name'])
			{
				$this->Tag->create();
				if ($this->Tag->save($this->request->data['Tag'][$key]))
				{
					//	$this->log('New tag saved, data for save now : '.print_r($this->request->data,true),'debug');
					$this->request->data['Tagged'][]['tag_id']=$this->Tag->id;
				}
				else {
					//	$this->log('Cannot create new tag, data for save now : '.print_r($this->request->data,true),'debug');
					return;
				}
			}		

			foreach ($this->Stuff->find('all',array('conditions'=>array('name' => $this->request->data['Stuff']['name']))) as $arch )
			{
				$this->request->data['Stuff']['id']=$arch['Stuff']['id'];
			}
//            $this->log('Found in archive  : '.print_r($archive,true),'debug');
//            $this->log('Data will be  : '.print_r($this->request->data,true),'debug');
			if ($this->Opinion->saveAll($this->request->data)) {
				      $this->Session->setFlash(__('Рецензия и теги сохранены	'));
				      $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ошибка при сохранении рецензии'));
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
 	$this->set( 'loggedIn', $this->Auth->loggedIn() );
 	   $this->set('areas', $this->Opinion->Stuff->Area->find('list'));
 	   $this->set('tags', $this->Tag->find('list'));
       $this->Opinion->id = $id;
		if (!$this->Opinion->exists()) {
			throw new NotFoundException(__('Invalid Opinion'));
		}
	
		if ($this->request->is('post') || $this->request->is('put')) {
//			$this->log('All data : '.print_r($this->request->data,true),'debug');
			foreach ($this->request->data['Tagged'] as $key => &$t1) {
				if (!$this->request->data['Tagged'][$key]['tag_id'])
				{
					if (isset($this->request->data['Tagged'][$key]['id'])) {
				     $this->Opinion->Tagged->delete($this->request->data['Tagged'][$key]['id']);
					}
					unset($this->request->data['Tagged'][$key]);
				}
			}
			
			foreach ($this->request->data['Tag'] as $key=>&$t2)
			{
				if ($this->request->data['Tag'][$key]['name']=='')
					unset ($this->request->data['Tag'][$key]);
			}
			
		//	$this->log('After sequest : '.print_r($this->request->data,true),'debug');
			
			foreach ($this->request->data['Tag'] as $key=>&$t2)
			if ($this->request->data['Tag'][$key]['name'])
			{
				$this->Tag->create();
				if ($this->Tag->save($this->request->data['Tag'][$key]))
				{
				//	$this->log('New tag saved, data for save now : '.print_r($this->request->data,true),'debug');
					$this->request->data['Tagged'][]['tag_id']=$this->Tag->id;
				}
				else {
				//	$this->log('Cannot create new tag, data for save now : '.print_r($this->request->data,true),'debug');
					return;
				}
			}
		//	$this->log('And before save : '.print_r($this->request->data,true),'debug');
			if ($this->Opinion->saveAll($this->request->data)) {
						        $this->Session->setFlash(__('Рецензия и теги отредактированы	'));
								$this->redirect(array('action' => 'index'));
																
			}
			 else {
				$this->Session->setFlash(__('Ошибка при редактировании'));
			}
		} 
		
		
		else {
			$this->request->data = $this->Opinion->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if ($this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Opinion->id = $id;
		if (!$this->Opinion->exists()) {
			throw new NotFoundException(__('Invalid Opinion'));
		}
		if ($this->Opinion->delete($id,true)) {
			$this->Session->setFlash(__('Opinion deleted'));
			$this->redirect(array('action' => 'index'));
		}
		else 
		{
	 	   $this->Session->setFlash(__('Opinion was not deleted'));
	       $this->redirect(array('action' => 'index'));
		}
	}
	
	

public function beforeRender() { 
    $this->set('userid', $this->Auth->user('id'));
   // $this->set('vkid', $this->Auth->user('vk_id'));
} 	

public function isAuthorized($user) {
	//var_dump($user);
    // All registered users can add posts
    $userid=$user['id'];
	if ($this->action === 'add') {
        return true;
    }
    // The owner of a post can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        $Opinion_id = $this->request->params['pass'][0];
        if ($this->Opinion->isOwnedBy($Opinion_id, $userid)) {
        return true;
        }
    }
    return parent::isAuthorized($user);
}
}
