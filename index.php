<?php


	require __DIR__.'/core/controller.php';
	require __DIR__.'/core/model.php';
	require __DIR__.'/core/route.php';
	require __DIR__.'/vendor/autoload.php';
	require __DIR__.'/app/config.php';


	Route::run('/','home@index');
	Route::run('/duyurular/{url}', 'duyurular@index' );
	Route::run('/duyuru/{url}' , 'duyurular@detay' );
	Route::run('/etkinlikler' , 'etkinlikler@index' );
	Route::run('/etkinlik/{url}' , 'etkinlikler@detay' );
	Route::run('/haberler' , 'haberler@index' );
	Route::run('/haber/{url}' , 'haberler@detay');
	Route::run('/yemekler' , 'yemekler@index');
	Route::run('/yemekler/bugun' , 'yemekler@bugun' );
	Route::run('/yemekler/yarin' , 'yemekler@yarin' );

?>