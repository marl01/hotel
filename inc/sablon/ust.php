<!DOCTYPE html>
<html lang="tr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Otel Rezervasyon</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/otel.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/bootstrap-datepicker3.min.css" rel="stylesheet">
    
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Otel Rezerve</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php if(!empty($_SESSION['tur']) && $_SESSION['tur'] == 1) { ?>

            <li class="nav-item">
              <a class="nav-link" href="oda_listele.php">Odalar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="oda_fiyatlar.php">Fiyatlar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="oda_tipler.php">Tipler</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="oda_duyurular.php">Duyurular</a>
            </li>

            <?php } ?>
            <?php if(empty($_SESSION['id'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="giris.php">Giriş yap</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kayit.php">Kayıt ol</a>
            </li>
            <?php } else { ?> 
            <li class="nav-item">
              <a class="nav-link" href="cikis.php">Çıkış yap</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

