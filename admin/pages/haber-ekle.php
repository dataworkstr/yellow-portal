
<?php

@$kontrol = $_POST['button'];

if($kontrol)

{
    $sayi = rastgele_sifre(3);

    $uzanti=    array('image/jpeg','image/jpg','image/png','image/x-png','image/gif');

    $dizin=     "../images/haber-resimleri/";

    if(in_array(strtolower($_FILES['resim']['type']),$uzanti)){

       move_uploaded_file($_FILES['resim']['tmp_name'],"./$dizin/$sayi-{$_FILES['resim']['name']}");



   }


   $icerik = addslashes($_POST['icerik']);

   $haber_baslik = addslashes($_POST['baslik']);

   $haber_baslik2 = addslashes($_POST['baslik2']);


   $etiket = $_POST['tags'];

   $haber_baslikseo = cevir($haber_baslik);

   $uyeyiyaz = mysql_fetch_array(mysql_query("select * from kullanicilar where username = '$kim'"));

   $haberuye = $uyeyiyaz['adsoyad'];

   if($_FILES['resim']['name'] == ''){

     $haber_resim = "images/haber-resimleri/default.jpg";

 }else{

    $dizin2 = "images/haber-resimleri/";

    $haber_resim = $dizin2.$sayi."-".$_FILES['resim']['name'];

}


mysql_query("insert into haberler(haber_adi,haber_adiseo,haber_resim,haber_icerik,haber_etiket,haber_uye,haber_adi2) values('$haber_baslik','$haber_baslikseo','$haber_resim','$icerik','$etiket','$haberuye','$haber_baslik2')",$baglanti) or die("Veri eklenemedi".mysql_error());

echo "

<div class='alert alert-success alert-dismissable'>

   <i class='fa fa-check'></i>

   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

   Haber başarılı bir şekilde eklendi.

</div>


";

header("Refresh:2, url=admin.php?div=haberler");

}



?>

<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Haber Ekle</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" method="post" enctype="multipart/form-data">
            <p>
                <label>Haber Üst Başlık</label>
                <span class="field"><input type="text" name="baslik" id="firstname2" class="input-xxlarge" /></span>
            </p>

            <p>
                <label>Haber Alt Başlık</label>
                <span class="field"><input type="text" name="baslik2" id="firstname2" class="input-xxlarge" /></span>
            </p>

            <p>
                <label>Haber İçeriği</label>
                <span class="field"><textarea type="text" name="icerik" id="lastname2" class="input-xxlarge" style="height: 300px;"></textarea></span>
            </p>

            <p>
                <label>Etiket</label>
                <span class="field">
                   <input name="tags" id="tags" class="input-large" value="" />
               </span>
           </p>

           <p>
            <label>Haber Resim</label>
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
