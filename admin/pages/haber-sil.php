<?php
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>
<?php


    $ozan = $_GET['id'];

    mysql_query("INSERT haberlercop SELECT * FROM haberler where id ='$ozan'");

    $sil = mysql_query("delete from haberler where id = '$ozan'") or die("Hata Olustu!");



    if($sil)

    {

      echo "

            <div class='alert alert-success alert-dismissable'>

                 <i class='fa fa-check'></i>

                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

                     Haber başarılı bir şekilde silinmiştir.

                     </div>


            ";



             header("Refresh:2, url=admin.php?div=haberler");

    }

?>
