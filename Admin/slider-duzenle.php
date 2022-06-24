<?php 

require_once 'header.php';
require_once 'sidebar.php';
require_once 'islem/baglanti.php';

$slider=$baglanti->prepare("SELECT * FROM slider WHERE slider_id=:slider_id");
@$slider->execute(array(
  'slider_id'=>$_GET['id']

));
$slidercek = $slider ->fetch(PDO::FETCH_ASSOC);

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
          <h3 class="card-title">slider Ekleme Ayarları</h3>  </div>


          
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
                    <label for="exampleInputEmail1">slider resim</label>
                    <input name="slideresim" type="file" class="form-control"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">slider başlık</label>
                    <input value="<?php echo $slidercek['slider_baslik'] ?>"  name="sliderbaslik" type="text" class="form-control"  placeholder=" slider Başlık Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">slider açıklama</label>
                    <input value="<?php echo $slidercek['slider_aciklama'] ?>"  name="slideraciklama" type="text" class="form-control"  placeholder="slider Açıklama Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">slider sıra</label>
                    <input value="<?php echo $slidercek['slider_sira'] ?>"  name="slidersira" type="text" class="form-control"  placeholder="slider Sırası Giriniz">
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label>slider durum</label>
                      <select name="sliderdurum" class="form-control select2" style="width: 100%;">
                        <option  <?php   if ($slidercek['slider_durum']=="1") { echo "selected";} ?> value="1" selected="selected">Aktif</option>
                        <option  <?php   if ($slidercek['slider_durum']=="0") { echo "selected";} ?> value="0">Pasif</option>
                        
                      </select>

                      <input type="hidden" name="id" value="<?php echo $slidercek['slider_id'] ?>">
                      <input type="hidden" name="eskiresim" value="<?php echo $slidercek['slider_resim'] ?>">


                    </div>

                  </div>

                </div>
                <div class="card-footer">
                  <button  name="sliderduzenle" type="submit" class="btn btn-primary">Gönder</button>
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

