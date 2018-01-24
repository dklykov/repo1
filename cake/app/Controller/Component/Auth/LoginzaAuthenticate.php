<?php
App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class LoginzaAuthenticate extends BaseAuthenticate {
	public function authenticate(CakeRequest $request, CakeResponse $response) {
	//	var_dump($request);
		$loginzaid='33225';
		$loginzakey='8d1a6be123d872ebf3a222dd3aae39ba';
		$token=$_POST['token'];
		$sig=md5($token.$loginzakey); //Формируем сигнатуру.
		$kk="http://loginza.ru/api/authinfo?token=".$token."&id=".$loginzaid."&sig=".$sig."";
		$b=file_get_contents($kk); //Получаем данные от Логинзы
		$authresult=json_decode($b,true); //Получаем PHP массив с данными авторизации
		return $authresult;
	}
}