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
          <h3 class="card-title">Kategori Ekleme Ayarları</h3>  </div>


          
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
                    <label for="exampleInputEmail1">Kategori Adı</label>
                    <input  name="kadi" type="text" class="form-control"  placeholder=" Kategori Adı Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Sırası</label>
                    <input name="sira" type="text" class="form-control"  placeholder="Kategori Sırası Giriniz">
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Durum</label>
                      <select name="kategoridurum" class="form-control select2" style="width: 100%;">
                        <option value="1" selected="selected">Aktif</option>
                        <option value="0">Pasif</option>
                        
                      </select>
                    </div>
                    
                  </div>

                </div>
                <div class="card-footer">
                  <button  name="kategorikaydet" type="submit" class="btn btn-primary">Gönder</button>
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

