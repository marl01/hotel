<?php

// Oturum baslat
session_start();


// Yonetici kontrol basla
if($_SESSION['tur'] != "1"){
  // Yonledir yetkisi yok
  header("Location: index.php");
}
// Yonetici kontrol bitti


$sayfa = "rezervasyon";


include("inc/selotel.php");

if(!empty($_SESSION['mesaj'])){

	$mesaj = $_SESSION['mesaj'];

	unset($_SESSION['mesaj']);
}


$selotel = new selotel();


$rezervasyonlar = $selotel->rezervasyon_goster();


?>

<?php include("inc/sablon/ust.php"); ?>

<!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Yönetim paneli</h1>
      <!-- Content Row -->
      <div class="row">
        <!-- Sidebar Column -->
        <?php include("inc/sablon/sol.php"); ?>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
          <h2>Oda rezervasyonları</h2>
          <?php if(!empty($mesaj)){?> <div class="alert alert-success" role="alert"><?php print $mesaj; ?></div> <?php } ?>
          <table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Müşteri</th>
			      <th scope="col">Numarası</th>
			      <th scope="col">Tip</th>
			      <th scope="col">Kat</th>
			      <th scope="col">Fiyat</th>
			      <th scope="col">Giriş</th>
			      <th scope="col">Çıkış</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php

			  	if($rezervasyonlar){


			  		foreach ($rezervasyonlar as $rezervasyon) {

			  		$oda = $selotel->oda_goster_tek($rezervasyon['oda']);
			  	?>
			  			
			    <tr>
			      <th scope="row"><?php print $rezervasyon['id'];?></th>
			      <td><?php $kullanici = $selotel->kullanici_goster($rezervasyon['kullanici']); print $kullanici['ad'] . " " . $kullanici['soyad'];?></td>
			      <td><?php print $oda['oda_numarasi'];?></td>
                  <td><?php $oda_tip = $selotel->oda_tipi_goster_tek($oda['oda_tip']); if($oda_tip) { print $oda_tip['ad']; }?></td>
                  <td><?php print $oda['oda_kat'];?></td>
                  <td><?php $oda_fiyat = $selotel->oda_fiyat_goster_tip($oda['oda_tip']); print $oda_fiyat['oda_fiyat']; ?> TL</td>

			      <td><?php print $rezervasyon['giris'];?></td>
			      <td><?php print $rezervasyon['cikis'];?></td>


			    </tr>


			  		
			  	<?php }


			  	}?>


			  </tbody>
			</table>








        </div>
      </div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>