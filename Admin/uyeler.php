<?php require_once 'header.php';

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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Üyeler</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div> 
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap" enctype="multipart/form-data">

                <thead>
                  <tr>
                    <th>Kullanıcı ID</th>
                    <th>Kullanıcı Adı</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                  $kullanici=$baglanti->prepare("SELECT * from kullanici order by kullanici_id asc");
                  $kullanici->execute();

                  while  ($kullanicicek = $kullanici ->fetch(PDO::FETCH_ASSOC)){ ?>
                    <tr>

                      <td><?php echo $kullanicicek['kullanici_id'];?></td>
                      <td><?php echo $kullanicicek['kullanici_ad']; ?></td>
                      <td> <a href="islem/islem.php?kullanicisil&id=<?php echo $kullanicicek['kullanici_id']; ?>">
                        
                        <button class="btn btn-danger">Sil</button>
                      </a>
                    </td>
                    <td> <a href="uye-duzenle.php?id=<?php echo $kullanicicek['kullanici_id']; ?>">
                      
                      <button class="btn btn-success">Düzenle</button>
                    </a>
                  </td>
                  
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

