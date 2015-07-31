<?php
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>

<?php

$yellowcek = $_GET['id'];

@$kontrol = $_POST['button'];

if($kontrol)

{
    $sayi = rastgele_sifre(3);

    $uzanti=    array('image/jpeg','image/jpg','image/png','image/x-png','image/gif');

    $dizin=     "../images/takim-logo/";

    if(in_array(strtolower($_FILES['resim']['type']),$uzanti)){

       move_uploaded_file($_FILES['resim']['tmp_name'],"./$dizin/$sayi-{$_FILES['resim']['name']}");

   }


   $takimadi = addslashes($_POST['takim_adi']);

   $takimadiseo = cevir($takimadi);

   $yil = addslashes($_POST['yil']);

   $yer = addslashes($_POST['yer']);

   $kurucular = addslashes($_POST['kurucular']);

   $ilkbaskan = addslashes($_POST['ilkbaskan']);

   $baskan = addslashes($_POST['baskan']);

   $merkez = addslashes($_POST['merkez']);

   $eposta = addslashes($_POST['eposta']);

   $telefon = addslashes($_POST['telefon']);

$oyuncular = $_POST['oyuncular'];



   if($_FILES['resim']['name'] == ''){

     $logo = $_POST['eskilogo'];

 }else{

    $dizin2 = "images/takim-logo/";

    $logo = $dizin2.$sayi."-".$_FILES['resim']['name'];

}


mysql_query("update takimlar set
takim_adi = '$takimadi',
takim_adiseo = '$takimadiseo',
yil = '$yil',
yer = '$yer',
oyuncular = '$oyuncular',
kurucular = '$kurucular',
ilk_baskan = '$ilkbaskan',
baskan = '$baskan',
merkez = '$merkez',
email = '$eposta',
telefon = '$telefon'
",$baglanti) or die("Veri eklenemedi".mysql_error());

echo "

<div class='alert alert-success alert-dismissable'>

   <i class='fa fa-check'></i>

   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

   Takım başarılı bir şekilde düzenlendi.

</div>


";

header("Refresh:2, url=admin.php?div=takimlar");

}



?>

<?php

    $gosterbize = mysql_fetch_array(mysql_query("select * from takimlar where id = '$yellowcek'"));

?>

<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Takım Düzenle</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" method="post" enctype="multipart/form-data">
            <p>
                <label>Takım Adı</label>
                <span class="field"><input type="text" name="takim_adi" id="firstname2" class="input-xxlarge" value="<?php echo $gosterbize['takim_adi']; ?>"/></span>
            </p>

            <p>
                <label>Yıl</label>
                <span class="field"><input type="text" name="yil" id="firstname2" class="input-xxlarge" value="<?php echo $gosterbize['yil']; ?>"/></span>
            </p>

             <p>
                <label>Kurulduğu Yer</label>
                <span class="field"><input type="text" name="yer" id="firstname2" class="input-xxlarge" value="<?php echo $gosterbize['yer']; ?>"/></span>
            </p>

            <p>
                <label>Kurucular</label>
                <span class="field">
                   <input name="kurucular" id="tags" class="input-large" value="<?php echo $gosterbize['kurucular']; ?>" />
               </span>
           </p>


            <p>
                <label>Oyuncular</label>

                <span class="field">


                               <?php
                                    $gamers = $gosterbize['oyuncular'];
                                    $yenimetin = explode(',',$gamers);
                                    foreach($yenimetin as $yazdir){
                                       $getirin2 = mysql_query("select * from oyuncular where ad_soyadseo ='$yazdir'");
                                        while($oku2 = mysql_fetch_array($getirin2)){
                                      ?>

                                      <?php echo $oku2['ad_soyad']; ?>

                                    <?php }} ?>

                </span>
                      <span class="field">

                        <select name="serbest" data-placeholder="Serbest Oyuncular..." class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4">

                           <?php
                                      $getirin = mysql_query("select * from oyuncular where durum = 'Serbest'");
                                      while($oku = mysql_fetch_array($getirin)){
                                ?>
                            <option value="<?php echo $oku['ad_soyadseo']; ?>"><?php echo $oku['ad_soyad']; ?></option>
                                 <?php } ?>
                     </select>


                 </span>

            </p>


            <p>
                <label>İlk Başkan</label>
                <span class="field"><input type="text" name="ilkbaskan" id="firstname2" class="input-xxlarge" value="<?php echo $gosterbize['ilk_baskan']; ?>"/></span>
            </p>

             <p>
                <label>Başkan</label>
                <span class="field"><input type="text" name="baskan" id="firstname2" class="input-xxlarge" value="<?php echo $gosterbize['baskan']; ?>"/></span>
            </p>

             <p>
                <label>Merkez</label>
                <span class="field"><input type="text" name="merkez" id="firstname2" class="input-xxlarge" value="<?php echo $gosterbize['merkez']; ?>"/></span>
            </p>

             <p>
                <label>E Mail</label>
                <span class="field"><input type="text" name="eposta" id="firstname2" class="input-xxlarge" value="<?php echo $gosterbize['email']; ?>"/></span>
            </p>

             <p>
                <label>Telefon</label>
                <span class="field"><input type="text" name="telefon" id="firstname2" class="input-xxlarge" value="<?php echo $gosterbize['telefon']; ?>"/></span>
            </p>

           <p>
            <label>Takım Logo</label>
            <div class="field">

            <input name="eskilogo" value="<?php echo $gosterbize['logo']; ?>" style="display:none;"/>

            <div style="float:left;margin-right: 20px;margin-top: -10px;margin-bottom: -10px;margin-left: -10px;"><img src="../<?php echo $gosterbize['logo']; ?>" width="70" height="70"/></div>

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
        <input class="btn btn-primary" type="submit" name="button" value="Düzenle"/>
    </p>
</form>
</div>
</div>
