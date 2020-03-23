<?php

class HaberlerModel extends Model {

	public static function getHaberler(){
		$link = "http://bozok.edu.tr/basin/hl/tum-haberler,tr.aspx";

		$SitePath = strtolower( dirname($_SERVER['SCRIPT_NAME'])) ;


	    $site = file_get_contents($link);

	    preg_match_all('@<div class="habers ichliste"><a href="(.*?)"><img alt="(.*?)" src="(.*?)"><strong>(.*?)</strong><p>(.*?)</p></a></div>@si' , $site,$haberler);
	    
	    $haberDetaylar = $haberler[1];
	    $haberResimAciklamalar = $haberler[2];
	    $haberResimler = $haberler[3];
	    $haberBasliklar = $haberler[4];
	    $haberAciklamalar = $haberler[5];
	    $haberIcerikler = [];
	    for($j =0;$j<count($haberDetaylar);$j++){
	        $parsed1 = explode("/basin/haber/",$haberDetaylar[$j]);
	        $parsed2 = explode('.aspx',$parsed1[1]);

	        $haberIcerikler[$j] = 'http://'.SiteHost.SitePath.'/haber/'.$parsed2[0];
	    }

	    $haberler = [
	    	'haber_detay' => $haberDetaylar,
	    	'haber_resim_aciklama' => $haberResimAciklamalar,
	    	'haber_resim' => $haberResimler,
	    	'haber_baslik' => $haberBasliklar,
	    	'haber_aciklama' => $haberAciklamalar,
	    	'haber_icerik' => $haberIcerikler
	    ];
	    return $haberler;
	}

	public static function getHaberDetay($haberDetayId){
		$haberLink = 'http://bozok.edu.tr/basin/haber/'.$haberDetayId.'.aspx';
    	
    	$site = file_get_contents($haberLink);

    	preg_match_all('@<article class="ortaAlan haber">(.*?)</article>@si',$site,$haber);
    
   		return $haber[0][0];
	}

}


?>