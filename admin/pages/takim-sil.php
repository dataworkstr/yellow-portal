<?php
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>



<?php

$duzenlenecek_id = $_GET[id];
$sil = mysql_query("delete from takimlar where id = '$duzenlenecek_id'") or die("Hata Olustu!");



if($sil)

{

  echo "

        <div class='alert alert-success alert-dismissable'>

             <i class='fa fa-check'></i>

              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

                 Takım başarılı bir şekilde silinmiştir.

                 </div>


        ";



         header("Refresh:2, url=admin.php?div=takimlar");

}else{



    echo "



        <div class='alert alert-danger alert-dismissable'>

                                        <i class='fa fa-ban'></i>

                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

                                        Oyuncu silinemedi.

                                    </div>







    ";

}



?>
