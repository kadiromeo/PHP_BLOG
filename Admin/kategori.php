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
                  <h3 class="card-title">Kategori</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="kategori-ekle" ><button style="float:right;" type="submit" class="btn btn-info">Yeni Kategori Ekle</button></a>  
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">

                    <thead>
                      <tr>
                        <th>Kategori Numara</th>
                        <th>Kategori Adı</th>
                        <th>Katıldığı Sırası</th>
                        <th>Kategori Durum</th>


                        <th>Sil</th>
                        <th>Düzenle</th>
                        <th>Yazılara Git</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                      $kategori=$baglanti->prepare("select * from kategori order by kategori_id asc");
                      $kategori->execute();

                      while  ($kategoricek = $kategori ->fetch(PDO::FETCH_ASSOC)){ ?>
                        <tr>
                          <td><?php echo $kategoricek['kategori_id'];?></td>
                          <td><?php echo $kategoricek['kategori_ad']; ?></td>
                          <td><?php echo $kategoricek['kategori_sira']; ?></td>
                          <td> <?php 
                          if  ($kategoricek['kategori_durum']=="1") {
                            echo "Aktif";
                          }elseif ($kategoricek['kategori_durum']=="0") {
                            echo "Pasif";
                          }?>
                          
                        </span></td>
                        
                        <td> <a href="islem/islem.php?kategorisil&id=<?php echo $kategoricek['kategori_id'] ?>">
                          
                          <button class="btn btn-danger">Sil</button>
                        </a>
                      </td>
                      <td><a href="kategori-duzenle?id=<?php echo $kategoricek['kategori_id'] ?>">
                        
                        <button class="btn btn-success" type="submit">Düzenle</button>

                      </a></td>
                      <td><a href="yazilar?katid=<?php echo $kategoricek['kategori_id'] ?>">  <button type="submit" class="btn btn-default">Git</button> </a></td>
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

