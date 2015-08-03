<div>
<div class="col-md-9">

    <?php

        $ticket = $_GET['takim'];

        $oku = mysql_fetch_array(mysql_query("select * from takimlar where takim_adiseo = '$ticket'"));

    ?>

    <div class="haberler-sayfasi">

<div class="news-header"> <h3><i class="fa fa-th-list"></i> Takım Detayı</h3></div>

    <div class="col-xs-12">

            <img src="<?php echo $oku['logo']; ?>" width="200" height="200"/><br/>


    </div>

<div class="col-xs-6">
<div class="oyuncu-liste">


        <div class="takim-detayi-sayfasi">
            <h1><div class="baslik-yani-uzatici"></div>Kulüp Bilgileri</h1><hr/>
                <ul>
                    <li><label>Kuruluş Yılı :</label> <?php echo $oku['yil']; ?></li>
                    <li><label>Kurulduğu Yer :</label> <?php echo $oku['yer']; ?></li>
                    <li><label>Kurucular :</label> <?php echo $oku['kurucular']; ?></li>
                    <li><label>İlk Başkan :</label> <?php echo $oku['ilk_baskan']; ?></li>
                </ul>

        </div>
    </div>
        </div>

         <div class="col-xs-6">
             <div class="oyuncu-liste">


        <div class="takim-detayi-sayfasi">
            <h1><div class="baslik-yani-uzatici"></div>Güncel Bilgiler</h1><hr/>

                <ul>
                    <li><label>Başkan :</label> <?php echo $oku['baskan']; ?></li>
                    <li><label>Merkez :</label> <?php echo $oku['merkez']; ?></li>
                    <li><label>E-Mail :</label> <?php echo $oku['email']; ?></li>
                    <li><label>Telefon :</label> <?php echo $oku['telefon']; ?></li>
                </ul>



        </div>
    </div>
        </div>


</div>




</div>

<?php include "components/side-panel.php";?>

</div>
