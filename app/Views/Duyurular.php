{
    "duyurular" :
[
    <?php  for($i = 0;$i<count($duyuru_baslik);$i++){ ?>
     {
         "duyuru-baslik" : "<?php echo escapeJsonString($duyuru_baslik[$i]) ?>",
         "duyuru-sene" : "<?php echo  escapeJsonString($duyuru_sene[$i]) ?>",
         "duyuru-tarih" : "<?php echo escapeJsonString($duyuru_tarih[$i]) ?>",
         "duyuru-detay" : "<?php echo $duyuru_icerik[$i] ?>"
         
     }<?php if($i<count($duyuru_baslik)-1) echo',';?>
    <?php } ?>
]
}