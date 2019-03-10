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

	if(!empty($_POST['ad'])){


		$ad	= $_POST['ad'];


		$sonuc = $selotel->oda_tipi_ekle($ad);

		if($sonuc){


			$_SESSION['mesaj'] = "Yeni oda tipi eklendi!";

			// Yonlendir
			header("Location: oda_tipler.php");


		} else {

			$mesaj = "Ekleme başarısız";

		}



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
          <h2>Yeni oda tip ekle</h2>
          

          <form action="" method="post">

			<?php if(!empty($mesaj)){?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div> <?php } ?>

            <div class="control-group form-group">
              <div class="controls">
                <label for="ad">Ad:</label>
                <input type="text" class="form-control" id="ad" name="ad" required>
              </div>
            </div>

            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary">Ekle</button>

          </form>

        </div>
      </div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>