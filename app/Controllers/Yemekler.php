<?php

class Yemekler extends Controller {

	public static function index(){
		$yemeklerModel = $this->model('YemeklerModel');

		$data = $yemeklerModel->getYemekler();

		$this->view('Yemekler',$data);
	}

	public static function bugun(){
		$yemeklerModel = $this->model('YemeklerModel');

		$data = $yemeklerModel->getMenu('bugun');

		$this->view('YemekGunluk' , $data);
	}

	public static function yarin(){
		$yemeklerModel = $this->model('YemeklerModel');

		$data = $yemeklerModel->getMenu('yarin');

		$this->view('YemekGunluk' , $data);
	}

}

?>