
<?php

@$kontrol = $_POST['button'];

if($kontrol)

{
    $sayi = rastgele_sifre(3);

    $uzanti=    array('image/jpeg','image/jpg','image/png','image/x-png','image/gif');

    $dizin=     "../images/oyuncu/";

    if(in_array(strtolower($_FILES['resim']['type']),$uzanti)){

       move_uploaded_file($_FILES['resim']['tmp_name'],"./$dizin/$sayi-{$_FILES['resim']['name']}");



   }


   $icerik = addslashes($_POST['icerik']);

   $haber_baslik = addslashes($_POST['baslik']);

   $haber_baslik2 = addslashes($_POST['baslik2']);


   $etiket = $_POST['tags'];

   $haber_baslikseo = cevir($haber_baslik);

   $haberuye = $_SESSION["username"];

   if($_FILES['resim']['name'] == ''){

     $haber_resim = "images/oyuncu/default.jpg";

 }else{

    $dizin2 = "images/oyuncu/";

    $haber_resim = $dizin2.$sayi."-".$_FILES['resim']['name'];

}


mysql_query("insert into haberler(haber_adi,haber_adiseo,haber_resim,haber_icerik,haber_etiket,haber_uye,haber_adi2) values('$haber_baslik','$haber_baslikseo','$haber_resim','$icerik','$etiket','$haberuye','$haber_baslik2')",$baglanti) or die("Veri eklenemedi".mysql_error());

echo "

<div class='alert alert-success alert-dismissable'>

   <i class='fa fa-check'></i>

   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

   Oyuncu başarılı bir şekilde eklendi. Oyuncu sayfasına yönlendiriliyorsunuz...

</div>


";

header("Refresh:2, url=admin.php?div=oyuncular");

}



?>

<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Oyuncu Ekle</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" method="post" enctype="multipart/form-data">
            <p>
                <label>Oyuncu Adı</label>
                <span class="field"><input type="text" name="oyuncu_adi" id="firstname2" class="input-large" /></span>
            </p>

            <p>
                <label>Doğum Yeri</label>
                <span class="field"><input type="text" name="dogum_yeri" id="firstname2" class="input-large" /></span>
            </p>

             <p>
                <label>Boy</label>
                <span class="field"><input type="text" name="boy" id="firstname2" class="input-large" /></span>
            </p>

             <p>
                <label>Kilo</label>
                <span class="field"><input type="text" name="kilo" id="firstname2" class="input-large" /></span>
            </p>

             <p>
                <label>Yaş</label>
                <span class="field"><input type="text" name="yas" id="firstname2" class="input-large" /></span>
            </p>

             <p>
                <label>Doğum Tarihi</label>
                <span class="field">

                <input id="datepicker" type="text" name="dogum_tarihi" class="input-large hasDatepicker">

                </span>
            </p>

             <p>
                <label>Uyruk</label>
                <span class="field"><input type="text" name="uyruk" id="firstname2" class="input-large" /></span>
            </p>

             <p>
                <label>Kulüp</label>
                <span class="field">

                    <select name="kulup" id="selection2" class="uniformselect">
                        <option>Serbest</option>
                        <option>Körükspor</option>
                    </select>

                </span>
            </p>

             <p>
                <label>Pozisyon</label>
                <span class="field">
               <select name="pozisyon" id="selection2" class="uniformselect">
                        <option>AMC</option>
                        <option>ST</option>
                    </select>
                 </span>
            </p>

             <p>
                <label>Sırt No</label>
                <span class="field"><input type="text" name="sirtno" id="firstname2" class="input-large" /></span>
            </p>

             <p>
                <label>Durum</label>
                <span class="field"><input type="text" name="durum" id="firstname2" class="input-large" /></span>
            </p>

           <p>
            <label>Oyuncu Resim</label>
            <div class="field">


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
