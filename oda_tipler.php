<?php

// Oturum baslat
session_start();

// Yonetici kontrol basla
if($_SESSION['tur'] != "1"){
  // Yonledir yetkisi yok
  header("Location: index.php");
}
// Yonetici kontrol bitti

$sayfa = "tipler";

include("inc/selotel.php");


if(!empty($_SESSION['mesaj'])){

	$mesaj = $_SESSION['mesaj'];

	unset($_SESSION['mesaj']);
}


$selotel = new selotel();


$oda_tipler = $selotel->oda_tipi_goster();


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
          <h2>Oda tiplerı <a href="oda_tip_ekle.php" class="btn btn-primary">Yeni</a></h2>
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

			  	if($oda_tipler){


			  		foreach ($oda_tipler as $oda_tip) { ?>

			  			
			    <tr>
			      <th scope="row"><?php print $oda_tip['id'];?></th>
			      <td><?php print $oda_tip['ad'];?></td>
			      <td><a href="oda_tip_duzenle.php?id=<?php print $oda_tip['id'];?>" class="btn btn-secondary">Düzenle</a></td>
			      <td><a href="oda_tip_sil.php?id=<?php print $oda_tip['id'];?>" onclick="return confirm('Silinsin mi?')"  class="btn btn-danger">Sil</a></td>


			    </tr>


			  		
			  	<?php }


			  	}?>


			  </tbody>
			</table>








        </div>
      </div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>