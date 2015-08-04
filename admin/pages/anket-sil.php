<?php
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>
<?php


    $ozan = $_GET['id'];


    $sil = mysql_query("delete from anket where id = '$ozan'") or die("Hata Olustu!");



    if($sil)

    {

      echo "

            <div class='alert alert-success alert-dismissable'>

                 <i class='fa fa-check'></i>

                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

                     Anket başarılı bir şekilde silinmiştir.

                     </div>


            ";



             header("Refresh:1, url=admin.php?div=anketler");

    }

?>
