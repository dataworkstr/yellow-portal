<div class="news-home-container">
    <div class="news-header"> <h3><i class="fa fa-newspaper-o"></i> Haberler</h3></div>
    <div class="news-inner-container">
        <ul>

         <?php

           $habercekalti = mysql_query("select * from haberler order by id DESC limit 6");

        while($okualti = mysql_fetch_array($habercekalti)){
            ?>

            <li>
                <div class="news-home-single">
                    <a href="index.php?page=<?php echo $okualti['haber_adiseo'] ?>"><img src="<?php echo $okualti['haber_resim'] ?>" width="194" height="88"/></a>
                    <div class="anasayfa-haber-baslik">
                        <a href="#"><?php echo stripslashes($okualti['haber_adi2']); ?></a><br/>
                    </div>
                    <div class="haber-text"><?php echo kisalt(stripslashes($okualti['haber_icerik']),78); ?></div><div class="devami-butonu"><a href="index.php?page=<?php echo $okualti['haber_adiseo'] ?>">Devamı..</a></div>

                </div>
            </li>
            <?php } ?>


        </ul>
    </div>
    <div class="haber-devami-git">
        <a href="index.php?page=news">
            <i class="fa fa-chevron-circle-right"></i>
            Tüm haberleri görüntülemek için tıklayın
        </a>
    </div>
</div>
