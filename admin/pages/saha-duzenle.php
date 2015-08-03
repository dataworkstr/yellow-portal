<?php
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>

<?php

$kiminsahasi = $_GET['id'];

@$kontrol = $_POST['button'];

if($kontrol)

{
    $sayi = rastgele_sifre(3);

    $uzanti=    array('image/jpeg','image/jpg','image/png','image/x-png','image/gif');

    $dizin=     "../images/stat/";

    if(in_array(strtolower($_FILES['resim']['type']),$uzanti)){

       move_uploaded_file($_FILES['resim']['tmp_name'],"./$dizin/$sayi-{$_FILES['resim']['name']}");



   }


   $adi = $_POST['adi'];

   $kapasite = $_POST['kapasite'];

   $boyut = $_POST['boyut'];

   $zemin = $_POST['zemin'];

   $isiklandirma = $_POST['isiklandirma'];

   $koltuklandirma = $_POST['koltuklandirma'];

   $diger = $_POST['diger'];

   $adres = $_POST['adres'];

   $linki = $_POST['linki'];

   $adiseo = cevir($adi);



   if($_FILES['resim']['name'] == ''){

     $saha_resim = "images/stat/default.jpg";

 }else{

    $dizin2 = "images/stat/";

    $saha_resim = $dizin2.$sayi."-".$_FILES['resim']['name'];

}


mysql_query("insert into sahalar(saha_adi,saha_adiseo,saha_resim,saha_kapasite,saha_boyut,saha_zemin,saha_isiklandirma,saha_koltuklandirma,saha_digerbilgiler,saha_adres,saha_link) values('$adi','$adiseo','$saha_resim','$kapasite','$boyut','$zemin','$isiklandirma','$koltuklandirma','$diger','$adres','$linki')",$baglanti) or die("Veri eklenemedi".mysql_error());

echo "

<div class='alert alert-success alert-dismissable'>

   <i class='fa fa-check'></i>

   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

   Saha başarılı bir şekilde eklendi.

</div>


";

header("Refresh:0, url=admin.php?div=sahalar");

}



?>


<?php $oku = mysql_fetch_array(mysql_query("select * from sahalar where id='$kiminsahasi'")); ?>

<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Saha Düzenle</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" method="post" enctype="multipart/form-data">
            <p>
                <label>Saha Adı</label>
                <span class="field"><input type="text" name="adi" id="firstname2" class="input-xxlarge" value="<?php echo $oku['saha_adi']; ?>"/></span>
            </p>

            <p>
                <label>Saha Kapasite</label>
                <span class="field"><input type="text" name="kapasite" id="firstname2" class="input-xxlarge" value="<?php echo $oku['saha_kapasite']; ?>"/></span>
            </p>

            <p>
                <label>Saha Boyut</label>
                 <span class="field"><input type="text" name="boyut" id="firstname2" class="input-xxlarge" value="<?php echo $oku['saha_boyut']; ?>"/></span>
            </p>

             <p>
                <label>Saha Zemin</label>
                 <span class="field"><input type="text" name="zemin" id="firstname2" class="input-xxlarge" value="<?php echo $oku['saha_zemin']; ?>"/></span>
            </p>

             <p>
                <label>Saha Işıklandırma</label>
                 <span class="field"><input type="text" name="isiklandirma" id="firstname2" class="input-xxlarge" value="<?php echo $oku['saha_isiklandirma']; ?>"/></span>
            </p>

              <p>
                <label>Saha Koltuklandırma</label>
                 <span class="field"><input type="text" name="koltuklandirma" id="firstname2" class="input-xxlarge" value="<?php echo $oku['saha_koltuklandirma']; ?>"/></span>
            </p>


            <p>
                <label>Diğer Bilgiler</label>
                <span class="field"><textarea type="text" name="diger" class="input-xxlarge ckeditor" style="height: 300px;" ><?php echo $oku['saha_digerbilgiler']; ?></textarea></span>
            </p>

              <p>
                <label>Adres</label>
                <span class="field"><textarea type="text" name="adres" class="input-xxlarge ckeditor" style="height: 300px;" ><?php echo $oku['saha_adres']; ?></textarea></span>
            </p>

              <p>
                <label>Site Linki</label>
                <span class="field"><input type="text" name="linki" id="firstname2" class="input-xxlarge" value="<?php echo $oku['saha_link']; ?>"/></span>
            </p>


           <p>
            <label>Saha Resim</label>
            <div class="field">

                  <div style="float:left;margin-right: 20px;margin-top: -10px;margin-bottom: -10px;margin-left: -10px;"><img src="../<?php echo $oku['saha_resim']; ?>" width="70" height="70"/></div>

             <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input span3">
                        <i class="iconfa-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-file"><span class="fileupload-new">Gözat</span>
                    <input type="file" name="resim"></span>
                </div>
            </div>



        </div>
    </p>


    <p class="stdformbutton" style="text-align:center;">
        <input class="btn btn-primary" type="submit" name="button" value="Gönder"/>
    </p>
</form>
</div>
</div>
