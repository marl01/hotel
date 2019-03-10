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

	if(!empty($_POST['eposta']) && !empty($_POST['sifre'])){


		$eposta = $_POST['eposta'];
		$sifre	= $_POST['sifre'];


		$sonuc = $selotel->giris($eposta, $sifre);

		if($sonuc){


			$mesaj = "Giriş başarılı";

			$_SESSION['id'] 	= $sonuc['id'];
			$_SESSION['ad'] 	= $sonuc['ad'];
			$_SESSION['soyad'] 	= $sonuc['soyad'];
			$_SESSION['tur']	= $sonuc['tur'];

			// Yonlendir
			header("Location: index.php");


		} else {

			$mesaj = "Giriş başarısız";

		}



	}




}




?>

<?php include("inc/sablon/ust.php"); ?>

<h1 class="mt-4 mb-3">Giriş yap</h1>


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

            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Giriş yap</button>

          </form>
        </div>

</div>
      <!-- /.row -->

<?php include("inc/sablon/alt.php"); ?>