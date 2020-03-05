{
    "haberler" :
[
    <?php  for($i = 0;$i<count($haber_baslik);$i++){ ?>
     {
         "haber-baslik" : "<?php echo escapeJsonString($haber_baslik[$i]) ?>",
         "haber-aciklama" : "<?php echo escapeJsonString($haber_resim_aciklama[$i]) ?>",
         "haber-resim" : "<?php echo 'http://bozok.edu.tr'.$haber_resim[$i] ?>",
         "haber-detay" : "<?php echo $haber_icerik[$i] ?>"
         
     }<?php if($i<count($haber_baslik)-1) echo',';?>
    <?php } ?>
]
}