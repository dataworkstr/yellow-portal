<div>
  <div class="col-md-9">

    <?php
        $iskendercek = $_GET['sahalar'];

        $gosterbanaiskenderi = mysql_fetch_array(mysql_query("select * from sahalar where saha_adiseo = '$iskendercek'"));
    ?>

    <div class="haberler-sayfasi">

      <div class="news-header"> <h3><i class="fa fa-newspaper-o"></i> Saha Bilgileri</h3></div>



      <div class="saha-resim-ust">
        <img src="<?php echo $gosterbanaiskenderi['saha_resim'] ?>" class="img-responsive" />
      </div>

      <div class="saha-detaylari-alt">

       <div class="saha-detaylari-alt-yan1">
         <h1><div class="baslik-yani-uzatici"></div>Saha Bilgileri</h1>
         <hr/>

         <ul>
           <li><label>Seyirci Kapasitesi :</label> <?php echo $gosterbanaiskenderi['saha_kapasite'] ?></li>
           <li><label>Oyun Alanı Ölçüsü :</label> <?php echo $gosterbanaiskenderi['saha_boyut'] ?></li>
           <li><label>Zemin Türü :</label> <?php echo $gosterbanaiskenderi['saha_zemin'] ?></li>
           <li><label>Işıklandırma :</label> <?php echo $gosterbanaiskenderi['saha_isiklandirma'] ?></li>
           <li><label>Koltuklandırma :</label> <?php echo $gosterbanaiskenderi['saha_koltuklandirma'] ?></li>
           <li><label>Diğer Bilgiler :</label> <?php echo $gosterbanaiskenderi['saha_digerbilgiler'] ?></li><br/>
           <li><label>Adres :</label> <?php echo $gosterbanaiskenderi['saha_adres'] ?></li>
         </ul>

       </div>

       <div class="saha-detaylari-alt-yan1">
         <h1><div class="baslik-yani-uzatici"></div>Son Yapılan Maçlar</h1>
         <hr/>

         <ol>
           <li> Körükspor <span>1 - 0</span> AAÜ Ejderhaspor </li>
           <li> AAÜ Ejderhaspor <span>2 - 2</span>  Körükspor</li>
           <li> Körükspor <span>3 - 1</span> AAÜ Ejderhaspor </li>
           <li> AAÜ Ejderhaspor <span>5 - 3</span> Körükspor </li>
         </ol>

       </div>

       <div class="saha-linki">
        <a href="<?php echo $gosterbanaiskenderi['saha_link'] ?>">Websitesi için tıklayın</a>
      </div>

    </div>







  </div>


</div>

<?php include "components/side-panel.php";?>

</div>
