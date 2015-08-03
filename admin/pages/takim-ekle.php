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

    $dizin=     "../images/takim-logo/";

    if(in_array(strtolower($_FILES['resim']['type']),$uzanti)){

       move_uploaded_file($_FILES['resim']['tmp_name'],"./$dizin/$sayi-{$_FILES['resim']['name']}");

   }


   $takimadi = addslashes($_POST['takim_adi']);

   $takimadiseo = cevir($_POST['takim_adi']);

   $yil = addslashes($_POST['yil']);

   $yer = addslashes($_POST['yer']);

   $kurucular = addslashes($_POST['kurucular']);

   $ilkbaskan = addslashes($_POST['ilkbaskan']);

   $baskan = addslashes($_POST['baskan']);

   $merkez = addslashes($_POST['merkez']);

   $eposta = addslashes($_POST['eposta']);

   $telefon = addslashes($_POST['telefon']);

   $oyuncular = implode($_POST['oyuncular'],', ');


   if($_FILES['resim']['name'] == ''){

     $logo = "images/takim-logo/default.jpg";

 }else{

    $dizin2 = "images/takim-logo/";

    $logo = $dizin2.$sayi."-".$_FILES['resim']['name'];

}


mysql_query("insert into takimlar(takim_adi,takim_adiseo,yil,yer,kurucular,ilk_baskan,baskan,merkez,email,telefon,logo,oyuncular) values('$takimadi','$takimadiseo','$yil','$yer','$kurucular','$ilkbaskan','$baskan','$merkez','$eposta','$telefon','$logo','$oyuncular')",$baglanti) or die("Veri eklenemedi".mysql_error());

echo "

<div class='alert alert-success alert-dismissable'>

   <i class='fa fa-check'></i>

   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

   Takım başarılı bir şekilde eklendi.

</div>


";

header("Refresh:2, url=admin.php?div=takimlar");

}



?>

<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Takım Ekle</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" method="post" enctype="multipart/form-data">
            <p>
                <label>Takım Adı</label>
                <span class="field"><input type="text" name="takim_adi" id="firstname2" class="input-xxlarge" /></span>
            </p>

            <p>
                <label>Yıl</label>
                <span class="field"><input type="text" name="yil" id="firstname2" class="input-xxlarge" /></span>
            </p>

             <p>
                <label>Kurulduğu Yer</label>
                <span class="field"><input type="text" name="yer" id="firstname2" class="input-xxlarge" /></span>
            </p>

            <p>
                <label>Kurucular</label>
                <span class="field">
                   <input name="kurucular" id="tags" class="input-large" value="" />
               </span>
           </p>


            <p>
                <label>Oyuncular</label>
                <span class="field">

                           <select name="oyuncular[]" data-placeholder="Serbest Oyuncular..." class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4">

                           <?php
                                      $getirin = mysql_query("select * from oyuncular where kulub = 'serbest'");
                                      while($oku = mysql_fetch_array($getirin)){
                                ?>
                            <option value="<?php echo $oku['ad_soyadseo']; ?>"><?php echo $oku['ad_soyad']; ?></option>
                                 <?php } ?>
                     </select>

                            </span>
            </p>

            <p>
                <label>İlk Başkan</label>
                <span class="field"><input type="text" name="ilkbaskan" id="firstname2" class="input-xxlarge" /></span>
            </p>

             <p>
                <label>Başkan</label>
                <span class="field"><input type="text" name="baskan" id="firstname2" class="input-xxlarge" /></span>
            </p>

             <p>
                <label>Merkez</label>
                <span class="field"><input type="text" name="merkez" id="firstname2" class="input-xxlarge" /></span>
            </p>

             <p>
                <label>E Mail</label>
                <span class="field"><input type="text" name="eposta" id="firstname2" class="input-xxlarge" /></span>
            </p>

             <p>
                <label>Telefon</label>
                <span class="field"><input type="text" name="telefon" id="firstname2" class="input-xxlarge" /></span>
            </p>



           <p>
            <label>Takım Logo</label>
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
