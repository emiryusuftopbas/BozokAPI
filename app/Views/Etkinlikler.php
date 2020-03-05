{
    "etkinlikler" :
[
    <?php  for($i = 0;$i<count($etkinlik_baslik);$i++){ ?>
     {
         "etkinlik-baslik" : "<?php echo escapeJsonString($etkinlik_baslik[$i]) ?>",
         "etkinlik-tarih" : "<?php echo $etkinklik_tarih[$i] ?>",
         "etkinlik-gün" : "<?php echo $etkinlik_sene[$i] ?>",
         "etkinlik-detay" : "<?php echo $etkinlik_detay[$i] ?>"
         
     }<?php if($i<count($etkinlik_baslik)-1) echo',';?>
    <?php } ?>
]
}