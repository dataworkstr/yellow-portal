<?php
	$yellowcek = $_GET['page'];
	
	switch($yellowcek){
		case "news" :
		include "pages/news.php";
		break;

            case "haber-detay" :
            include "pages/haber-detay.php";
            break;
		
		case "teams" :
		include "pages/teams.php";
		break;
		
		case "players" :
		include "pages/players.php";
		break;

            case "oyuncu-detay" :
            include "pages/oyuncu-detay.php";
            break;
		
		case "stadium" :
		include "pages/stadium.php";
		break;
		
		default :
		include "pages/home.php";
		break;
	}
	
?>
