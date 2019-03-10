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

	if(!empty($_POST['oda_fiyat']) && !empty($_POST['oda_tip'] && !empty($_POST['id']))    ){


		$oda_fiyat	  = intval($_POST['oda_fiyat']);
    $oda_tip      = intval($_POST['oda_tip']);
    $oda_fiyat_id = intval($_POST['id']);


		$sonuc = $selotel->oda_fiyat_duzenle($oda_fiyat_id, $oda_tip, $oda_fiyat);

		if($sonuc){


			$_SESSION['mesaj'] = "Oda fiyati düzenlendi!";

			// Yonlendir
			header("Location: oda_fiyatlar.php");


		} else {

			$mesaj = "Düzenleme başarısız";

		}



	}

}


if($_GET){

  if(!empty($_GET['id'])){

    $id         = intval($_GET['id']);
    $oda_fiyat  = $selotel->oda_fiyat_goster_tek($id);
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
          <h2>Yeni oda fiyat ekle</h2>
          

          <form action="" method="post">

			<?php if(!empty($mesaj)){?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div> <?php } ?>

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
                <label for="oda_fiyat">Oda fiyat:</label>
                <input type="text" class="form-control" id="oda_fiyat" name="oda_fiyat" value="<?php print $oda_fiyat['oda_fiyat'];?>" required>
              </div>
            </div>
            <input type="hidden" name="id" value="<?php print $oda_fiyat['id'];?>">
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary">Düzenle</button>

          </form>

        </div>
      </div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>