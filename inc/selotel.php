<?php

require("veritabani.php");

/**
* Selotel
*/
class Selotel
{
	private $vt;

	function __construct()
	{
		$this->vt = new veritabani();
	}

	public function kayit($eposta, $sifre, $ad, $soyad){

		$sorgu = "INSERT INTO `kullanicilar` (`eposta`, `sifre`, `ad`, `soyad`) VALUES ('" . $eposta . "', '" . $sifre . "', '" . $ad . "', '" . $soyad. "')";

		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}



	}

	public function giris($eposta, $sifre){
		$sorgu = "SELECT * FROM `kullanicilar` WHERE `eposta` = '" . $eposta . "' AND `sifre` = '" . $sifre . "'";

		$sonuc = $this->vt->sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}
	public function kullanici_goster($id){
		$sorgu = "SELECT * FROM `kullanicilar` WHERE `id` = '" . $id . "';";

		$sonuc = $this->vt->sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}
	/* Odalar */
	public function oda_goster(){
		$sorgu = "SELECT * FROM `oda`";
		
		$sonuc = $this->vt->sorgula_fazla($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function oda_goster_tek($oda_id){
		$sorgu = "SELECT * FROM `oda` WHERE `id` = ".$oda_id;
		
		$sonuc = $this->vt->sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function oda_ekle($oda_numarasi, $oda_tip, $oda_kat){

		$sorgu = "INSERT INTO `oda` (`oda_numarasi`, `oda_tip`, `oda_kat`) VALUES ('".$oda_numarasi."', '".$oda_tip."', '".$oda_kat."');";

		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function oda_duzenle($oda_id, $oda_numarasi, $oda_tip, $oda_kat ){
		
		$sorgu = "UPDATE `oda` SET `oda_numarasi` = '".$oda_numarasi."', `oda_tip` = '".$oda_tip."', `oda_kat` = '".$oda_kat."' WHERE `oda`.`id` = ".$oda_id. ";";
		
		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function oda_sil($oda_id){
		$sorgu = "DELETE FROM `oda` WHERE `oda`.`id` = ".$oda_id;
		
		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}


	/* Oda tipleri */

	public function oda_tipi_goster(){

		$sorgu = "SELECT * FROM `oda_tipleri`";
		
		$sonuc = $this->vt->sorgula_fazla($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function oda_tipi_goster_tek($oda_tip_id){
		$sorgu = "SELECT * FROM `oda_tipleri` WHERE `id` = ".$oda_tip_id;
		
		$sonuc = $this->vt->sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function oda_tipi_ekle($oda_tip_ad){
		$sorgu = "INSERT INTO `oda_tipleri` (`ad`) VALUES ('".$oda_tip_ad."');";
		
		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function oda_tipi_duzenle($oda_tip_id, $oda_tip_ad){
		$sorgu = "UPDATE `oda_tipleri` SET `ad` = '".$oda_tip_ad."' WHERE `oda_tipleri`.`id` = ".$oda_tip_id;
		
		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function oda_tipi_sil($oda_tip_id){

		$sorgu = "DELETE FROM `oda_tipleri` WHERE `oda_tipleri`.`id` = ".$oda_tip_id;
		
		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}


	/* Fiyatlar */

	public function oda_fiyat_goster(){
		$sorgu = "SELECT * FROM `oda_fiyat`";
		
		$sonuc = $this->vt->sorgula_fazla($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}
	public function oda_fiyat_goster_tek($oda_fiyat_id){

		$sorgu = "SELECT * FROM `oda_fiyat` WHERE `id` = ". $oda_fiyat_id;
		
		$sonuc = $this->vt->sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function oda_fiyat_goster_tip($oda_fiyat_tip){

		$sorgu = "SELECT * FROM `oda_fiyat` WHERE `oda_tip` = ". $oda_fiyat_tip;
		
		$sonuc = $this->vt->sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function oda_fiyat_ekle($oda_tip, $oda_fiyat){
		$sorgu = "INSERT INTO `oda_fiyat` ( `oda_tip`, `oda_fiyat`) VALUES ('".$oda_tip."', '".$oda_fiyat."');";
		
		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function oda_fiyat_duzenle($oda_fiyat_id, $oda_tip, $oda_fiyat){
		$sorgu = "UPDATE `oda_fiyat` SET `oda_tip` = '".$oda_tip."', `oda_fiyat` = '".$oda_fiyat."' WHERE `oda_fiyat`.`id` = ".$oda_fiyat_id;
		
		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function oda_fiyat_sil($oda_fiyat_id){

		$sorgu = "DELETE FROM `oda_fiyat` WHERE `oda_fiyat`.`id` = ".$oda_fiyat_id;
		
		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	/* Oda duyurular */

	public function oda_duyurular_goster(){

		$sorgu = "SELECT * FROM `oda_duyuru`";
		
		$sonuc = $this->vt->sorgula_fazla($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function oda_duyuru_goster_tek($oda_duyuru_id){
		$sorgu = "SELECT * FROM `oda_duyuru` WHERE `id` = ".$oda_duyuru_id;
		
		$sonuc = $this->vt->sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function oda_duyuru_ekle($oda_duyuru_ad, $oda_duyuru_mesaj){
		$sorgu = "INSERT INTO `oda_duyuru` (`ad`, `mesaj`) VALUES ('".$oda_duyuru_ad."', '".$oda_duyuru_mesaj."');";
		
		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function oda_duyuru_duzenle($oda_duyuru_id, $oda_duyuru_ad, $oda_duyuru_mesaj){
		$sorgu = "UPDATE `oda_duyuru` SET `ad` = '".$oda_duyuru_ad."', `mesaj` = '".$oda_duyuru_mesaj."' WHERE `oda_duyuru`.`id` = ".$oda_duyuru_id;
		
		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function oda_duyuru_sil($oda_duyuru_id){

		$sorgu = "DELETE FROM `oda_duyuru` WHERE `oda_duyuru`.`id` = ".$oda_duyuru_id;
		
		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	/* Rezervasyon sistemi */
	// Her oda rezervesi giris tarih ile cakismasin
	public function rezervasyon_oda_kontrol($oda, $giris_tarih, $cikis_tarih){

		$sorgu = "SELECT * FROM `rezerve` WHERE `oda` = '" . $oda . "' AND  ((giris between '" . $giris_tarih. "' AND '" . $cikis_tarih. "') OR (cikis  between '" . $giris_tarih. "' AND '" . $cikis_tarih. "'));";
		
		$sonuc = $this->vt->sorgula($sorgu);

		if($sonuc){
			return false;
		} else {
			return true;
		}

	}

	public function rezervasyon_ekle($oda, $kullanici, $giris, $cikis){
		$sorgu = "INSERT INTO `rezerve` (`oda`, `kullanici`, `giris`, `cikis`) VALUES ('" .  $oda   . "', '" .  $kullanici   . "', '" .  $giris   . "', '" .  $cikis  . "');";
		
		$sonuc = $this->vt->sorgula_basit($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function rezervasyon_goster(){
		$sorgu = "SELECT * FROM `rezerve`";
		
		$sonuc = $this->vt->sorgula_fazla($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}


	public function rezervasyon_goster_tek($rezerve_id){
		$sorgu = "SELECT * FROM `rezerve` WHERE `id` = ".$oda_id;
		
		$sonuc = $this->vt->sorgula($sorgu);

		if($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}


}
