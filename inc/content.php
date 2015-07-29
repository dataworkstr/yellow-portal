<?php
$yellowcek = $_GET['page'];

switch($yellowcek){
	case "news" :
	include "pages/news.php";
	break;

	case "haber-detay" :
	include "components/haber-detay.php";
	break;

	case "teams" :
	include "pages/teams.php";
	break;

	case "takim-detay" :
	include "components/takim-detay.php";
	break;


	case "players" :
	include "pages/players.php";
	break;

	case "oyuncu-detay" :
	include "components/oyuncu-detay.php";
	break;

	case "stadium" :
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
