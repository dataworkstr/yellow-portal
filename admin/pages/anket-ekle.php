<?php
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>

<?php

@$kontrol = $_POST['button'];

if($kontrol)

{


   $baslik = $_POST['baslik'];

   $bir = $_POST['birdeger'];

   $iki = $_POST['ikideger'];

   $uc = $_POST['ucdeger'];

   $anasayfa = $_POST['anasayfa'];



mysql_query("insert into anketler(anket_baslik,deger1,deger2,deger3,deger1_say,deger2_say,deger3_say,anasayfa) values('$baslik','$bir','$iki','$uc','0','0','0','$anasayfa')",$baglanti) or die("Veri eklenemedi".mysql_error());

echo "

<div class='alert alert-success alert-dismissable'>

   <i class='fa fa-check'></i>

   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

   Anket başarılı bir şekilde eklendi.

</div>


";

header("Refresh:1, url=admin.php?div=anketler");

}



?>

<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Anket Ekle</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" method="post" enctype="multipart/form-data">
            <p>
                <label>Anket Başlığı</label>
                <span class="field"><input type="text" name="baslik" id="firstname2" class="input-xxlarge" /></span>
            </p>

            <p>
                <label>Birinci Değer</label>
                <span class="field"><input type="text" name="birdeger" id="firstname2" class="input-xxlarge" /></span>
            </p>

            <p>
                <label>İkinci Değer</label>
                 <span class="field"><input type="text" name="ikideger" id="firstname2" class="input-xxlarge" /></span>
            </p>

              <p>
                <label>Üçüncü Değer</label>
                 <span class="field"><input type="text" name="ucdeger" id="firstname2" class="input-xxlarge" /></span>
            </p>

            <p>
                            <label>Aktif Olacak Mı?</label>
                            <span class="field">
                            <select name="anasayfa" class="uniformselect">
                            	<option value="1">Evet</option>
                                <option value="0">Hayır</option>
                            </select>
                            </span>
                        </p>




    <p class="stdformbutton" style="text-align:center;">
        <input class="btn btn-primary" type="submit" name="button" value="Gönder"/>
    </p>
</form>
</div>
</div>
