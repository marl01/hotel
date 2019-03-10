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

$selotel = new selotel();



if($_POST){

	if(!empty($_POST['ad']) && !empty($_POST['mesaj']) && !empty($_POST['id'])){


		$ad	    = $_POST['ad'];
    $mesaj  = $_POST['mesaj'];

		$id     =  intval($_POST['id']);

		$sonuc = $selotel->oda_duyuru_duzenle($id, $ad, $mesaj);

		if($sonuc){


			$_SESSION['mesaj'] = "Oda duyuru düzenlendi!";

			// Yonlendir
			header("Location: oda_duyurular.php");


		} else {

			$mesaj = "Düzenleme başarısız";

		}



	}

}


if($_GET){

	if(!empty($_GET['id'])){

		$id 	        = intval($_GET['id']);
		$oda_duyuru   = $selotel->oda_duyuru_goster_tek($id);
	}

}


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
          <h2>Oda tipi düzenle</h2>
          

          <form action="" method="post">

			   <?php if(!empty($mesaj)){?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div> <?php } ?>

            <div class="control-group form-group">
              <div class="controls">
                <label for="ad">Ad:</label>
                <input type="text" class="form-control" id="ad" name="ad" value="<?php print $oda_duyuru['ad'];?>" required>
              </div>
              <div class="controls">
                <label for="mesaj">Mesaj:</label>
                <textarea class="form-control" id="mesaj" name="mesaj"  rows="3" required><?php print $oda_duyuru['mesaj'];?></textarea>
              </div>
            </div>
            <input type="hidden" name="id" value="<?php print $oda_duyuru['id'];?>">
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary">Düzenle</button>

          </form>

        </div>
      </div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>