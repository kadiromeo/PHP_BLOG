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
          <h3 class="card-title">Hakkımızda Ayarlar</h3>  </div>


          
          <?PHP 

          if (@$_GET['yuklenme']=="basarili") { ?>
            <h5 class="alert-success">BAŞARILI</h5>
            <?PHP }elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
              <h5 class=" alert-danger">BAŞARISIZ</h5>
              <?PHP }

              ?>
              
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Başlık</label>
                    <input value="<?PHP echo $hakkimizdacek['hakkimizda_baslik'] ?>" name="baslik" type="text" class="form-control"  placeholder=" Başlığı Giriniz">
                  </div>

                  <label>Detay</label>
                  <textarea  name="detay" class="ckeditor" id="editor1"><?PHP echo $hakkimizdacek['hakkimizda_detay'] ?></textarea>

                </div>
                <div class="card-footer">
                  <button  name="hakkimizdakaydet" type="submit" class="btn btn-primary">Gönder</button>
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

