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
                  <h3 class="card-title">abone</h3>

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
                  <table class="table table-hover text-nowrap">

                    <thead>
                      <tr>
                        <th>abone email</th>



                        <th>Sil</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                      $abone=$baglanti->prepare("SELECT * from abone");
                      $abone->execute();

                      while  ($abonecek = $abone ->fetch(PDO::FETCH_ASSOC)){ ?>
                        <tr>
                          <td><?php echo $abonecek['abone_email'];?></td>

                          
                          <td> <a href="islem/islem.php?abonesil&id=<?php echo $abonecek['abone_id'] ?>">
                            
                            <button class="btn btn-danger">Sil</button>
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

