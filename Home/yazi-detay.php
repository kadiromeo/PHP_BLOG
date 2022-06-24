<?php 
require_once 'header.php';

$yazilar=$baglanti->prepare("SELECT * from yazilar where yazi_id=:yazi_id and yazi_durum=:yazi_durum order by yazi_sira asc");
$yazilar->execute(array(

    'yazi_id'=>$_GET['yazi_id'],
    'yazi_durum'=>1

));



$yazilarcek = $yazilar ->fetch(PDO::FETCH_ASSOC)
?>
<div class="single">
 <div class="container">
  <div class="col-md-8 single-main">                 
      <div class="single-grid">
        <img src="../Admin/resimler/yazilar/<?php echo $yazilarcek['yazi_resim'] ?>" alt=""/>                                             
        <p><?php echo $yazilarcek['yazi_aciklama'] ?></p>
    </div>
    <ul class="comment-list">
       <h5 class="post-author_head">Written by <a href="#" title="Posts by admin" rel="author"> <?php echo $kullanicicek['kullanici_ad'] ?></a></h5>
       <li><img src="../assets/images/avatar.png" class="img-responsive" alt="">
           <div class="desc">
               <p>View all posts by: <a href="#" title="Posts by admin" rel="author"> <?php echo $kullanicicek['kullanici_ad'] ?></a></p>
           </div>
           <div class="clearfix"></div>
       </li>
   </ul>
   <span>
    <i> <?php 

    if (@$_GET['yuklenme']=='basarili') { ?>
    Yorum yapma başarılı</i>
<?php } elseif (@$_GET['yuklenme']=='basarisiz') {?>  
    <i>  Yorum yapma başarısız   <?php     } ?>

</i>
</span>



<form  action="../Admin/islem/islem.php" method="post">

    <div class="content-form">
     <h3 class="alert alert-info">Yorum</h3>
     <input type="hidden" name="yaziid" value="<?php echo $yazilarcek['yazi_id'] ?>"/> 
     <input type="text" name="ad" placeholder="adınızı giriniz" required class="form-control"/><br>
     <textarea placeholder="yorumunuzu giriniz" name="yorum" class="form-control"></textarea><br>
     <input type="submit" value="Gönder" class="btn btn-info" name="yorumyap" />

 </div>

</form>

<?php 
$yorumlar=$baglanti->prepare("SELECT * FROM yorumlar where yazi_id=:yazi_id and yorum_onay=:yorum_onay order by yorum_id asc");
$yorumlar->execute(array(

    'yazi_id'=>$_GET['yazi_id'],
    'yorum_onay'=>1

));

while  ($yorumlarcek = $yorumlar ->fetch(PDO::FETCH_ASSOC)){ ?>

  <ul class="comment-list">
   <h5 class="post-author_head"><?php echo $yorumlarcek['kullanici_ad'] ?>  <?php echo $yorumlarcek['yorum_zaman'] ?></h5>
   <li><img src="../assets/images/avatar.png" class="img-responsive" alt="">
       <div class="desc">
           <p> <?php echo $yorumlarcek['yorum_detay'] ?></p>
       </div>
       <div class="clearfix"></div>
   </li>
</ul>

<?php } ?>
</div>


</div>
</div>



</div>
<?php 
require_once 'footer.php';


?>