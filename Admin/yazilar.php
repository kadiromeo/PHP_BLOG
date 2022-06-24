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
                  <h3 class="card-title">yazilar</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="yazilar-ekle?katid=<?php echo @$_GET['katid'] ?>" ><button style="float:right;" type="submit" class="btn btn-info">Yeni yazilar Ekle</button></a>  
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">

                    <thead>
                      <tr>
                       <th>yazilar resim</th>
                       <th>yazilar başlık</th>
                       <th>yazilar durum</th>
                       <th>yazilar sıra</th>
                       <th>Sil</th>
                       <th>Düzenle</th>
                       <th></th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php 

                    $yazilar=$baglanti->prepare("SELECT * from yazilar where kategori_id=:kategori_id order by yazi_id asc");
                    $yazilar->execute(array(

                      'kategori_id'=>$_GET['katid']

                    ));

                    while  ($yazilarcek = $yazilar ->fetch(PDO::FETCH_ASSOC)){ ?>
                      <tr>
                        <td><img src="resimler/yazilar/<?php echo $yazilarcek['yazi_resim'] ?>" width='100'></td>
                        <td><?php echo $yazilarcek['yazi_baslik'];?></td>
                        <td><?php echo $yazilarcek['yazi_durum']; ?></td>
                        <td><?php echo $yazilarcek['yazi_sira']; ?></td>

                      </td>
                      <form action="islem/islem.php" method="post">
                        <td> 
                         <input type="hidden" name="id" value="<?PHP echo $yazilarcek['yazi_id'] ?>">
                         <input type="hidden" name="resim" value="<?PHP echo $yazilarcek['yazi_resim'] ?>">
                         <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">

                         <button name="yazilarsil" class="btn btn-danger">Sil</button>
                         
                       </td>

                       
                     </form>

                     <td><a href="yazilar-duzenle?id=<?php echo $yazilarcek['yazi_id'] ?>&katid=<?php echo $yazilarcek['kategori_id']  ?>">
                      
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

