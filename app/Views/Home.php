<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bozok Rest Api</title>   
    <style>
        .root{
                justify-content: center;
                align-items: center;
                margin-top:35px;
                text-align:center;
        }
        .root img{
            width:170px;
            height:170px;
        }
        .api-info{
            margin-left:30rem;
            font-size:20px;
            text-align:left;
        }
        th , td {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="root">
        <img src="https://bozok.edu.tr/upload/resim/logos_bsn.png" >
        <h2>Bozok Rest Api</h2>
        <h3>Bu Api Servisi Bilgisayar Mühendisliği Öğrencisi Emir Yusuf Topbaş Tarafından Kodlanmıştır.</h3>
        <div class="api-info">
    
            <table style="display: block;overflow-y: scroll;width: 525px;height: 250px;">
                <tr>
                    <th>Request</th>
                    <th>Endpoint</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><a href="<?php echo SitePath; ?>/duyurular/genel">/duyurular/genel</a></td>
                    <td>Genel Duyurular</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><a href="<?php echo SitePath; ?>/duyurular/ogrenci">/duyurular/ogrenci</a> </td>
                    <td>Öğrenci Duyuruları</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><a href="<?php echo SitePath; ?>/etkinlikler">/etkinlikler</a></td>
                    <td>Etkinlikler</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><a href="<?php echo SitePath; ?>/haberler">/haberler</a></td>
                    <td>Haberler</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><a href="<?php echo SitePath; ?>/yemekler">/yemekler</a></td>
                    <td>Yemekler</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><a href="<?php echo SitePath; ?>/yemekler/bugun">/yemekler/bugun</a></td>
                    <td>Bugunun menusu</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><a href="<?php echo SitePath; ?>/yemekler/yarin">/yemekler/yarin</a></td>
                    <td>Yarinin Menusu</td>
                </tr>
            </table> 
        </div>
    </div>
</body>
</html>