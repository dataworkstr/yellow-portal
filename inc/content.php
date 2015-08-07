<?php
$yellowcek = $_GET['page'];
switch($yellowcek){
	case "haberler" :
	include "pages/news.php";
	break;
        case "haber-detay" :
        include "components/haber-detay.php";
        break;
	case "takimlar" :
	include "pages/teams.php";
	break;
        case "takim-detay" :
        include "components/takim-detay.php";
        break;
        case "anket-sonucu" :
        include "components/anket-sonuclari.php";
        break;
        case "mac-detay" :
        include "pages/mac-detay.php";
        break;
	case "oyuncular" :
	include "pages/players.php";
	break;
        case "oyuncu-detay" :
        include "components/oyuncu-detay.php";
        break;
	case "sahalar" :
	include "pages/stadium.php";
	break;
        case "saha-detay" :
        include "components/saha-detay.php";
        break;
	default :
	include "pages/home.php";
	break;
}
?>
