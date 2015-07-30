<?php
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>
    <?php

    $can = $_GET['id'];

    mysql_query("INSERT haberler SELECT * FROM haberlercop where id ='$can'");

 echo "

        <div class='alert alert-success alert-dismissable'>

             <i class='fa fa-check'></i>

              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

                 Haber başarılı bir şekilde geri alındı. Haberler sayfasına yönlendiriliyorsunuz.

        </div>


        ";

 header("Refresh:2, url=admin.php?div=haberler");

?>
