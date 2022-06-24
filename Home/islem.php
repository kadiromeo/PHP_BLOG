<?php 
require_once '../Admin/islem/baglanti.php';

if (isset($_POST['aboneol'])) {
	$guvenlimail=htmlspecialchars($_POST['abone']);
	$abonekaydet=$baglanti->prepare("INSERT into abone SET 

		abone_email=:abone_email

		");
	$insert=$abonekaydet->execute(array(
		'abone_email'=>$guvenlimail

	));
	if ($insert) {
		header("Location:index?yuklenme=basarili");

	}
	else{
		header("Location:index?yuklenme=basarisiz");

	}
}



?>