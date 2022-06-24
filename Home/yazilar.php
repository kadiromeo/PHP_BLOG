<?php
require_once'header.php';

$sayibul=$baglanti->prepare("SELECT * FROM  yazilar where kategori_id=:kategori_id and yazi_durum=:yazi_durum ");

$sayibul->execute(array(
	'kategori_id'=>$_GET['kategori_id'],
	'yazi_durum'=>1

));

$yazisayisi=$sayibul->rowCount();

$kac=8;

$sayfa=$_GET['sayfa'];

$sayfa1=($sayfa*$kac)-$kac;

$yazilar=$baglanti->prepare("SELECT * FROM  yazilar where kategori_id=:kategori_id and yazi_durum=:yazi_durum order by yazi_sira ASC limit $sayfa1, $kac");
$yazilar->execute(array(
	'kategori_id'=>$_GET['kategori_id'],
	'yazi_durum'=>1

));

$sayfasayisi=ceil($yazisayisi/$kac);

?>


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
			<div>

				<a href="?sayfa=<?php echo $sayfa-1 ?>" class="Previous"><i class="fa fa-chevron-left"></i> Geri</a>
				|
				<a href="?sayfa=<?php echo $sayfa+1 ?>" class="Next"> İleri <i class="fa fa-chevron-right"></i></a>

			</div>
		</div>


		<?php

		require_once 'kategori.php';
		?>

	</div>

</div>


</div>
</div>

<?php
require_once'footer.php';
?>
