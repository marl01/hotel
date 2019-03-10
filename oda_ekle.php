<?php

// Oturum baslat
session_start();

// Yonetici kontrol basla
if(!empty($_SESSION['id']) && !empty($_SESSION['tur']) != "1" ){
  // Yonledir yetkisi yok
  header("Location: index.php");
}
// Yonetici kontrol bitti

include("inc/selotel.php");

$selotel = new selotel();



if($_POST){

	if(!empty($_POST['oda_numarasi']) && !empty($_POST['oda_tip']) && !empty($_POST['oda_kat']) ){


    $oda_numarasi   = $_POST['oda_numarasi'];
		$oda_kat	      = intval($_POST['oda_kat']);
    $oda_tip        = intval($_POST['oda_tip']);




		$sonuc = $selotel->oda_ekle($oda_numarasi, $oda_tip, $oda_kat);

		if($sonuc){


			$_SESSION['mesaj'] = "Yeni oda eklendi!";

			// Yonlendir
			header("Location: oda_listele.php");


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
          <h2>Yeni oda ekle</h2>
          

          <form action="" method="post">

			     <?php if(!empty($mesaj)){?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div> <?php } ?>


            <div class="control-group form-group">
              <div class="controls">
                <label for="oda_fiyat">Oda numarası:</label>
                <input type="text" class="form-control" id="oda_numarasi" name="oda_numarasi" required>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">
                <label for="oda_tip">Oda tip:</label>
                <select class="form-control" id="oda_tip" name="oda_tip">
                  <?php $oda_tipler = $selotel->oda_tipi_goster(); if($oda_tipler){ foreach ($oda_tipler as $oda_tip) { ?>

                  <option value="<?php print $oda_tip['id'];?>"><?php print $oda_tip['ad'];?></option>

            
                  <?php } } ?>
                    
                </select>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">
                <label for="oda_kat">Oda kat:</label>
                <input type="text" class="form-control" id="oda_kat" name="oda_kat" required>
              </div>
            </div>

            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary">Ekle</button>

          </form>

        </div>
      </div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>