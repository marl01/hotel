<?php

// Oturum baslat
session_start();

// Yonetici kontrol basla
if($_SESSION['tur'] != "1"){
  // Yonledir yetkisi yok
  header("Location: index.php");
}
// Yonetici kontrol bitti

$sayfa = "duyuru";

include("inc/selotel.php");


if(!empty($_SESSION['mesaj'])){

	$mesaj = $_SESSION['mesaj'];

	unset($_SESSION['mesaj']);
}


$selotel = new selotel();


$oda_duyurular = $selotel->oda_duyurular_goster();


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
          <h2>Oda duyuruları <a href="oda_duyuru_ekle.php" class="btn btn-primary">Yeni</a></h2>
          <?php if(!empty($mesaj)){?> <div class="alert alert-success" role="alert"><?php print $mesaj; ?></div> <?php } ?>
          <table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Ad</th>
			      <th scope="col">Düzenle</th>
			      <th scope="col">Sil</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php

			  	if($oda_duyurular){


			  		foreach ($oda_duyurular as $oda_duyuru) { ?>

			  			
			    <tr>
			      <th scope="row"><?php print $oda_duyuru['id'];?></th>
			      <td><?php print $oda_duyuru['ad'];?></td>
			      <td><a href="oda_duyuru_duzenle.php?id=<?php print $oda_duyuru['id'];?>" class="btn btn-secondary">Düzenle</a></td>
			      <td><a href="oda_duyuru_sil.php?id=<?php print $oda_duyuru['id'];?>" onclick="return confirm('Silinsin mi?')"  class="btn btn-danger">Sil</a></td>


			    </tr>


			  		
			  	<?php }


			  	}?>


			  </tbody>
			</table>








        </div>
      </div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>