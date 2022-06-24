<?php
require_once 'header.php';

?>
<!-- Main Content-->
<div class="container" >
    <div class="content-grids">
        <div class="col-md-6 content-main">
            <!-- Post preview-->
            <?php
            $yazilar=$baglanti->prepare("SELECT * FROM  yazilar  order by yazi_id DESC limit 5");
            $yazilar->execute();
            while ($yazilarcek=$yazilar->fetch(PDO::FETCH_ASSOC)) {

             ?>

             <div class="content-grid-info">
                 <img src="../Admin/resimler/yazilar/<?php echo $yazilarcek['yazi_resim'] ?>" alt="" class="card-img-top"/>
                 <div class="post-info">
                     <h4><a href="yazi-detay-<?=seo($yazilarcek['yazi_baslik']).'-'.$yazilarcek['yazi_id']?>"><?php echo $yazilarcek['yazi_baslik']?></a> <?php echo $yazilarcek['yazi_zaman'] ?></h4>
                     <p<?php echo substr($yazilarcek['yazi_aciklama'],0,30)?></p>
                     <a href="yazi-detay-<?=seo($yazilarcek['yazi_baslik']).'-'.$yazilarcek['yazi_id']?>"><span></span>READ MORE</a>
                 </div>
             </div>
         <?php } ?>
     </div>
     <?php
     require_once 'kategori.php';
     ?>
 </div>

</div>

<!-- Footer-->
<?php

require_once 'footer.php';
?>
