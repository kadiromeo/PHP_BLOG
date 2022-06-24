<?php 

require_once 'header.php';
require_once 'sidebar.php';
require_once 'islem/baglanti.php';

$yazilar=$baglanti->prepare("SELECT * FROM yazilar WHERE yazi_id=:yazi_id");
@$yazilar->execute(array(
  'yazi_id'=>$_GET['id']

));
$yazilarcek = $yazilar ->fetch(PDO::FETCH_ASSOC);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
       <div class="card card-primary col-md-12">
        <div class="card-header">
          <h3 class="card-title">yazilar Ekleme Ayarları</h3>  </div>


          
          <?PHP 

          if (@$_GET['yuklenme']=="basarili") { ?>
            <h5 class="alert-success">BAŞARILI</h5>
            <?PHP }elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
              <h5 class=" alert-danger">BAŞARISIZ</h5>
              <?PHP }
              elseif(@$_GET['yuklenme']=="kullanicivar"){ ?>
                <h5 class=" alert-danger">Kullanıcı Kayıtlı</h5>
              <?php }    ?>
              
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="post" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="form-group">
                    <label>Kategori Seç</label>
                    <select name="yazikategori" class="form-control select2" style="width: 100%;">
                      <?php 
                      $katid=$yazilarcek['kategori_id'];

                      $kategori=$baglanti->prepare("select * from kategori order by kategori_id asc");
                      $kategori->execute();

                      while  ($kategoricek = $kategori ->fetch(PDO::FETCH_ASSOC)){ 

                        $kategoriid=$kategoricek['kategori_id'];

                        ?>
                        <option <?php 


                        if ($katid==$kategoriid) {
                          echo "selected";
                        }

                        ?> value="<?php echo $kategoriid
                      ?>"><?PHP echo $kategoricek['kategori_ad']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <img width="150" src="resimler/yazilar/<?PHP echo $yazilarcek['yazi_resim'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">yazilar resim</label>
                  <input  value="<?php echo $yazilarcek['yazi_resim'] ?>" name="yazilaresim" type="file" class="form-control"  >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">yazilar başlık</label>
                  <input  value="<?php echo $yazilarcek['yazi_baslik'] ?>" name="yazilarbaslik" type="text" class="form-control"  placeholder=" yazilar Başlık Giriniz">
                </div>
                <input type="hidden" name="katsid" value="<?php echo @$_GET['katid'] ?>">

                <label>Detay</label>
                <textarea  name="yazilaraciklama" class="ckeditor" id="editor1"><?php echo $yazilarcek['yazi_aciklama'] ?></textarea>

                <input type="hidden" name="katsid" value="<?php echo @$_GET['katid'] ?>">

                <div class="form-group">
                  <label for="exampleInputEmail1">yazilar sıra</label>
                  <input  value="<?php echo $yazilarcek['yazi_sira'] ?>"name="yazilarsira" type="text" class="form-control"  placeholder="yazilar Sırası Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">yazilar anahtar kelime</label>
                  <input value="<?php echo $yazilarcek['yazi_etiket'] ?>" name="yazilaranahtar" type="text" class="form-control"  placeholder="anahtar kelime giriniz">
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>yazilar durum</label>
                    <select name="yazilardurum" class="form-control select2" style="width: 100%;">
                      <option   <?php if ($yazilarcek['yazi_durum']==1) { echo "selected"; }  ?>   value="1" selected="selected">Aktif</option>
                      <option   <?php if ($yazilarcek['yazi_durum']==0) { echo "selected"; }  ?>  value="0">Pasif</option>
                      
                    </select>
                  </div>

                  <input type="hidden" name="id" value="<?php echo $yazilarcek['yazi_id'] ?>">
                  <input type="hidden" name="eskiresim" value="<?php echo $yazilarcek['yazi_resim'] ?>">



                </div>

              </div>
              <div class="card-footer">
                <button  name="yaziduzenle" type="submit" class="btn btn-primary">Gönder</button>
              </div>
            </form>
          </div>
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once 'footer.php'; ?>

