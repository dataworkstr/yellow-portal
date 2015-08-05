<?php
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>
<?php

$fiddycent = $_GET['id'];

@$kontrol = $_POST['button'];

if($kontrol)

{
    $sayi = rastgele_sifre(3);

    $uzanti=    array('image/jpeg','image/jpg','image/png','image/x-png','image/gif');

    $dizin=     "../images/oyuncu/";

    if(in_array(strtolower($_FILES['resim']['type']),$uzanti)){

       move_uploaded_file($_FILES['resim']['tmp_name'],"./$dizin/$sayi-{$_FILES['resim']['name']}");



   }


   $oyuncu_adi = $_POST['oyuncu_adi'];
   $dogum_yeri = $_POST['dogum_yeri'];
   $boy = $_POST['boy'];

   $kilo = $_POST['kilo'];
   $yas = $_POST['yas'];
   $dogum_tarihi = $_POST['dogum_tarihi'];

   $uyruk = $_POST['uyruk'];
   $kulup = $_POST['kulup'];

   $klubuguncelle = mysql_query("select * from takimlar");

    while($takimguncelle = mysql_fetch_array($klubuguncelle)){

        $hangioyuncuki = mysql_fetch_array(mysql_query("select * from oyuncular where id = '$fiddycent'"));

        $nekiacaba = $hangioyuncuki['ad_soyadseo'].", ";

        str_replace($nekiacaba,"",$takimguncelle['oyuncular']);
    }

    $hangitakimaeklenece = mysql_fetch_array(mysql_query("select * from takimlar where takim_adiseo = '$kulup'"));

    $hangioyuncuki2 = mysql_fetch_array(mysql_query("select * from oyuncular where id = '$fiddycent'"));

    $ensonekleneceksey = $hangitakimaeklenece['oyuncular'].", ".$hangioyuncuki2['ad_soyadseo'];

    mysql_query("update takimlar set oyuncular = '$ensonekleneceksey' where takim_adiseo ='$kulup'",$baglanti) or die("Veri eklenemedi".mysql_error());


    if($_POST['ilkpozisyon'] == "" and $_POST['ikincipozisyon'] == ""){
       $pozisyon = $_POST['pozisyon333'];
    }else{
        $a = $_POST['ilkpozisyon'];
    $b = $_POST['ikincipozisyon'];
    $pozisyon = $a." ".$b;
    }





$sirtno = addslashes($_POST['sirtno']);

    if($_POST['durum'] == "") {
        $durum = $_POST['ozandurum'];
    }else {
        $durum = implode($_POST['durum'],', ');

    }



$oyuncu_adiseo = cevir($oyuncu_adi);

$deger = "1.000.000";


if($_FILES['resim']['name'] == ''){

 $haber_resim = $_POST['eskiresmi'];

}else{

    $dizin2 = "images/oyuncu/";

    $haber_resim = $dizin2.$sayi."-".$_FILES['resim']['name'];

}


mysql_query("UPDATE oyuncular SET
    ad_soyad = '$oyuncu_adi',
    dogum_yeri = '$dogum_yeri',
    oyuncu_photo = '$haber_resim',
    boy = '$boy',
    kilo = '$kilo',
    yas = '$yas',
    dogum_tarihi = '$dogum_tarihi',
    uyruk = '$uyruk',
    kulub = '$kulup',
    pozisyon = '$pozisyon',
    deger = '$deger',
    numara = '$sirtno',
    ad_soyadseo = '$oyuncu_adiseo',
    durum = '$durum' where id ='$fiddycent'",$baglanti) or die("Veri eklenemedi".mysql_error());

echo "

<div class='alert alert-success alert-dismissable'>

   <i class='fa fa-check'></i>

   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

   Oyuncu başarılı bir şekilde düzenlendi. Oyuncu sayfasına yönlendiriliyorsunuz...

</div>


";

header("Refresh:0, url=admin.php?div=oyuncular");

}



?>

<?php $ugurdk = mysql_fetch_array(mysql_query("select * from oyuncular where id = '$fiddycent'"));  ?>

<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Oyuncu Düzenle <a href="admin.php?div=oyuncular" class="btn btn-default pull-right" style="float:right;margin-top: -7px;"><i class="fa fa-arrow-circle-left"></i> Geri Dön</a></h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" method="post" enctype="multipart/form-data">
            <p>
                <label>Oyuncu Adı</label>
                <span class="field"><input type="text" name="oyuncu_adi" id="firstname2" class="input-large" value="<?php echo $ugurdk['ad_soyad']; ?>"/></span>
            </p>

            <p>
                <label>Doğum Yeri</label>
                <span class="field"><input type="text" name="dogum_yeri" id="firstname2" class="input-large" value="<?php echo $ugurdk['dogum_yeri']; ?>"/></span>
            </p>

            <p>
                <label>Boy</label>
                <span class="field"><input type="text" name="boy" id="firstname2" class="input-large" value="<?php echo $ugurdk['boy']; ?>"/></span>
            </p>

            <p>
                <label>Kilo</label>
                <span class="field"><input type="text" name="kilo" id="firstname2" class="input-large" value="<?php echo $ugurdk['kilo']; ?>"/></span>
            </p>

            <p>
                <label>Yaş</label>
                <span class="field"><input type="text" name="yas" id="firstname2" class="input-large" value="<?php echo $ugurdk['yas']; ?>"/></span>
            </p>

            <p>
                <label>Doğum Tarihi</label>
                <span class="field">

                    <input id="tarih" type="text" name="dogum_tarihi" class="input-large" value="<?php echo $ugurdk['dogum_tarihi']; ?>">

                </span>
            </p>

            <p>
                <label>Uyruk</label>
                <span class="field"><input type="text" name="uyruk" id="firstname2" class="input-large" value="<?php echo $ugurdk['uyruk']; ?>"/></span>
            </p>

            <p>
                <label>Kulüp</label>
                <span class="field">

                    <select name="kulup" id="selection2" class="uniformselect">
                        <?php $klubu = $ugurdk['kulub']; $gosterbize = mysql_fetch_array(mysql_query("select * from takimlar where takim_adiseo = '$klubu'"));?>
                        <option value="<?php echo $gosterbize['takim_adiseo'] ?>"><?php echo $gosterbize['takim_adi'] ?></option>
                        <option value="serbest">Serbest</option>
                      <?php


                            $takimlarigetir = mysql_query("select * from takimlar order by takim_adi ASC");

                        while($takimgoster = mysql_fetch_array($takimlarigetir)){

                            if($gosterbize['takim_adi'] == $takimgoster['takim_adi']){
                                continue;
                            }else{
                        ?>

                        <option value="<?php echo $takimgoster['takim_adiseo'] ?>"><?php echo $takimgoster['takim_adi'] ?></option>

                        <?php }} ?>

                    </select>

                </span>
            </p>

            <p>
                <label>Pozisyon</label>
                <input name="pozisyon333" value="<?php echo $ugurdk['pozisyon']; ?>" style="display:none;">
                <span class="field">
                   <select name="ilkpozisyon" id="selection2" class="uniformselect">

                    <option><?php echo boşluktankesme($ugurdk['pozisyon'],1) ?></option>
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
                    <option><?php echo substr($ugurdk['pozisyon'],2,10); ?></option>
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



                echo "<option>".$ugurdk['numara']."</option>";




                for($a = 1; $a < 99 ; $a++){

                     echo "<option>".$a."</option>";



                    }





                ?>
            </select>
        </span>
    </p>

    <p>
        <label>Durum</label>
        <span class="field">
        <input name="ozandurum" value="<?php echo $ugurdk['durum']; ?>" style="display:none;"/>
         <select data-placeholder="Durum belirtin" class="chzn-select" name="durum[]" multiple="multiple" style="width:350px;" tabindex="4" >
                                <option value="yerli">Yerli</option>
                                <option value="sakat">Sakat</option>
                                <option value="hafifsakat">Hafif Sakat</option>
                                <option value="avp">Avrupa</option>
                                <option value="yabanci">Yabancı</option>

        </select>
    </span>
</p>

<p>
    <label>Oyuncu Resim</label>
    <div class="field">

        <div style="float:left;margin-right: 20px;margin-top: -10px;margin-bottom: -10px;margin-left: -10px;"><img src="../<?php echo $ugurdk['oyuncu_photo']; ?>" width="70" height="70"/></div>

        <input name="eskiresmi" value="<?php echo $ugurdk['oyuncu_photo']; ?>" style="display:none;"/>

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
    <input class="btn btn-primary" type="submit" name="button" value="Düzenle"/>
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
