<?php

// Oturum baslat
session_start();


if(!empty($_SESSION['id'])){
	// Yonlendir zaten giris yapti
	header("Location: index.php");
}

include("inc/selotel.php");

$selotel = new selotel();

if($_POST){

	if(!empty($_POST['eposta']) && !empty($_POST['sifre']) && !empty($_POST['ad']) && !empty($_POST['soyad'])    ){


		$eposta = $_POST['eposta'];
		$sifre	= $_POST['sifre'];
		$ad 	= $_POST['ad'];
		$soyad 	= $_POST['soyad'];


		$sonuc = $selotel->kayit($eposta, $sifre, $ad, $soyad);

		if($sonuc){


			$mesaj = "Kayit başarılı";

			// Giris yap
			$sonuc = $selotel->giris($eposta, $sifre);

			$_SESSION['id'] 	= $sonuc['id'];
			$_SESSION['ad'] 	= $sonuc['ad'];
			$_SESSION['soyad'] 	= $sonuc['soyad'];
			$_SESSION['tur']	= $sonuc['tur'];

			// Yonlendir
			header("Location: index.php");


		} else {

			$mesaj = "Kayıt başarısız";

		}



	}




}




?>

<?php include("inc/sablon/ust.php"); ?>

<h1 class="mt-4 mb-3">Kayıt ol</h1>


<div class="row">
        <div class="col-lg-4 mb-4">
          <form action="" method="post">

			<?php if(!empty($mesaj)){?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div> <?php } ?>

            <div class="control-group form-group">
              <div class="controls">
                <label for="eposta">Eposta:</label>
                <input type="email" class="form-control" id="eposta" name="eposta" required>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">
                <label for="sifre">Şifre:</label>
                <input type="password" class="form-control" id="sifre" name="sifre" required>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">
                <label for="ad">Ad:</label>
                <input type="text" class="form-control" id="ad" name="ad" required>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">
                <label for="soyad">Soyad:</label>
                <input type="text" class="form-control" id="soyad" name="soyad" required>
              </div>
            </div>

            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Kayıt ol</button>

          </form>
        </div>

</div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>