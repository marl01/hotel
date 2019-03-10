<?php

// Oturum baslat
session_start();

// Oturumu kapat
session_destroy();

// Yonledir
header("Location: index.php");