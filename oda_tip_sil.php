<?php

// Oturum baslat
session_start();

// Yonetici kontrol basla
if($_SESSION['tur'] != "1"){
  // Yonledir yetkisi yok
  header("Location: index.php");
}
// Yonetici kontrol bitti

include("inc/selotel.php");


$selotel = new selotel();


if($_GET){

	if(!empty($_GET['id'])){

		$id 	 =  intval($_GET['id']);
		$oda_tip =  intval($selotel->oda_tipi_sil($id));

		$_SESSION['mesaj'] = "Silindi";
		header("Location: oda_tipler.php");
	}

}





?>