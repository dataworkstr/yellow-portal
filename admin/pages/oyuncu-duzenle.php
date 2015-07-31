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


   $oyuncu_adi = addslashes($_POST['oyuncu_adi']);
   $dogum_yeri = addslashes($_POST['dogum_yeri']);
   $boy = addslashes($_POST['boy']);

   $kilo = addslashes($_POST['kilo']);
   $yas = addslashes($_POST['yas']);
   $dogum_tarihi = addslashes($_POST['dogum_tarihi']);

   $uyruk = addslashes($_POST['uyruk']);
   $kulup = addslashes($_POST['kulup']);

   if($_POST['ikincipozisyon'] == ""){
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
        $durum = $_POST['durum'];
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

header("Refresh:2, url=admin.php?div=oyuncular");

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
                        <option><?php echo $ugurdk['kulub']; ?></option>
                        <?php

                        switch($ugurdk['kulub']){

                            case 'Serbest':
                            echo "
                                <option>Körükspor</option>
                                <option>AAÜ Ejderhaspor</option>
                            ";
                            break;

                            case 'Körükspor':
                            echo "
                                <option>Serbest</option>
                                <option>AAÜ Ejderhaspor</option>
                            ";
                            break;

                            case 'AAÜ Ejderhaspor':
                            echo "
                                <option>Serbest</option>
                                <option>Körükspor</option>
                            ";
                            break;

                        }


                        ?>
                    </select>

                </span>
            </p>

            <p>
                <label>Pozisyon</label>
                <input name="pozisyon333" value="<?php echo $ugurdk['pozisyon']; ?>" style="display:none;">
                <span class="field">
                   <select name="ilkpozisyon" id="selection2" class="uniformselect">

                    <option><?php echo boşluktankesme($ugurdk['pozisyon'],1) ?></option>
                    <option>GK</option>
                    <option>D</option>
                    <option>DM</option>
                    <option>M</option>
                    <option>AM</option>
                    <option>F</option>
                    <option>ST</option>
                </select>
                <br/>
                <select name="ikincipozisyon"  id="selection2" class="uniformselect" >
                    <option><?php echo substr($ugurdk['pozisyon'],2,10); ?></option>
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

                $numaracek = mysql_fetch_array(mysql_query("SELECT * FROM oyuncular"));

                echo "<option>".$ugurdk['numara']."</option>";
                for($a = 1 ; $a <100 ; $a++){

                    if($numaracek['numara'] == $a){
                        continue;
                    }else{
                        echo "<option>".$a."</option>";
                    }
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
