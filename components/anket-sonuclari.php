<?php
$Redbull = $_GET['anket'];

$oku = mysql_fetch_array(mysql_query("select * from anket where baslik_seo = '$Redbull'"));
    ?>
    <div>
        <div class="col-md-9">


           <div class="haberler-sayfasi">

            <div class="news-header"> <h3><i class="fa fa-comments"></i> Anket Sonuçları</h3></div>




               <div class="oyuncu-detay-yazi">

                    <?php echo $oku['deger1']; ?> : <?php echo $oku['deger1_say']; ?><br/>
                    <?php echo $oku['deger2']; ?> : <?php echo $oku['deger2_say']; ?><br/>
                    <?php echo $oku['deger3']; ?> : <?php echo $oku['deger3_say']; ?><br/>

               </div>






               </div>


           </div>

           <?php include "components/side-panel.php";?>

       </div>

