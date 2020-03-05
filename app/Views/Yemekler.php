{
    "yemekler" :
[
    <?php  for($i = 0;$i<count($yemek_tarih);$i++){ ?>
     {
         "yemek-tarih" : "<?php echo escapeJsonString($yemek_tarih[$i]) ?>",
         "yemek-corba" : "<?php echo escapeJsonString($yemek_corba[$i]) ?>",
         "yemek-ana" : "<?php echo escapeJsonString($yemek_ana[$i]) ?>",
         "yemek-pilav" : "<?php echo escapeJsonString($yemek_pilav[$i]) ?>",
         "yemek-tatli" : "<?php echo escapeJsonString($yemek_tatli[$i]) ?>",
         "yemek-kalori" : "<?php echo escapeJsonString($yemek_kalori[$i]) ?>"
         
     }<?php if($i<count($yemek_tarih)-1) echo',';?>
    <?php } ?>
]
}