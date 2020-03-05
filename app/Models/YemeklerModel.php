<?php

class YemeklerModel extends Model {

	public function getYemeklerHtml(){
		try{
			$yemeklerHtml = file_get_contents('http://yemek.bozok.edu.tr');
			$yemeklerHtml = str_replace(array("\n","\r","\t") ,null,$yemeklerHtml);

			$yemeklerHtml = str_get_html($yemeklerHtml);
		}catch(Exception $e){
			print($e->getMessage());
			return false;
		}	

		return $yemeklerHtml;
		
	}


	public static function getYemekler(){
		
		$yemeklerHtml = self::getYemeklerHtml();

		if($yemeklerHtml != false){
			
			$yemeklerTablo = $yemeklerHtml->find('table[id="example"][class="table table-responsive table-bordered"]',0);  

			// boş diziler !	
			$yemeklerTarih = [];
			$yemeklerCorba = [];
			$yemeklerAna = [];
			$yemeklerPilav = [];
			$yemeklerTatli = [];
			$yemeklerKalori = [];

			for($i = 1 ; $i <= 19; $i++){
			
				$yemeklerTek = $yemeklerTablo->find('tr',$i);
				$yemekTarih = $yemeklerTek->find('td',0)->plaintext;

				$yemeklerTarih[$i-1] = $yemekTarih;
			}
			
			for($j = 1 ; $j <= 19; $j++){
				$yemeklerTek = $yemeklerTablo->find('tr',$j);
				$yemekCorba = $yemeklerTek->find('td',1)->plaintext;
				
				$yemeklerCorba[$j-1] = $yemekCorba; 
			}
			
			for($k = 1 ; $k <= 19; $k++){
				$yemeklerTek = $yemeklerTablo->find('tr',$k);
				$yemekAna = $yemeklerTek->find('td',2)->plaintext;
				
				$yemeklerAna[$k-1] = $yemekAna;
			}
			
			for($l = 1 ; $l <= 19; $l++){
				$yemeklerTek = $yemeklerTablo->find('tr',$l);
				$yemekPilav = $yemeklerTek->find('td',3)->plaintext;
				
				$yemeklerPilav[$l-1] = $yemekPilav; 
			}
			
			for($o = 1 ; $o <= 19; $o++){
				$yemeklerTek = $yemeklerTablo->find('tr',$o);
				$yemekTatli = $yemeklerTek->find('td',4);
				$yemekTatli = self::tatliyiBul($yemekTatli);

				$yemeklerTatli[$o-1] = $yemekTatli; 
			}
			
			for($h = 1 ; $h <= 19; $h++){
				$yemeklerTek = $yemeklerTablo->find('tr',$h);
				$yemekKalori = $yemeklerTek->find('td',5)->plaintext;

				$yemeklerKalori[$h-1] = $yemekKalori;		
			}

			$yemekler = [
				'yemek_tarih' => $yemeklerTarih,
				'yemek_corba' => $yemeklerCorba,
				'yemek_ana' => $yemeklerAna,
				'yemek_pilav' => $yemeklerPilav,
				'yemek_tatli' => $yemeklerTatli,
				'yemek_kalori' => $yemeklerKalori,
			];
			return $yemekler;
		}
			
	}
	

	public function getMenu($zaman){

		$panelClassAdi;
		if($zaman == 'bugun'){
			$panelClassAdi = 'div[class="panel panel-success"]';
		}else if($zaman == 'yarin'){
			$panelClassAdi = 'div[class="panel panel-danger"]';
		}

		$yemeklerHtml = self::getYemeklerHtml();	

		if($yemeklerHtml != false){
			$gununMenusuPanel = $yemeklerHtml->find($panelClassAdi,0);

			$gununMenusuTablo = $gununMenusuPanel->find('table[id="example"][class"table table-striped table-hover table-responsive table-bordered"]',0);
			if($gununMenusuTablo != null){

				$gununMenusuHtml =  $gununMenusuTablo->find('td',0);
				$gununMenusuKaloriHtml = $gununMenusuTablo->find('td',1);

				//td etiketinden kalori html temizleme
				$gununMenusuKaloriHtml = str_replace(array('<td>' , '</td>'), null, $gununMenusuKaloriHtml);
				


				$menuParcalanmis = explode('<br>', $gununMenusuHtml);
				
				$yemekCorba = strip_tags($menuParcalanmis[0]);
				$yemekAna = strip_tags($menuParcalanmis[1]);
				$yemekPilav = strip_tags($menuParcalanmis[2]);
				$yemekTatli = strip_tags($menuParcalanmis[3]);

				$menuKaloriParcalanmis = explode('<br>' , $gununMenusuKaloriHtml);
				unset($menuKaloriParcalanmis[4]);
				$yemekKalori = $menuKaloriParcalanmis;

				$menu = [
					'yemek_corba' => $yemekCorba,
					'yemek_ana' => $yemekAna,
					'yemek_pilav' => $yemekPilav,
					'yemek_tatli' => $yemekTatli,
					'yemek_kalori' => $yemekKalori
				];
				return $menu;
								 
			}else{
				echo "Bugune ait menu girilmemistir";
			}
			
		}
		
	}



	public static function tatliyiBul($str){
		$yazi = strip_tags($str);
		$boslugaGoreBolunmus = explode('  ', $yazi);
		$yildizaGoreBolunmus = explode('*', $boslugaGoreBolunmus[0]);
		if(count($yildizaGoreBolunmus) == 2){
			return $yildizaGoreBolunmus[0];
		}else{
			return $boslugaGoreBolunmus[0];
		}


	}

}

?>