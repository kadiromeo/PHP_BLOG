<?php 
require_once 'header.php';
require_once 'sidebar.php';

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


        <?PHP 

        if (@$_GET['yuklenme']=="basarili") { ?>
          <h5 class="alert-success">BAŞARILI</h5>
          <?PHP }elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
            <h5 class=" alert-danger">BAŞARISIZ</h5>
            <?PHP }

            ?>
            
            
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">slider</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="slider-ekle" ><button style="float:right;" type="submit" class="btn btn-info">Yeni slider Ekle</button></a>  
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">

                    <thead>
                      <tr>
                       <th>slider resim</th>
                       <th>slider başlık</th>
                       <th>slider açıklama</th>
                       <th>slider durum</th>
                       <th>slider sıra</th>
                       <th>Sil</th>
                       <th>Düzenle</th>
                       
                     </tr>
                   </thead>
                   <tbody>
                    <?php 

                    $slider=$baglanti->prepare("SELECT * from slider order by slider_id asc");
                    $slider->execute();

                    while  ($slidercek = $slider ->fetch(PDO::FETCH_ASSOC)){ ?>
                      <tr>
                        <td><img src="resimler/slider/<?php echo $slidercek['slider_resim'] ?>" width='100'></td>
                        <td><?php echo $slidercek['slider_baslik'];?></td>
                        <td><?php echo $slidercek['slider_aciklama']; ?></td>
                        <td> <?php 
                        if  ($slidercek['slider_durum']=="1") {
                          echo "Aktif";
                        }elseif ($slidercek['slider_durum']=="0") {
                          echo "Pasif";
                        }?>
                        
                      </span></td>
                      
                      <td><?php echo $slidercek['slider_sira']; ?></td>

                    </td>
                    <form action="islem/islem.php" method="post">
                      <td> 
                       <input type="hidden" name="id" value="<?PHP echo $slidercek['slider_id'] ?>">
                       <input type="hidden" name="resim" value="<?PHP echo $slidercek['slider_resim'] ?>">

                       <button name="slidersil" class="btn btn-danger">Sil</button>

                       
                     </td>

                   </form>

                   <td><a href="slider-duzenle?id=<?php echo $slidercek['slider_id'] ?>">
                    
                    <button class="btn btn-success" type="submit">Düzenle</button>

                  </a></td>
                  
                </tr>
                <?PHP  } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    
    <!-- /.row (main row) -->

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>

