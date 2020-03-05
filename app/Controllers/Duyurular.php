<?php
	
class Duyurular extends Controller{

	public static function index($par = null){
		
		$duyurularModel = $this->model('DuyurularModel');

		$duyuruTip = $par;

		$data = $duyurularModel->getDuyurular($duyuruTip);

		$this->view('Duyurular',$data);
	}
	public static function detay($par = null){
		$duyurularModel = $this->model('DuyurularModel');

		$duyuruDetay = $duyurularModel->getDuyuruDetay($par);

		$data = [
			'duyuruDetay' => $duyuruDetay
		];

		$this->view('DuyuruDetay',$data);
	}

}

?>