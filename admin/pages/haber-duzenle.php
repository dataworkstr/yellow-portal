
<?php
$kiminki2 = $_GET['id'];
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

   $haber_baslikseo = cevir(addslashes($_POST['baslik']));

   $haberuye = $_SESSION["username"];

   if($_FILES['resim']['name'] == ''){

     $haber_resim = $_POST['resim2'];

 }else{

    $dizin2 = "images/haber-resimleri/";

    $haber_resim = $dizin2.$sayi."-".$_FILES['resim']['name'];

}


mysql_query("update haberler set
    haber_adi = '$haber_baslik',
    haber_adiseo = '$haber_baslikseo',
    haber_resim = '$haber_resim',
    haber_icerik = '$icerik',
    haber_etiket = '$etiket',
    haber_uye = '$haberuye',
    haber_adi2 = '$haber_baslik2' where id = '$kiminki2' ",$baglanti) or die("Veri eklenemedi".mysql_error());

echo "

<div class='alert alert-success alert-dismissable'>

   <i class='fa fa-check'></i>

   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

   Haber başarılı bir şekilde düzenlendi.

</div>


";

header("Refresh:2, url=admin.php?div=haberler");

}



?>

<?php
$kiminki = $_GET['id'];
$oku = mysql_fetch_array(mysql_query("select * from haberler where id='$kiminki'"));
?>

<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Haber Düzenle</h4>
    <div class="widgetcontent nopadding">
        <form class="stdform stdform2" method="post" enctype="multipart/form-data">
            <p>
                <label>Haber Üst Başlık</label>
                <span class="field"><input type="text" name="baslik" id="firstname2" class="input-xxlarge" value="<?php echo $oku['haber_adi']; ?>"/></span>
            </p>

            <p>
                <label>Haber Alt Başlık</label>
                <span class="field"><input type="text" name="baslik2" id="firstname2" class="input-xxlarge" value="<?php echo $oku['haber_adi2']; ?>"/></span>
            </p>

            <p>
                <label>Haber İçeriği</label>
                <span class="field"><textarea type="text" name="icerik" id="lastname2" class="input-xxlarge" style="height: 300px;"><?php echo $oku['haber_icerik']; ?></textarea></span>
            </p>

            <p>
                <label>Etiket</label>
                <span class="field">
                   <input name="tags" id="tags" class="input-large" value="<?php echo $oku['haber_etiket']; ?>" />
               </span>
           </p>

           <p>
            <label>Haber Resim</label>
            <input name="resim2" value="<?php echo $oku['haber_resim']; ?>" style="display:none;"/>
            <div class="field">
                <div style="float:left;margin-right: 20px;margin-top: -10px;margin-bottom: -10px;margin-left: -10px;"><img src="../<?php echo $oku['haber_resim']; ?>" width="70" height="70"/></div>

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
