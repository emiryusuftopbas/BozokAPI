<?php

class Etkinlikler extends Controller {
	
	public static function index(){
		$etkinliklerModel = $this->model('EtkinliklerModel');

		$data = $etkinliklerModel->getEtkinlikler();

		$this->view('Etkinlikler', $data);	
	}

	public static function detay($par){
		
		$etkinliklerModel = $this->model('EtkinliklerModel');

		$etkinlikDetay = $etkinliklerModel->getEtkinlikDetay($par);

		$data = [
			'etkinlikDetay' => $etkinlikDetay
		];

		$this->view('EtkinlikDetay' , $data);
		
	}
}

?>