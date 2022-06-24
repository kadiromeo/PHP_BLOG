<?php 
require_once 'header.php';
require_once 'sidebar.php';   
require_once 'islem/baglanti.php';


$kategori=$baglanti->prepare("SELECT * FROM kategori WHERE kategori_id=:kategori_id");
@$kategori->execute(array(
  'kategori_id'=>$_GET['id']

));
$kategoricek = $kategori ->fetch(PDO::FETCH_ASSOC);

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
          <h3 class="card-title">Kategori Düzenleme Ayarları</h3>  </div>


          
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
                    <input value="<?php echo $kategoricek['kategori_ad']; ?>" name="kadi" type="text" class="form-control"  placeholder=" Kategori Adı Giriniz">
                  </div>
                  <input type="hidden" name="katid" value="<?php echo $kategoricek['kategori_id'] ?>">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Sırası</label>
                    <input value="<?php echo $kategoricek['kategori_sira']; ?>"  name="sira" type="text" class="form-control"  placeholder="Kategori Sırası Giriniz">
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">

                      <label>Durum</label>
                      <select name="kategoridurum" class="form-control select2" style="width: 100%;">
                        <option value="1" <?php 
                        if ($kategoricek['kategori_durum']=="1") {
                          echo 'selected';
                        }



                      ?>>Aktif</option>
                      <option value="0" <?php 
                      if ($kategoricek['kategori_durum']=="0") {
                        echo 'selected';
                      }



                    ?>>Pasif</option>
                    
                  </select>
                </div>
                
              </div>

            </div>
            <div class="card-footer">
              <button  name="kategoriduzenle" type="submit" class="btn btn-primary">Gönder</button>
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

