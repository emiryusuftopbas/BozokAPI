<?php

class EtkinliklerModel extends Model {

	public static function getEtkinlikler(){
		$link = "http://bozok.edu.tr/el/tum-etkinlikler,tr.aspx";

		$SitePath = strtolower( dirname($_SERVER['SCRIPT_NAME'])) ;

	    $etkinliklerHtml = file_get_contents($link);
	    preg_match_all('@<li><a href="(.*?)"><span><samp>(.*?)</samp><cite>(.*?)</cite></span><strong>(.*?)</strong></a></li>@si',$etkinliklerHtml,$gelenveri);

	    $etkinlikDetaylar = $gelenveri[1];
	    $etkinlikTarihler = $gelenveri[2];
	    $etkinlikSene = $gelenveri[3];
	    $etkinlikBasliklar = $gelenveri[4];
	    $etkinlikIcerikler = [];
		for($j =0;$j<count($etkinlikDetaylar);$j++){
	        $parsed1 = explode("/etkinlik/",$etkinlikDetaylar[$j]);
	       	$parsed2 = explode('.aspx',$parsed1[1]);

	        $etkinlikIcerikler[$j] = 'http://'.SiteHost.SitePath.'/etkinlik/'.$parsed2[0]; 	
	    }

	    $etkinlikler =  array(
    		'etkinlik_detay' => $etkinlikDetaylar, 
    		'etkinklik_tarih' => $etkinlikTarihler ,
    		'etkinlik_sene' => $etkinlikSene,
    		'etkinlik_baslik' => $etkinlikBasliklar,
    		'etkinlik_detay' => $etkinlikIcerikler
    	);
    	return $etkinlikler;
	}

	public static function getEtkinlikDetay($etkinlikDetayId){
		$etkinlikLink = 'http://bozok.edu.tr/etkinlik/'.$etkinlikDetayId.'.aspx';

		$etkinlikDetayHtml = file_get_contents($etkinlikLink);

		preg_match_all('@<article class="ortaAlan haber">(.*?)</article>@si',$etkinlikDetayHtml,$cikti);
		   
		$etkinlikDetay = $cikti[1][0];

		return $etkinlikDetay;
	}

}

?>