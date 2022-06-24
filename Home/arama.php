<?php
require_once'header.php';
?>

<div class="container">
	<div class="row">

		<div class="col-md-8">
			<!-- Post preview-->

            <?php

            if (isset($_POST['kelimearama'])) {

                $aranacakkelime=$_POST['aranacakkelime'];
                $yazilar=$baglanti->prepare("SELECT * FROM  yazilar where yazi_baslik LIKE ?");
                $yazilar->execute(array("%$aranacakkelime%"));
                $yazilarsayisi=$yazilar->rowCount();

            }

            ?>

            <?php

            while ($yazilarcek=$yazilar->fetch(PDO::FETCH_ASSOC)) { ?>
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

<?php
require_once'footer.php';
?>
