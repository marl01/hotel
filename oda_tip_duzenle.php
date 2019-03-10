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



if($_POST){

	if(!empty($_POST['ad']) && !empty($_POST['id'])){


		$ad	= $_POST['ad'];
		$id =  intval($_POST['id']);

		$sonuc = $selotel->oda_tipi_duzenle($id, $ad);

		if($sonuc){


			$_SESSION['mesaj'] = "Oda tipi düzenlendi!";

			// Yonlendir
			header("Location: oda_tipler.php");


		} else {

			$mesaj = "Düzenleme başarısız";

		}



	}

}


if($_GET){

	if(!empty($_GET['id'])){

		$id 	 = $_GET['id'];
		$oda_tip = $selotel->oda_tipi_goster_tek($id);
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
                <input type="text" class="form-control" id="ad" name="ad" value="<?php print $oda_tip['ad'];?>" required>
              </div>
            </div>
            <input type="hidden" name="id" value="<?php print $oda_tip['id'];?>">
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary">Düzenle</button>

          </form>

        </div>
      </div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>