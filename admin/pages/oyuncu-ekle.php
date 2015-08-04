<?php
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>

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

    $oyuncu_adiseo = cevir($oyuncu_adi);

    $hangitakimaeklenece = mysql_fetch_array(mysql_query("select * from takimlar where takim_adiseo = '$kulup'"));

    $ensonekleneceksey = $hangitakimaeklenece['oyuncular'].", ".$oyuncu_adiseo;

    mysql_query("update takimlar set oyuncular = '$ensonekleneceksey' where takim_adiseo ='$kulup'",$baglanti) or die("Veri eklenemedi".mysql_error());


    $a = $_POST['ilkpozisyon'];
    $b = $_POST['ikincipozisyon'];
    $pozisyon = $a." ".$b;



   $sirtno = addslashes($_POST['sirtno']);
   $durum = implode($_POST['durum'],', ');


   $deger = "1.000.000";


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

                <input id="tarih" type="text" name="dogum_tarihi" class="input-large">

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

                        <?php
                            $takimlarigetir = mysql_query("select * from takimlar order by takim_adi ASC");

                        while($takimgoster = mysql_fetch_array($takimlarigetir)){
                        ?>

                        <option value="<?php echo $takimgoster['takim_adiseo'] ?>"><?php echo $takimgoster['takim_adi'] ?></option>

                        <?php } ?>


                    </select>

                </span>
            </p>

             <p>
                <label>Pozisyon</label>
                <span class="field">
                 <select name="ilkpozisyon" id="selection2" class="uniformselect">

                    <option></option>
                    <option value="1,GK">GK</option>
                    <option value="2,D">D</option>
                    <option value="3,DM">DM</option>
                    <option value="4,M">M</option>
                    <option value="5,AM">AM</option>
                    <option value="6,F">F</option>
                    <option value="7,ST">ST</option>
                </select>
                <br/>
                <select name="ikincipozisyon"  id="selection2" class="uniformselect" >

                    <option></option>
                    <option>R</option>
                    <option>L</option>
                    <option>C</option>
                    <option>RL</option>
                    <option>LC</option>
                    <option>RC</option>
                    <option>RLC</option>

                </select>
            </span>
            </p>

             <p>
                <label>Sırt No</label>
                <span class="field">

                 <select name="sirtno" id="selection2" class="uniformselect">
                    <?php

                        $numberr = mysql_query("SELECT * FROM oyuncular");

                while($numaracek= mysql_fetch_array($numberr)){
                        for($a = 1 ; $a <100 ; $a++){
                            if($numaracek['numara'] == $a){
                                continue;
                            }else{

                            echo "<option>".$a."</option>";
                            }
                        } }
                   ?>
                   </select>
                </span>
            </p>

             <p>
                <label>Durum</label>
                <span class="field">
                       <select data-placeholder="Durum seçin..." name="durum[]" class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4">

                                <option value="Yerli">Yerli</option>
                                <option value="Sakat">Sakat</option>
                                <option value="hafifsakat">Hafif Sakat</option>
                                <option value="Avrupa">Avrupa</option>
                                <option value="Yabanci">Yabancı</option>

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

<script>
$(function() {
    $.datepicker.setDefaults($.datepicker.regional['tr']);
    $( '#tarih' ).datepicker({ dateFormat: 'dd.mm.yy' });
});
</script>
