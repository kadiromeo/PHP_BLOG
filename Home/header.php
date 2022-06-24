<?php
session_start();
error_reporting(0);
require_once '../Admin/islem/baglanti.php';
require_once'function.php';
require_once '../Language/dil/tr.php';
require_once '../Language/dil/en.php';
if (!$_SESSION['dil']) {
 require("../Language/dil/tr.php");
}else{
    require("../Language/dil/".$_SESSION["dil"].".php");
}


$ayar=$baglanti->prepare("select * from ayarlar where id=?");
$ayar->execute(array(1));
$ayarcek = $ayar ->fetch(PDO::FETCH_ASSOC);

$hakkimizda=$baglanti->prepare("select * from hakkimizda where hakkimizda_id=?");
$hakkimizda->execute(array(1));
$hakkimizdacek = $hakkimizda ->fetch(PDO::FETCH_ASSOC);


$kullanici=$baglanti->prepare("select * from kullanici where kullanici_id=?");
$kullanici->execute(array(1));
$kullanicicek = $kullanici ->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="<?php echo $ayarcek['aciklama'] ?>" />
    <meta name="author" content="<?php echo $ayarcek['yazar'] ?>" />
    <meta name="keywords" content="<?php echo $ayarcek['anahtarkelime'] ?>" />
    <title><?php echo $ayarcek['baslik'] ?></title>
    <link href="../assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="../assets/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!----webfonts---->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic' rel='stylesheet' type='text/css'>
    <!----//webfonts---->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--end slider -->
    <!--script-->
    <script type="text/javascript" src="../js/move-top.js"></script>
    <script type="text/javascript" src="../js/easing.js"></script>
    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
            });
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
         <div class="col-lg-3">
            <input type="hidden" name="eskiresim">
            <div class="logo pb-sm-30 pb-xs-30">
                <a href="index">
                    <img width="200" src="../Admin/resimler/logo/<?php echo $ayarcek['logo'] ?>" style="border-radius: 100%;">
                </a>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../Language/dil.php?dil=tr"><?php echo $dil["trdil"] ?> </a></li>
                <li class="nav-item"> <a class="nav-link px-lg-3 py-3 py-lg-4" href="../Language/dil.php?dil=en"><?php echo $dil["endil"] ?></a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index"><?php echo $dil["t1"] ?></a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="hakkimizda"><?php echo $dil["t2"] ?></a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="iletisim"><?php echo $dil["t3"] ?></a></li>
            </ul>

        </div>
    </div>

</nav>

<!-- Page Header-->
<?php
$slider=$baglanti->prepare("SELECT * from slider where slider_durum=:slider_durum order by slider_id asc");
$slider->execute(array(
    'slider_durum'=>1
));while  ($slidercek = $slider ->fetch(PDO::FETCH_ASSOC)){ ?>

    <header class="masthead" style="background-image:url(../Admin/resimler/slider/<?php echo $slidercek['slider_resim'] ?>);" >

        <div class="container position-relative px-4 px-lg-5" >


            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1><?php echo $slidercek['slider_baslik'] ?></h1>
                        <span class="subheading"><?php echo $slidercek['slider_aciklama'] ?></span>
                    </div>
                </div>
            </div>

        </div>

        </header><?php  } ?>
