
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


   $oyuncu_adi = addslashes($_POST['oyuncu_adi']);
   $dogum_yeri = addslashes($_POST['dogum_yeri']);
   $boy = addslashes($_POST['boy']);

   $kilo = addslashes($_POST['kilo']);
   $yas = addslashes($_POST['yas']);
   $dogum_tarihi = addslashes($_POST['dogum_tarihi']);

   $uyruk = addslashes($_POST['uyruk']);
   $kulup = addslashes($_POST['kulup']);
   $pozisyon = addslashes($_POST['pozisyon']." ".$_POST['pozisyon2']);

   $sirtno = addslashes($_POST['sirtno']);
   $durum = addslashes($_POST['durum']);
   $oyuncu_adiseo = cevir($oyuncu_adi);

   $deger = "1.000.000 $";


   if($_FILES['resim']['name'] == ''){

     $haber_resim = "images/oyuncu/default.jpg";

 }else{

    $dizin2 = "images/oyuncu/";

    $haber_resim = $dizin2.$sayi."-".$_FILES['resim']['name'];

}


mysql_query("insert into oyuncular(
ad_soyad,
dogum_yeri,
oyuncu_photo,
boy,
kilo,
yas,
dogum_tarihi,
uyruk,
kulub,
pozisyon,
deger,
numara,
ad_soyadseo,
durum) values(
'$oyuncu_adi',
'$dogum_yeri',
'$haber_resim',
'$boy',
'$kilo',
'$yas',
'$dogum_tarihi',
'$uyruk',
'$kulup',
'$pozisyon',
'$deger',
'$sirtno',
'$oyuncu_adiseo',
'$durum'
)",$baglanti) or die("Veri eklenemedi".mysql_error());

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
                        <option value="serbest">Serbest</option>
                        <option value="korukspor">Körükspor</option>
                    </select>

                </span>
            </p>

             <p>
                <label>Pozisyon</label>
                <span class="field">
                       <select name="pozisyon" id="selection2" class="uniformselect">
                                <option>GK</option>
                                <option>D</option>
                                <option>DM</option>
                                <option>M</option>
                                <option>AM</option>
                                <option>FC</option>
                                <option>ST</option>
                       </select>
                       <br/>
                        <select data-placeholder="Pozisyon seçin..." class="chzn-select" multiple="multiple" style="width: 220px;display: -webkit-box;" tabindex="4" name="pozisyon2">

                                <option>R</option>
                                <option>L</option>
                                <option>C</option>

                       </select>
                 </span>
            </p>

             <p>
                <label>Sırt No</label>
                <span class="field">

                 <select name="sirtno" id="selection2" class="uniformselect">
                    <?php

                        $numaracek= mysql_fetch_array(mysql_query("SELECT * FROM oyuncular"));

                        for($a = 1 ; $a <100 ; $a++){
                            if($numaracek['numara'] == $a){
                                continue;
                            }

                            echo "<option>".$a."</option>";

                        }
                   ?>
                   </select>
                </span>
            </p>

             <p>
                <label>Durum</label>
                <span class="field">
                       <select data-placeholder="Durum seçin..." class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4" name="durum">

                                <option value="yerli">Yerli</option>
                                <option value="sakat">Sakat</option>
                                <option value="avrupa">Avrupa</option>
                                <option value="yabanci">Yabancı</option>

                       </select>
                 </span>
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

            Resim 250x300 px olacak

        </div>
    </p>


    <p class="stdformbutton" style="text-align:center;">
        <input class="btn btn-primary" type="submit" name="button" value="Gönder"/>
    </p>





</form>
</div>
</div>
