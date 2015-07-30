<div>
    <div class="col-md-9">

        <?php

        $enginx = $_GET['haber'];

        $haberimioku = mysql_fetch_array(mysql_query("select * from haberler where haber_adiseo = '$enginx'"));


        ?>
        <div class="haberler-sayfasi">

            <div class="news-header"> <h3><i class="fa fa-newspaper-o"></i> <?php echo stripslashes($haberimioku['haber_adi2']); ?></h3></div>


            <div class="haber-detayi-kapsa">
                <div class="haber-detay-resim"><img src="<?php echo $haberimioku['haber_resim']; ?>" width="623" height="283"/></div>
                <div class="haber-detay-baslik">
                    <a href="#"><?php echo stripslashes($haberimioku['haber_adi2']); ?></a><br/>
                </div>

                <div class="haber-zamani"><i class="fa fa-user"></i><?php echo $haberimioku['haber_uye']; ?> &nbsp;&nbsp;&nbsp; <i class="fa fa-calendar"></i><?php $zamanci = $haberimioku['haber_tarih']; echo  Zamagoster($zamanci); ?></div>

                <div class="haber-detay-yazi">

                    <strong><?php echo stripslashes($haberimioku['haber_adi']); ?></strong><br/>
                    <?php echo stripslashes($haberimioku['haber_icerik']); ?>
                </div>


                <div class="haber-detay-footer">
                    <div class="haber-detay-footer-etiketi"> <b class="etiket">Etiketler :</b> <?php echo $haberimioku['haber_etiket']; ?></div>
                    <div class="paylasmaseyleri"><a href="#"><img src="images/facebook-share.png" width="150" height="36"/></a>  <a href="#"><img src="images/twitter-share.png" width="150" height="36"/></a></div>
                </div>


            </div>







        </div>


    </div>

    <?php include "components/side-panel.php";?>

</div>
