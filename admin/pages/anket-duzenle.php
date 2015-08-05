<?php
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>

<?php

    $kustepe = $_GET['id'];

@$kontrol = $_POST['button'];

if($kontrol)

{


   $baslik = $_POST['baslik'];

   $baslikseo = cevir($_POST['baslik']);

   $bir = $_POST['birdeger'];

   $iki = $_POST['ikideger'];

   $uc = $_POST['ucdeger'];

   $anasayfa = $_POST['anasayfa'];

   $say1 = $_POST['deger1say'];

   $say2 = $_POST['deger2say'];

   $say3 = $_POST['deger3say'];



mysql_query("update anket set
anket_baslik = '$baslik',
baslik_seo = '$baslikseo',
deger1 = '$bir',
deger2 = '$iki',
deger3 = '$uc',
deger1_say = '$say1',
deger2_say = '$say2',
deger3_say = '$say3',
anasayfa = '$anasayfa' ",$baglanti) or die("Veri eklenemedi".mysql_error());

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

<?php $oku = mysql_fetch_array(mysql_query("select * from anket where id = '$kustepe'")); ?>



<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Anket Düzenle</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" method="post" enctype="multipart/form-data">
            <p>
                <label>Anket Başlığı</label>
                <span class="field"><input type="text" name="baslik" id="firstname2" class="input-xxlarge" value="<?php echo $oku['anket_baslik']; ?>"/></span>
            </p>

           <input name="deger1say" value="<?php echo $oku['deger1_say']; ?>" style="display:none;"/>
           <input name="deger2say" value="<?php echo $oku['deger2_say']; ?>" style="display:none;"/>
           <input name="deger3say" value="<?php echo $oku['deger3_say']; ?>" style="display:none;"/>

            <p>
                <label>Birinci Değer</label>
                <span class="field"><input type="text" name="birdeger" id="firstname2" class="input-xxlarge" value="<?php echo $oku['deger1']; ?>"/></span>
            </p>

            <p>
                <label>İkinci Değer</label>
                 <span class="field"><input type="text" name="ikideger" id="firstname2" class="input-xxlarge" value="<?php echo $oku['deger2']; ?>"/></span>
            </p>

              <p>
                <label>Üçüncü Değer</label>
                 <span class="field"><input type="text" name="ucdeger" id="firstname2" class="input-xxlarge" value="<?php echo $oku['deger3']; ?>"/></span>
            </p>

            <p>
                            <label>Aktif Olacak Mı?</label>
                            <span class="field">
                            <select name="anasayfa" class="uniformselect">
             <option value="<?php echo $oku['anasayfa']; ?>"><?php $a = $oku['anasayfa']; if($a == 0){echo "Hayır";}else{echo "Evet";}?></option>
                                <option value="<?php if($a == 0){echo "1";}else{echo "0";} ?>"><?php if($a == 0){echo "Evet";}else{echo "Hayır";} ?></option>
                            </select>
                            </span>
                        </p>




    <p class="stdformbutton" style="text-align:center;">
        <input class="btn btn-primary" type="submit" name="button" value="Düzenle"/>
    </p>
</form>
</div>
</div>
