<?php
App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class VkAuthenticate extends BaseAuthenticate {
	public function authenticate(CakeRequest $request, CakeResponse $response) {
	//	var_dump($request);
		return array('id'=>$request->query['uid'],'vk_id'=>$request->query['uid'],
				'username'=>$request->query['first_name'].' '.$request->query['last_name'],'role'=>'vk');
	}
}