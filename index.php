<?php

// Oturum baslat
session_start();


include("inc/selotel.php");

$selotel = new selotel();

// Giris
$giris = "";

// Cikis
$cikis = "";

// Hata mesaji
$mesaj = "";


if($_POST){

  $islem = "";


  if(!empty($_POST['islem'])){
    $islem = $_POST['islem'];
  } else {
    $mesaj = "Yapilacak islem yok";
  }

  if(!empty($_POST['giris']) && !empty($_POST['cikis'])){


    $giris          = $_POST['giris'];
    $cikis          = $_POST['cikis'];

    if($islem == "kontrol"){

      /* Odalar kontrolu */ 
      $odalar = $selotel->oda_goster();
      $bos_odalar = array();

      if(!empty($odalar)){

          foreach ($odalar as $oda) {

            $bos_oda = $selotel->rezervasyon_oda_kontrol($oda['id'], $giris, $cikis);

            if($bos_oda){
              $bos_odalar[] = $oda;
            }
          }

      }
      /* Odalar kontrolu */

    }

    if($islem == "rezerve"){

      if(!empty($_SESSION['id'])){
        $oda = intval($_POST['oda']);

        $kullanici = $_SESSION['id'];

        $rezerve_yap = $selotel->rezervasyon_ekle($oda, $kullanici, $giris, $cikis);

        if($rezerve_yap){

          $mesaj = "Rezerve başarıyla yapildi. Bizi tercih ettiğiniz için teşekkür ederiz.";

        } else {
          $mesaj = "Rezerve başarisiz oldu. Tekrar deneyiniz";
        }
      } else {
        $mesaj = "Rezervasyon yapmak için giriş yapınız veya kayıt olunuz";
      }
    }


  }


}


?>

<?php include("inc/sablon/ust.php"); ?>
<style>

body {
  margin-bottom: 60px; /* Margin bottom by footer height */
  background-image: url("http://otelrezervasyon.tk/img/arka.jpg");
  background-repeat: no-repeat, repeat;
  background-size: 100%;
}
</style>
    <div class="container pt-5">
        <div class="row justify-content-md-center">
          <div class="col-5">
            <form method="post" class="form-inline">
                <div class="jumbotron mt-3">
                  <h1>Rezervasyon yap</h1>
                  <p class="lead">Buradan hemencik otelimizde rezervasyon yapabilirsiniz</p>
                  <div class="form-group pb-3">
                    <label for="giris" class="col-sm-4 col-form-label">Giriş tarihi</label>
                    <input type="text" class="form-control" id="giris" name="giris" value="<?php if(!empty($giris)){print $giris;} ?>" />
                  </div>
                  <div class="form-group pb-3">
                    <label for="cikis" class="col-sm-4 col-form-label">Çıkış tarihi</label>
                    <input type="text" class="form-control" id="cikis" name="cikis" value="<?php if(!empty($cikis)){print $cikis;} ?>" />
                  </div>
                  <input type="hidden" name="islem" value="kontrol">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Kontrol et</button>
                </div>
            </form>
          </div>
          <div class="col-sm-7">
            <form method="post" class="form-inline">
                <div class="jumbotron mt-3">
                  <h1>Rezerve yapilabilecek odalar</h1>
                  <p class="lead">Sizin için önerilen boş odalarımız</p>
                  <?php if(!empty($mesaj)){?> <div class="alert alert-success" role="alert"><?php print $mesaj; ?></div> <?php } ?>
                    <?php 
                    if(!empty($bos_odalar)){
                    
                    ?>
                    <table class="table table-bordered table-hover table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Numarası</th>
                          <th scope="col">Tip</th>
                          <th scope="col">Kat</th>
                          <th scope="col">Fiyat</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php



                          foreach ($bos_odalar as $oda) { ?>

                            
                        <tr>
                          <form method="post" class="form-inline">
                            <td><?php print $oda['oda_numarasi'];?></td>
                            <td><?php $oda_tip = $selotel->oda_tipi_goster_tek($oda['oda_tip']); if($oda_tip) { print $oda_tip['ad']; }?></td>
                            <td><?php print $oda['oda_kat'];?></td>
                            <td><?php $oda_fiyat = $selotel->oda_fiyat_goster_tip($oda['oda_tip']); print $oda_fiyat['oda_fiyat']; ?> TL</td> 
                            <td><button type="submit" class="btn btn-primary">Rezervasyon yap</button></td>
                            <input type="hidden" name="oda" value="<?php print $oda['id']; ?>" />
                            <input type="hidden" name="giris" value="<?php if(!empty($giris)){print $giris;} ?>" />
                            <input type="hidden" name="cikis" value="<?php if(!empty($cikis)){print $cikis;} ?>" />
                            <input type="hidden" name="islem" value="rezerve">
                          </form>
                        </tr>
                          
                        <?php } ?>

                        


                      </tbody>
                    </table>

                    <?php } else { ?>


                      <?php if(empty($islem)) {?> 

                        <div class="alert alert-info">Öncellikle giriş ve çıkış tarihleri seçmeniz gerekmektedir</div>
                      <?php } ?>

                     <?php } ?>
                </div>
            </form>



          </div>

        </div>
    </div>

<?php include("inc/sablon/alt.php"); ?>