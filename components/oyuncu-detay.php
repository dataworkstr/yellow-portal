<?php
$Redbull = $_GET['oyuncu'];
$oku = mysql_fetch_array(mysql_query("select * from oyuncular where
  ad_soyadseo = '$Redbull'"));
  ?>
  <div>
    <div class="col-md-9">
      <div class="haberler-sayfasi">
        <div class="news-header"> <h3><i class="fa fa-newspaper-o"></i> Oyuncu
          Bilgileri</h3></div>
          <div class="oyuncu-sol-resim">
            <img src="<?php echo $oku['oyuncu_photo']; ?>" width="246"
            height="300"/>
          </div>
          <div class="oyuncu-detay-yazi">
            <h1><?php echo $oku['ad_soyad']; ?></h1>
            <b><div class="baslik-yani-uzatici"></div>Kişisel Bilgiler</b>
            <hr/>
            <ul>
              <li>  <label>Doğum Yeri :</label> <?php echo $oku['dogum_yeri'];
                ?></li>
                <li>  <label>Boy :</label> <?php echo $oku['boy']; ?> cm</li>
                <li>  <label>Kilo :</label> <?php echo $oku['kilo']; ?> kg</li>
                <li>  <label>Yaş :</label> <?php echo $oku['yas']; ?></li>
                <li>  <label>Doğum Tarihi :</label> <?php echo $oku['dogum_tarihi'];
                  ?></li>
                  <li>  <label>Uyruk :</label> <?php echo $oku['uyruk']; ?></li>
                </ul>
                <br/><br/>
                <b><div class="baslik-yani-uzatici"></div>Lisans Bilgileri</b>
                <hr/>
                <ul class="yanindaformaresmi">
                  <li>  <label>Kulübü :</label><?php $hangisi = $oku['kulub']; $gosterbanayuzunu = mysql_fetch_array(mysql_query("select * from takimlar where takim_adiseo = '$hangisi'"));  echo $gosterbanayuzunu['takim_adi'];  ?></li>
                  <li>  <label>Pozisyon :</label> <?php $sonpoz = explode(",",$oku['pozisyon']); echo $sonpoz[1] ?></li>
                  <li>  <label>Değer :</label> <?php echo $oku['deger']; ?> $</li>
                </ul>
                <div id="formadanumaram"><?php echo $oku['numara']; ?></div>
              </div>
            </div>
          </div>
          <?php include "components/side-panel.php";?>
        </div>
