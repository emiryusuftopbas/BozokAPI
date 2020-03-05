<?php

class Haberler extends Controller {

	public static function index(){
		$haberlerModel = $this->model('HaberlerModel');

		$data = $haberlerModel->getHaberler();

		$this->view('Haberler',$data);
	}

	public static function detay($par){
		$haberlerModel = $this->model('HaberlerModel');

		$haberDetay = $haberlerModel->getHaberDetay($par);

		$data = [
			'haberDetay' => $haberDetay
		];

		$this->view('HaberDetay' , $data);

	}
}


?>