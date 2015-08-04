<?php

include "admin/ayar.php";


$oylanankisi = $_GET['radio1'];


$query = mysql_query("select * from haftaninoyuncusu where adi = '$oylanankisi'");
$count = mysql_num_rows($query);

if($count == 0){

mysql_query("insert into haftaninoyuncusu (adi) values ('$oylanankisi')",$baglanti) or die("Veri eklenemedi".mysql_error());

}else{

    $oku = mysql_fetch_array(mysql_query("select * from haftaninoyuncusu where adi = '$oylanankisi'"));

    $yenilesay = $oku['say']+1;

    mysql_query("update haftaninoyuncusu set say ='$yenilesay' where adi = '$oylanankisi'",$baglanti) or die("Veri güncellenemedi".mysql_error());

}


 $oyuncucek = mysql_query("select * from haftaninoyuncusu");


while($goster = mysql_fetch_array($oyuncucek)){

   echo $goster['adi']." = ".$goster['say'];

}


?>
