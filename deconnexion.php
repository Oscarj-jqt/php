<?php

include './traitement_toutes_pages.php'; 

session_destroy();

setcookie('remember', '', -1);

header('location: accueil.php');