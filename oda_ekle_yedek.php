<?php

// Oturum baslat
session_start();


include("inc/selotel.php");

$selotel = new selotel();



if($_POST){

	if(!empty($_POST['oda_fiyat']) && !empty($_POST['oda_tip'])    ){


		$oda_fiyat	= $_POST['oda_fiyat'];
    $oda_tip    = $_POST['oda_tip'];


		$sonuc = $selotel->oda_fiyat_ekle($oda_tip, $oda_fiyat);

		if($sonuc){


			$_SESSION['mesaj'] = "Yeni oda fiyati eklendi!";

			// Yonlendir
			header("Location: oda_fiyatlar.php");


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
        <div class="col-lg-3 mb-4">
          <div class="list-group">
            <a href="oda_listele.php" class="list-group-item">Odalar</a>
            <a href="oda_tipler.php" class="list-group-item">Oda tipleri</a>
            <a href="oda_fiyatlar.php" class="list-group-item active">Oda fiyatları</a>
            </div>
        </div>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
          <h2>Yeni oda fiyat ekle</h2>
          

          <form action="" method="post">

			<?php if(!empty($mesaj)){?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div> <?php } ?>

            <div class="control-group form-group">
              <div class="controls">
                <label for="oda_tip">Oda tip:</label>
                <input type="text" class="form-control" id="oda_tip" name="oda_tip" required>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">
                <label for="oda_fiyat">Oda fiyat:</label>
                <input type="text" class="form-control" id="oda_fiyat" name="oda_fiyat" required>
              </div>
            </div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary">Ekle</button>

          </form>

        </div>
      </div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>