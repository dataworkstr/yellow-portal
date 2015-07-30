<div>
    <div class="col-md-9">

        <?php

        $enginx = $_GET['haber'];

        $haberimioku = mysql_fetch_array(mysql_query("select * from haberler where haber_adiseo = '$enginx'"));


        ?>

        <meta property="og:title" content="<?php echo $haberimioku['haber_adi2']; ?>" />
        <meta property="og:type" content="<?php echo $haberimioku['haber_icerik']; ?>" />
        <meta property="og:image" content="<?php echo $haberimioku['haber_resim']; ?>" />
        <meta property="og:url" content="index.php?page=haber-detay&haber=<?php echo $haberimioku['haber_adiseo']; ?>" />
        <meta property="og:description" content="" />

        <div class="haberler-sayfasi">

            <div class="news-header"> <h3><i class="fa fa-newspaper-o"></i> <?php echo stripslashes($haberimioku['haber_adi2']); ?></h3></div>


            <div class="haber-detayi-kapsa">
                <div class="haber-detay-resim"><img src="<?php echo $haberimioku['haber_resim']; ?>" width="623" height="283"/></div>
                <div class="haber-detay-baslik">
                    <a href="#"><?php echo stripslashes($haberimioku['haber_adi2']); ?></a><br/>
                </div>

                <div class="haber-zamani"><i class="fa fa-user"></i><?php echo $haberimioku['haber_uye']; ?> &nbsp;&nbsp;&nbsp; <i class="fa fa-calendar"></i><?php $zamanci = $haberimioku['haber_tarih']; echo  Zamagoster($zamanci); ?>
                </div>

                <div class="haber-detay-yazi">

                    <strong><?php echo stripslashes($haberimioku['haber_adi']); ?></strong><br/>
                    <?php echo stripslashes($haberimioku['haber_icerik']); ?>
                </div>


                <div class="haber-detay-footer">
                    <div class="haber-detay-footer-etiketi"> <b class="etiket">Etiketler :</b> <?php echo $haberimioku['haber_etiket']; ?></div>

                     <div class="paylasmaseyleri">
                         <script type="text/javascript">var switchTo5x=true;</script>
                        <script type="text/javascript" src="js/sharebuttons.js"></script>
                        <script type="text/javascript">stLight.options({publisher: "b0c8696e-3fa0-417d-9bc4-913514b367d6", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

                        <span class='st_facebook_large' displayText='Facebook'></span>
                        <span class='st_twitter_large' displayText='Tweet'></span>
                        <span class='st_whatsapp_large' displayText='WhatsApp'></span>
                        <span class='st_email_large' displayText='Email'></span>

                     </div>

                </div>



                <div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'yellowbulls';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>


            </div>







        </div>


    </div>

    <?php include "components/side-panel.php";?>

</div>
