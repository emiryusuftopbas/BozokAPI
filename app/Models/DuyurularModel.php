<?php

class DuyurularModel extends Model {

	public function duyurularHtml($duyuruTip){
		$duyurularLink = "http://bozok.edu.tr/dl/tum-duyurular,tr-1.aspx";
		if($duyuruTip == 'genel'){
			$duyurularLink = "http://bozok.edu.tr/dl/tum-duyurular,tr-1.aspx";
		}else if($duyuruTip == 'ogrenci'){
			$duyurularLink = "http://bozok.edu.tr/dl/tum-duyurular,tr-2.aspx";
		}else{
			$duyurularLink = "http://bozok.edu.tr/dl/tum-duyurular,tr-1.aspx";
		}

		$html = file_get_contents($duyurularLink);

		return $html;
	}

	public static function getDuyurular($duyuruTip){
		$duyurularHtml = self::duyurularHtml($duyuruTip);

		$SitePath = strtolower( dirname($_SERVER['SCRIPT_NAME'])) ;

		preg_match_all('@<li><p><a href="(.*?)"><span><samp>(.*?)</samp><cite>(.*?)</cite></span><strong>(.*?)</strong></a></p></li>@si',$duyurularHtml,$gelenveri);

        
	    $duyuruDetaylar = $gelenveri[1];
	    $duyuruTarihler = $gelenveri[2];
	    $duyuruSeneler = $gelenveri[3];
	    $duyuruBasliklar = $gelenveri[4];
	    $duyuruIcerikler = [];
	    for($j =0;$j<count($duyuruDetaylar);$j++){
	        $parsed1 = explode("/duyuru/",$duyuruDetaylar[$j]);
	        $parsed2 = explode('.aspx',$parsed1[1]);

	        $duyuruIcerikler[$j] = 'http://'.SiteHost.SitePath.'/duyuru/'.$parsed2[0];
    	}
    	$duyurular =  array(
    		'duyuru_detay' => $duyuruDetaylar, 
    		'duyuru_tarih' => $duyuruTarihler ,
    		'duyuru_sene' => $duyuruSeneler,
    		'duyuru_baslik' => $duyuruBasliklar,
    		'duyuru_icerik' => $duyuruIcerikler
    	);
    	return $duyurular;
	}

	public static function getDuyuruDetay($duyuruDetayId){
		$duyuruLink = 'http://bozok.edu.tr/duyuru/'.$duyuruDetayId.'.aspx';
		$duyuruDetayHtml = file_get_contents($duyuruLink);
		preg_match_all('@<article class="ortaAlan haber">(.*?)</article>@si',$duyuruDetayHtml,$cikti);

		$duyuruDetay = $cikti[0][0];;

    	return $duyuruDetay;
	}
}




?>