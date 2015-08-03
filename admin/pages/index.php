<?php
error_reporting(false);
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>
<?php

$yello = $_GET['div'];

switch($yello){

    case "home" :
    include "pages/anasayfa.php";
    break;

    case "sahalar" :
    include "pages/sahalar.php";
    break;

        case "saha-ekle" :
        include "pages/saha-ekle.php";
        break;

        case "saha-duzenle" :
        include "pages/saha-duzenle.php";
        break;

        case "saha-sil" :
        include "pages/saha-sil.php";
        break;

        case "sahalar" :
        include "pages/sahalar.php";
        break;

    case "haberler" :
    include "pages/haberler.php";
    break;

        case "haber-ekle" :
        include "pages/haber-ekle.php";
        break;

        case "haber-duzenle" :
        include "pages/haber-duzenle.php";
        break;

        case "haber-sil" :
        include "pages/haber-sil.php";
        break;

        case "cophaberler" :
        include "pages/cophaberler.php";
        break;

        case "haber-geri-al" :
        include "pages/haber-geri-al.php";
        break;

    case "oyuncular" :
    include "pages/oyuncular.php";
    break;

        case "oyuncu-ekle" :
        include "pages/oyuncu-ekle.php";
        break;

        case "oyuncu-duzenle" :
        include "pages/oyuncu-duzenle.php";
        break;

        case "oyuncu-sil" :
        include "pages/oyuncu-sil.php";
        break;

    case "takimlar" :
    include "pages/takimlar.php";
    break;

        case "takim-ekle" :
        include "pages/takim-ekle.php";
        break;

        case "takim-duzenle" :
        include "pages/takim-duzenle.php";
        break;

        case "takim-sil" :
        include "pages/takim-sil.php";
        break;

    case "cikis" :
    include "pages/cikis.php";
    break;

}

?>
