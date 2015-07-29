<?php

$yello = $_GET['div'];

switch($yello){

    case "home" :
    include "pages/anasayfa.php";
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

    case "cikis" :
    include "pages/cikis.php";
    break;

}

?>
