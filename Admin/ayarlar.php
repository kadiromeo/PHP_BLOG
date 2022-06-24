<?php 
require_once 'header.php';
require_once 'sidebar.php';
require_once 'islem/baglanti.php';



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
          <h3 class="card-title">Genel Ayarlar</h3>  </div>


          
          <?PHP 

          if (@$_GET['yuklenme']=="basarili") { ?>
            <h5 class="alert-success">BAŞARILI</h5>
            <?PHP }elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
              <h5 class=" alert-danger">BAŞARISIZ</h5>
              <?PHP }

              ?>
              
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Başlık</label>
                    <input value="<?PHP echo $ayarcek['baslik'] ?>" name="baslik" type="text" class="form-control"  placeholder="Site Başlığı Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Açıklama</label>
                    <input value="<?php echo $ayarcek['aciklama'] ?>" name="aciklama" type="text" class="form-control"  placeholder="Site Açıklaması Giriniz">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Anahtar Kelime</label>
                    <input value="<?PHP echo $ayarcek['anahtarkelime'] ?>" name="anahtarkelime" type="text" class="form-control"  placeholder="Anahtar Kelime Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Yazar</label>
                    <input value="<?php echo $ayarcek['yazar'] ?>" name="yazar" type="text" class="form-control"  placeholder="Site Yazarını Giriniz">
                  </div>
                </div>
                <div class="card-footer">
                  <button name="ayarkaydet" type="submit" class="btn btn-primary">Gönder</button>
                </div>
              </form>
            </div>
            
            <div class="card card-primary col-md-12">
              <form action="islem/islem.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <input type="hidden" name="eskilogo" value="<?PHP echo $ayarcek['logo'] ?>">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Logo</label>
                    <img src="resimler/logo/<?PHP echo $ayarcek['logo'] ?>" width="100">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Logo</label>
                    <input name="logo" type="file" class="form-control" >
                  </div>
                  
                </div>
                <div class="card-footer">
                  <button name="logokaydet" type="submit" class="btn btn-primary">Gönder</button>
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

