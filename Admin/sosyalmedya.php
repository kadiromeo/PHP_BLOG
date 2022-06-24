<?php require_once 'header.php';

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
          <h3 class="card-title">Sosyal Medya Ayarları</h3>  </div>


          
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
                    <label for="exampleInputEmail1">Twitter</label>
                    <input value="<?PHP echo $ayarcek['twitter'] ?>" name="twitter" type="text" class="form-control"  placeholder="Twitter Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook</label>
                    <input value="<?PHP echo $ayarcek['facebook'] ?>" name="facebook" type="text" class="form-control"  placeholder="Facebook Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">GitHub</label>
                    <input value="<?php echo $ayarcek['github'] ?>" name="github" type="text" class="form-control"  placeholder="İnstagram Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Youtube</label>
                    <input value="<?PHP echo $ayarcek['youtube'] ?>" name="youtube" type="text" class="form-control"  placeholder="Youtube Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">İnstagram</label>
                    <input value="<?PHP echo $ayarcek['instagram'] ?>" name="instagram" type="text" class="form-control"  placeholder="Youtube Giriniz">
                  </div>
                </div>
                <div class="card-footer">
                  <button name="sosyalmedyakaydet" type="submit" class="btn btn-primary">Gönder</button>
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

