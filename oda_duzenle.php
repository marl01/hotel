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

	if(!empty($_POST['oda_numarasi']) && !empty($_POST['oda_tip']) && !empty($_POST['oda_kat']) && !empty($_POST['oda_id']) ){


    $oda_numarasi   = $_POST['oda_numarasi'];
		$oda_kat	      = intval($_POST['oda_kat']);
    $oda_tip        = intval($_POST['oda_tip']);
    $oda_id         = intval($_POST['oda_id']);




		$sonuc = $selotel->oda_duzenle($oda_id, $oda_numarasi, $oda_tip, $oda_kat );

		if($sonuc){


			$_SESSION['mesaj'] = "Oda düzenlendi!";

			// Yonlendir
			header("Location: oda_listele.php");


		} else {

			$mesaj = "Düzenleme başarısız";

		}



	}

}

if($_GET){

  if(!empty($_GET['id'])){

    $id    = intval($_GET['id']);
    $oda   = $selotel->oda_goster_tek($id);
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
          <h2>Odayı düzenle</h2>
          

          <form action="" method="post">

			     <?php if(!empty($mesaj)){?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div> <?php } ?>


            <div class="control-group form-group">
              <div class="controls">
                <label for="oda_fiyat">Oda numarası:</label>
                <input type="text" class="form-control" id="oda_numarasi" name="oda_numarasi" value="<?php print $oda['oda_numarasi'];?>" required>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">
                <label for="oda_tip">Oda tip:</label>
                <select class="form-control" id="oda_tip" name="oda_tip" value="<?php print $oda_fiyat['oda_tip'];?>">
                  <?php $oda_tipler = $selotel->oda_tipi_goster(); if($oda_tipler){ foreach ($oda_tipler as $oda_tip) { ?>

                  <option value="<?php print $oda_tip['id'];?>"><?php print $oda_tip['ad'];?></option>

            
                  <?php } } ?>
                    
                </select>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">
                <label for="oda_kat">Oda kat:</label>
                <input type="text" class="form-control" id="oda_kat" name="oda_kat" value="<?php print $oda['oda_kat'];?>" required>
              </div>
            </div>
            <input type="hidden" name="oda_id" value="<?php print $oda['id'];?>">
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary">Düzenle</button>

          </form>

        </div>
      </div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>