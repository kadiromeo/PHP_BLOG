<?php
session_start();

require_once 'baglanti.php';

if (isset($_POST['ayarkaydet'])) {

    $duzenle=$baglanti->prepare("UPDATE  ayarlar SET 
        baslik=:baslik,
        aciklama=:aciklama,
        anahtarkelime=:anahtarkelime,
        yazar=:yazar

        WHERE id=1
        ");



    $update=$duzenle->execute(array(

        'baslik'=>$_POST['baslik'],
        'aciklama'=>$_POST['aciklama'],
        'anahtarkelime'=>$_POST['anahtarkelime'],
        'yazar'=>$_POST['yazar']
    ));

    if ($update) {

        header("Location:../ayarlar.php?yuklenme=basarili");
    } else{
        header("Location:../ayarlar.php?yuklenme=basarisiz");
    }


}

if (isset($_POST['iletisimkaydet'])) {

    $duzenle=$baglanti->prepare("UPDATE  ayarlar SET 
        mail=:mail


        WHERE id=1
        ");



    $update=$duzenle->execute(array(

        'mail'=>$_POST['mail']

    ));

    if ($update) {

        header("Location:../ayarlar.php?yuklenme=basarili");
    } else{
        header("Location:../ayarlar.php?yuklenme=basarisiz");
    }


}


if (isset($_POST['sosyalmedyakaydet'])) {

    $duzenle=$baglanti->prepare("UPDATE  ayarlar SET 
        twitter=:twitter,
        facebook=:facebook,
        github=:github,
        youtube=:youtube,
        instagram=:instagram

        WHERE id=1
        ");
    

    $update=$duzenle->execute(array(
        'twitter'=>$_POST['twitter'],
        'facebook'=>$_POST['facebook'],
        'github'=>$_POST['github'],
        'youtube'=>$_POST['youtube'],
        'instagram'=>$_POST['instagram']


    ));

    if ($update) {

        header("Location:../sosyalmedya.php?yuklenme=basarili");
    } else{
        header("Location:../sosyalmedya.php?yuklenme=basarisiz");
    }

}


if (isset($_POST['hakkimizdakaydet'])) {
    $duzenle=$baglanti->prepare("UPDATE hakkimizda SET 
        hakkimizda_baslik=:hakkimizda_baslik,
        hakkimizda_detay=:hakkimizda_detay

        where hakkimizda_id=1
        ");

    $update=$duzenle->execute(array(

        'hakkimizda_baslik'=>$_POST['baslik'],
        'hakkimizda_detay'=>$_POST['detay']

    ));
    if ($update) {
        header("Location:../hakkimizda?durum=basarili");

    } else{
        header("Location:../hakkimizda?durum=basarisiz");
    }
}


if (isset($_POST['girisyap'])) {

    $kadi=htmlspecialchars($_POST['kadi']);
    $sifre=htmlspecialchars($_POST['sifre']);
    $sifreguclu=md5($sifre);
    
    
    $kullanicisor=$baglanti->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:kullanici_ad and kullanici_sifre=:kullanici_sifre");

    
    $kullanicisor->execute(array(
        'kullanici_ad'=>$kadi,
        'kullanici_sifre'=>$sifreguclu


    ));

    $var=$kullanicisor->rowcount();

    if ($var >0) {
        $_SESSION['girisbelgesi']=$kadi;
        header("Location:../index?durum=Hoşgeldin");
    } else{
        header("Location:../login?durum=Hata");

    }

}

if (isset($_POST['uyeduzenle'])) {
    $kadi=htmlspecialchars($_POST['kadi']);
    $sifre=htmlspecialchars($_POST['sifre']);
    $sifreguclu=md5($sifre);

    $duzenle=$baglanti->prepare("UPDATE kullanici SET
        kullanici_ad=:kullanici_ad,
        kullanici_sifre=:kullanici_sifre
        ");
    $update=$duzenle->execute(array(
        'kullanici_ad'=>$kadi,
        'kullanici_sifre'=>$sifreguclu
    ));
    if ($update) {
        header("Location:../uyeler.php?durum=basarili");
    } else{
        header("Location:../uyeler.php?durum=basarisiz");

    }
}

if (isset($_POST['kategorikaydet'])) {
    $kategorikaydet=$baglanti->prepare("INSERT into  kategori SET 

        kategori_ad=:kategori_ad,
        kategori_sira=:kategori_sira,
        kategori_durum=:kategori_durum
        

        ");
    

    $insert=$kategorikaydet->execute(array(

        'kategori_ad'=>$_POST['kadi'],
        'kategori_sira'=>$_POST['sira'],
        'kategori_durum'=>$_POST['kategoridurum']
        


    ));

    if ($insert) {

        header("Location:../kategori?yuklenme=basarili");
    } else{
        header("Location:../kategori?yuklenme=basarisiz");
    }
}


if (isset($_POST['kategoriduzenle'])) {

    $kat=$_POST['katid'];
    $duzenle=$baglanti->prepare("UPDATE  kategori SET 

        kategori_ad=:kategori_ad,
        kategori_sira=:kategori_sira,
        kategori_durum=:kategori_durum


        WHERE  kategori_id=$kat
        ");
    

    $update=$duzenle->execute(array(

        'kategori_ad'=>$_POST['kadi'],
        'kategori_sira'=>$_POST['sira'],
        'kategori_durum'=>$_POST['kategoridurum']
        



    ));

    if ($update) {

        header("Location:../kategori.php?yuklenme=basarili");
    } else{
        header("Location:../kategori.php?yuklenme=basarisiz");
    }
}


if (isset($_GET['kategorisil'])) {
    $kategorisil=$baglanti->prepare("DELETE from kategori WHERE kategori_id=:kategori_id");
    $kategorisil->execute(array(
        'kategori_id'=>$_GET['id']


    ));
    
    if ($kategorisil) {
        header ("Location:../kategori?durum=basarili");
    } else{
        header ("Location:../kategori?durum=hata");

    }   
}


if (isset($_POST['logokaydet'])) {


    $uploads_dir='../resimler/logo';
    @$tmp_name=$_FILES['logo'] ["tmp_name"];
    @$name=$_FILES['logo'] ["name"];

    $sayi=rand(1,1000000);
    $sayi2=rand(1,1000000);
    $sayi3=rand(10000, 2000000);

    $sayilar=$sayi.$sayi2.$sayi3;
    $resimyolu=$sayilar.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $duzenle=$baglanti->prepare("UPDATE  ayarlar SET 
        logo=:logo
        

        WHERE id=1
        ");
    

    $update=$duzenle->execute(array(

        'logo'=>$resimyolu
        

    ));

    if ($update) {
        $resimsil=$_POST['eskilogo'];
        unlink("../resimler/logo/$resimsil");
        
        header("Location:../ayarlar.php?yuklenme=basarili");
    } else{
        header("Location:../ayarlar.php?yuklenme=basarisiz");
    }



}

if (isset($_POST['sliderkaydet'])) {


    $uploads_dir='../resimler/slider';
    @$tmp_name=$_FILES['slideresim'] ["tmp_name"];
    @$name=$_FILES['slideresim'] ["name"];

    $sayi=rand(1,1000000);
    $sayi2=rand(1,1000000);
    $sayi3=rand(10000, 2000000);

    $sayilar=$sayi.$sayi2.$sayi3;
    $resimyolu=$sayilar.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $sliderkaydet=$baglanti->prepare("INSERT into  slider SET 



        slider_baslik=:slider_baslik,

        slider_aciklama=:slider_aciklama,

        slider_sira=:slider_sira,

        slider_durum=:slider_durum,

        slider_resim=:slider_resim
        
        

        ");
    

    $insert=$sliderkaydet->execute(array(

        'slider_baslik'=>$_POST['sliderbaslik'],
        'slider_aciklama'=>$_POST['slideraciklama'],
        'slider_sira'=>$_POST['slidersira'],
        'slider_durum'=>$_POST['sliderdurum'],
        'slider_resim'=>$resimyolu


    ));

    if ($insert) {


        header("Location:../slider?yuklenme=basarili");
    } else{
        header("Location:../slider?yuklenme=basarisiz");
    }
}


if (isset($_POST['sliderduzenle'])) {

    $slideid=$_POST['id'];

    if ($_FILES['slideresim'] ['size']>0) {

        $uploads_dir='../resimler/slider';
        @$tmp_name=$_FILES['slideresim'] ["tmp_name"];
        @$name=$_FILES['slideresim'] ["name"];

        $sayi=rand(1,1000000);
        $sayi2=rand(1,1000000);
        $sayi3=rand(10000, 2000000);

        $sayilar=$sayi.$sayi2.$sayi3;
        $resimyolu=$sayilar.$name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
        

        $duzenle=$baglanti->prepare("UPDATE  slider SET 

            slider_baslik=:slider_baslik,

            slider_aciklama=:slider_aciklama,

            slider_sira=:slider_sira,

            slider_durum=:slider_durum,

            slider_resim=:slider_resim


            WHERE  slider_id=$slideid
            ");
        

        $update=$duzenle->execute(array(

            'slider_baslik'=>$_POST['sliderbaslik'],
            'slider_aciklama'=>$_POST['slideraciklama'],
            'slider_sira'=>$_POST['slidersira'],
            'slider_durum'=>$_POST['sliderdurum'],
            'slider_resim'=>$resimyolu


        ));

        if ($update) {
            $resimsil=$_POST['eskiresim'];
            unlink("../resimler/slider/$resimsil");
            header("Location:../slider?yuklenme=basarili");
        } else{
            header("Location:../slider?yuklenme=basarisiz");
        }
        
    } else{


        $duzenle=$baglanti->prepare("UPDATE  slider SET 

            slider_baslik=:slider_baslik,

            slider_aciklama=:slider_aciklama,

            slider_sira=:slider_sira,

            slider_durum=:slider_durum



            WHERE  slider_id=$slideid
            ");
        

        $update=$duzenle->execute(array(

            'slider_baslik'=>$_POST['sliderbaslik'],

            'slider_aciklama'=>$_POST['slideraciklama'],

            'slider_sira'=>$_POST['slidersira'],

            'slider_durum'=>$_POST['sliderdurum']

        ));

        if ($update) {

            header("Location:../slider?yuklenme=basarili");
        } else{
            header("Location:../slider?yuklenme=basarisiz");
        }
    }
}


if (isset($_POST['slidersil'])) {
    $slidersil=$baglanti->prepare("DELETE from slider WHERE slider_id=:slider_id");
    $slidersil->execute(array(
        'slider_id'=>$_POST['id']


    ));
    
    if ($slidersil) {
        $resimsil=$_POST['resim'];
        unlink("../resimler/slider/$resimsil");
        header ("Location:../slider?durum=basarili");
    } else{
        header ("Location:../slider?durum=hata");

    }   
}



if (isset($_POST['yazilarkaydet'])) {

    $yonlendir=$_POST['katsid'];

    $uploads_dir='../resimler/yazilar';
    @$tmp_name=$_FILES['yazilaresim'] ["tmp_name"];
    @$name=$_FILES['yazilaresim'] ["name"];

    $sayi=rand(1,1000000);
    $sayi2=rand(1,1000000);
    $sayi3=rand(10000, 2000000);

    $sayilar=$sayi.$sayi2.$sayi3;
    $resimyolu=$sayilar.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $yazilarkaydet=$baglanti->prepare("INSERT into  yazilar SET 



        kategori_id=:kategori_id,
        yazi_baslik=:yazi_baslik,
        yazi_aciklama=:yazi_aciklama,
        yazi_sira=:yazi_sira,
        yazi_etiket=:yazi_etiket,
        yazi_durum=:yazi_durum,
        yazi_resim=:yazi_resim,
        yazi_zaman=:yazi_zaman

        

        ");
    

    $insert=$yazilarkaydet->execute(array(

        'kategori_id'=>$_POST['yazikategori'],
        'yazi_baslik'=>$_POST['yazilarbaslik'],
        'yazi_aciklama'=>$_POST['yazilaraciklama'],
        'yazi_sira'=>$_POST['yazilarsira'],
        'yazi_etiket'=>$_POST['yazilaranahtar'],
        'yazi_durum'=>$_POST['yazilardurum'],
        'yazi_resim'=>$resimyolu,
        'yazi_zaman'=>$_POST['yazilarzaman']


    ));

    if ($insert) {


        header("Location:../yazilar?katid=$yonlendir?yuklenme=basarili");
    } else{
        header("Location:../yazilar?katid=$yonlendir?yuklenme=basarisiz");
    }
}







if (isset($_POST['yaziduzenle'])) {
    $yonlendir=$_POST['katsid'];

    $yaziid=$_POST['id'];

    if ($_FILES['yazilaresim'] ['size']>0) {

        $uploads_dir='../resimler/yazilar';
        @$tmp_name=$_FILES['yazilaresim'] ["tmp_name"];
        @$name=$_FILES['yazilaresim'] ["name"];

        $sayi=rand(1,1000000);
        $sayi2=rand(1,1000000);
        $sayi3=rand(10000, 2000000);

        $sayilar=$sayi.$sayi2.$sayi3;
        $resimyolu=$sayilar.$name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
        

        $duzenle=$baglanti->prepare("UPDATE  yazilar SET 


            kategori_id=:kategori_id,
            yazi_baslik=:yazi_baslik,
            yazi_aciklama=:yazi_aciklama,
            yazi_sira=:yazi_sira,
            yazi_etiket=:yazi_etiket,
            yazi_durum=:yazi_durum,
            yazi_resim=:yazi_resim,
            yazi_zaman=:yazi_zaman




            WHERE  yazi_id=$yaziid
            ");
        

        $update=$duzenle->execute(array(

            'kategori_id'=>$_POST['yazikategori'],
            'yazi_baslik'=>$_POST['yazilarbaslik'],
            'yazi_aciklama'=>$_POST['yazilaraciklama'],
            'yazi_sira'=>$_POST['yazilarsira'],
            'yazi_etiket'=>$_POST['yazilaranahtar'],
            'yazi_durum'=>$_POST['yazilardurum'],
            'yazi_resim'=>$resimyolu,
            'yazi_zaman'=>$_POST['yazilarzaman']


        ));

        if ($update) {
            $resimsil=$_POST['eskiresim'];
            unlink("../resimler/yazilar/$resimsil");
            header("Location:../yazilar?katid=$yonlendir?yuklenme=basarili");
        } else{
            header("Location:../yazilar?katid=$yonlendir?yuklenme=basarisiz");
        }
        
    } else{


        $duzenle=$baglanti->prepare("UPDATE  yazilar SET 

            kategori_id=:kategori_id,
            yazi_baslik=:yazi_baslik,
            yazi_aciklama=:yazi_aciklama,
            yazi_sira=:yazi_sira,
            yazi_etiket=:yazi_etiket,
            yazi_durum=:yazi_durum,
            yazi_zaman=:yazi_zaman


            


            WHERE  yazi_id=$yaziid
            ");
        

        $update=$duzenle->execute(array(


            'kategori_id'=>$_POST['yazikategori'],
            'yazi_baslik'=>$_POST['yazilarbaslik'],
            'yazi_aciklama'=>$_POST['yazilaraciklama'],
            'yazi_sira'=>$_POST['yazilarsira'],
            'yazi_etiket'=>$_POST['yazilaranahtar'],
            'yazi_durum'=>$_POST['yazilardurum'],
            'yazi_zaman'=>$_POST['yazilarzaman']



        ));

        if ($update) {

            header("Location:../yazilar?katid=$yonlendir?yuklenme=basarili");
        } else{
            header("Location:../yazilar?katid=$yonlendir?yuklenme=basarisiz");
        }
    }
}






if (isset($_POST['yazilarsil'])) {
    $yonlendir=$_POST['katsid'];
    $yazilarsil=$baglanti->prepare("DELETE from yazilar WHERE yazi_id=:yazi_id");
    $yazilarsil->execute(array(
        'yazi_id'=>$_POST['id']


    ));
    
    if ($yazilarsil) {
        $resimsil=$_POST['resim'];
        unlink("../resimler/yazilar/$resimsil");
        header("Location:../yazilar?katid=$yonlendir?yuklenme=basarili");
    } else{
        header("Location:../yazilar?katid=$yonlendir?yuklenme=basarisiz");

    }   
}


if (isset($_POST['yorumyap'])) {
    $gelenurl=$_SERVER['HTTP_REFERER'];
    $guvenliyorum=htmlspecialchars($_POST['yorum']);

    $yorumkaydet=$baglanti->prepare("INSERT into yorumlar SET 
        yorum_detay=:yorum_detay,
        yazi_id=:yazi_id,
        kullanici_ad=:kullanici_ad,
        yorum_onay=:yorum_onay

        ");

    $insert=$yorumkaydet->execute(array(

        'yorum_detay'=>$guvenliyorum,
        'yazi_id'=>$_POST['yaziid'],
        'kullanici_ad'=>$_POST['ad'],
        'yorum_onay'=>0
    ));
    if ($insert) {

        header("Location:$gelenurl?yuklenme=basarili");

    } 
    else

    {
        header("Location:$gelenurl?yuklenme=basarili");

    }
}


if (isset($_GET['yorumlarsil'])) {
    $yorumlarsil=$baglanti->prepare("DELETE from yorumlar WHERE yorum_id=:yorum_id");
    $yorumlarsil->execute(array(
        'yorum_id'=>$_GET['id']

    ));
    
    if ($yorumlarsil) {
        header ("Location:../yorumlar?durum=basarili");
    } else{
        header ("Location:../yorumlar?durum=hata");

    }   
}




if (isset($_POST['yorumonayla'])) {
    $yorumid=$_POST['yorumid'];
    $duzenle=$baglanti->prepare("UPDATE  yorumlar SET 
        yorum_onay=:yorum_onay
        

        WHERE yorum_id=$yorumid
        ");

    $update=$duzenle->execute(array(

        'yorum_onay'=>1

    ));

    if ($update) {

        header("Location:../yorumlar.php?yuklenme=basarili");
    } else{
        header("Location:../yorumlar.php?yuklenme=basarisiz");
    }

}



if (isset($_GET['abonesil'])) {
    $abonesil=$baglanti->prepare("DELETE from abone WHERE abone_id=:abone_id");
    $abonesil->execute(array(
        'abone_id'=>$_GET['id']


    ));
    
    if ($abonesil) {
        header ("Location:../abone?durum=basarili");
    } else{
        header ("Location:../abone?durum=hata");

    }   
}


?>