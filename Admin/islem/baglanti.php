<?php 

try {
	$baglanti=new PDO("mysql:host=localhost; dbname=blog",'root','');
} catch (Exception $e) {
	$e->getmessage();
}

?>