<?php
App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class LoginzaAuthenticate extends BaseAuthenticate {
	public function authenticate(CakeRequest $request, CakeResponse $response) {
	//	var_dump($request);
		$loginzaid='33225';
		$loginzakey='8d1a6be123d872ebf3a222dd3aae39ba';
		$token=$_POST['token'];
		$sig=md5($token.$loginzakey); //��������� ���������.
		$kk="http://loginza.ru/api/authinfo?token=".$token."&id=".$loginzaid."&sig=".$sig."";
		$b=file_get_contents($kk); //�������� ������ �� �������
		$authresult=json_decode($b,true); //�������� PHP ������ � ������� �����������
		return $authresult;
	}
}