<?php

// Oturum baslat
session_start();

// Yonetici kontrol basla
if($_SESSION['tur'] != "1"){
  // Yonledir yetkisi yok
  header("Location: index.php");
}
// Yonetici kontrol bitti


$sayfa = "fiyatlar";

include("inc/selotel.php");


if(!empty($_SESSION['mesaj'])){

	$mesaj = $_SESSION['mesaj'];

	unset($_SESSION['mesaj']);
}


$selotel = new selotel();


$oda_fiyatlar = $selotel->oda_fiyat_goster();


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
          <h2>Oda fiyatları <a href="oda_fiyat_ekle.php" class="btn btn-primary">Yeni</a></h2>
          <?php if(!empty($mesaj)){?> <div class="alert alert-success" role="alert"><?php print $mesaj; ?></div> <?php } ?>
          <table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Tip</th>
			      <th scope="col">Fiyat</th>
			      <th scope="col">Düzenle</th>
			      <th scope="col">Sil</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php

			  	if($oda_fiyatlar){


			  		foreach ($oda_fiyatlar as $oda_fiyat) { ?>

			  			
			    <tr>
			      <th scope="row"><?php print $oda_fiyat['id'];?></th>
			      <td><?php $oda_tip = $selotel->oda_tipi_goster_tek($oda_fiyat['oda_tip']); if($oda_tip) { print $oda_tip['ad']; }?></td>
			      <td><?php print $oda_fiyat['oda_fiyat'];?></td>
			      <td><a href="oda_fiyat_duzenle.php?id=<?php print $oda_fiyat['id'];?>" class="btn btn-secondary">Düzenle</a></td>
			      <td><a href="oda_fiyat_sil.php?id=<?php print $oda_fiyat['id'];?>" onclick="return confirm('Silinsin mi?')"  class="btn btn-danger">Sil</a></td>


			    </tr>


			  		
			  	<?php }


			  	}?>


			  </tbody>
			</table>








        </div>
      </div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>