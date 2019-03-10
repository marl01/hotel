<?php

require("ayarlar.php");

/**
* Veri tabani
*/
class Veritabani
{
	private $vt;

	function __construct()
	{
		$this->hemen_baglan();
	}

	public function hemen_baglan(){

		$kullanici 	= $GLOBALS['veritabani_kullanici'];
		$sifre		= $GLOBALS['veritabani_sifre'];
		$adres		= $GLOBALS['veritabani_adres'];
		$ad 		= $GLOBALS['veritabani_adi'];


		$this->vt = new mysqli ($adres, $kullanici, $sifre, $ad);

	}

	public function sorgula($sorgu){

		$sonuc = $this->vt->query($sorgu);

		if($sonuc){
			return $sonuc->fetch_assoc();
		} else {
			return false;
		}

	}

	public function sorgula_fazla($sorgu){

		$sonuc = $this->vt->query($sorgu);

		if($sonuc->num_rows > 0){
			while($bir = $sonuc->fetch_array())
			{
				$sonuclar[] = $bir;
			}
			return $sonuclar;

		} else {
			return false;
		}

	}

	public function sorgula_basit($sorgu){
		$sonuc = $this->vt->query($sorgu);

		if($sonuc){
			return true;
		} else {
			return false;
		}

	}



}