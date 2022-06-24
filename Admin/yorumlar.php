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
                  <h3 class="card-title">yorumlar</h3>

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
                        <th>yorum zaman</th>
                        <th>yorum detay</th>
                        <th>yazi id</th>
                        <th>kullanici ad</th>
                        <th>Sil</th>
                        <th>Onayla</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                      $yorumlar=$baglanti->prepare("SELECT * from yorumlar order by yorum_id asc");
                      $yorumlar->execute();

                      while  ($yorumlarcek = $yorumlar ->fetch(PDO::FETCH_ASSOC)){ ?>
                        <tr>
                          <td><?php echo $yorumlarcek['yorum_zaman'];?></td>
                          <td><?php echo $yorumlarcek['yorum_detay']; ?></td>
                          <td><?php echo $yorumlarcek['yazi_id']; ?></td>
                          <td><?php echo $yorumlarcek['kullanici_ad']; ?></td>

                          <td> <a href="islem/islem.php?yorumlarsil&id=<?php echo $yorumlarcek['yorum_id'] ?>">
                            
                            <button class="btn btn-danger">Sil</button>
                          </a>
                        </td>




                        <td>  
                          <form action="islem/islem.php" method="post">
                            <input type="hidden" name="yorumid" value="<?php echo $yorumlarcek['yorum_id'] ?>">
                            <button <?php

                            if ($yorumlarcek['yorum_onay']==1) {
                              echo 'disabled';
                            }



                          ?> class="btn btn-success" type="submit" name="yorumonayla">Onayla</button> 

                        </form>


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

