<?php
require_once 'header.php';


?>
<!-- Main Content-->

<div class="col-md-4 side-content">



    <form action="arama" method="post" class="input-group">
      <div class="form-outline col-md-9">
        <input type="search" id="form1" class="form-control p-3" name="aranacakkelime" placeholder="Arama yap!" />
    </div>
    <button name="kelimearama" type="submit" class="btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>

<div class="recent mt-5">
    <h3><?php echo $dil["t4"] ?></h3>
    <ul>

     <?php
     $kategori=$baglanti->prepare("SELECT * FROM kategori order by kategori_id asc");
     $kategori->execute();
     while  ($kategoricek = $kategori ->fetch(PDO::FETCH_ASSOC)){ ?>
        <li><a href="yazilar-<?=seo($kategoricek['kategori_ad']).'-'.$kategoricek['kategori_id']?>?sayfa=1"><?php echo $kategoricek['kategori_ad'] ?></a></li>
    <?php } ?>

</ul>
</div>


<div class="recent">
    <h3>Güncel İçerikler</h3>
    <ul>

        <?php
        $yazilar=$baglanti->prepare("SELECT * FROM  yazilar  order by yazi_id DESC limit 3");
        $yazilar->execute();
        while ($yazilarcek=$yazilar->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <li><a href="yazi-detay-<?=seo($yazilarcek['yazi_baslik']).'-'.$yazilarcek['yazi_id']?>"><?php echo $yazilarcek['yazi_baslik']?></a></li>
        <?php } ?>

    </ul>
</div>
</div>




<!-- Footer-->
<?php

require_once 'footer.php';
?>
