<?php
$Redbull = $_GET['anket'];
$oku = mysql_fetch_array(mysql_query("select * from anket where baslik_seo = '$Redbull'"));
?>
<div>
  <div class="col-md-9">
    <script type="text/javascript">
      $(function() {
        $(".knob").knob();
      });
    </script>
    <div class="haberler-sayfasi">
      <div class="news-header"> <h3><i class="fa fa-comments"></i> Anket Sonuçları</h3></div>
      <!--   <div class="oyuncu-detay-yazi">
        <?php echo $oku['deger1']; ?> : <?php echo $oku['deger1_say']; ?><br/>
        <?php echo $oku['deger2']; ?> : <?php echo $oku['deger2_say']; ?><br/>
        <?php echo $oku['deger3']; ?> : <?php echo $oku['deger3_say']; ?><br/>
      </div> -->
      <?php
      $b = $oku['deger1_say']+$oku['deger2_say']+$oku['deger3_say'];
      $deger1_yuzde = $oku['deger1_say']/$b*(100);
      $deger2_yuzde = $oku['deger2_say']/$b*(100);
      $deger3_yuzde = $oku['deger3_say']/$b*(100);
      ?>
      <h1 class="anket-sonuc-basligi"> <?php echo $oku['anket_baslik']; ?> </h1>
      <div class="row">
        <div class="col-md-3 col-sm-6" style="width: 220px;">
          <div class="knob-container" style="text-align: center; margin: 20px;">
            <input class="knob" data-width="140" data-min="0" data-max="100" data-displayPrevious="true" value="<?php echo round($deger1_yuzde); ?>" data-fgColor="#1d1d1d" data-readOnly=true; />
            <h3 class="text-muted text-center"><?php echo $oku['deger1']; ?></h3>
          </div>
        </div>
        <div class="col-md-3 col-sm-6" style="width: 220px;">
          <div class="knob-container" style="text-align: center; margin: 20px;color:#1d1d1d;">
            <input class="knob" data-width="140" data-min="0" data-max="100" data-displayPrevious="true" value="<?php echo round($deger2_yuzde); ?>" data-fgColor="#1d1d1d" data-readOnly=true;>
            <h3 class="text-muted text-center"><?php echo $oku['deger2']; ?></h3>
          </div>
        </div>
        <div class="col-md-3 col-sm-6" style="width: 220px;">
          <div class="knob-container" style="text-align: center; margin: 20px;color:#1d1d1d;">
            <input class="knob" data-width="140" data-min="0" data-max="100" data-displayPrevious="true" value="<?php echo round($deger3_yuzde); ?>" data-fgColor="#1d1d1d" data-readOnly=true;>
            <h3 class="text-muted text-center"><?php echo $oku['deger3']; ?></h3>
          </div>
        </div>
      </div>
      <h1 class="anket-oy-toplami">Toplam <?php echo $oku['deger1_say']+$oku['deger2_say']+$oku['deger3_say']; ?> kişi oy kullandı. </h1>
      <hr/>
      <h1 class="anket-sonuc-basligi"><i class="fa fa-folder-open"></i> Eski Anketler </h1><br/>
      <?php
      $eskilericek = mysql_query("select * from anket");
      while($eskilerdenkimkaldi = mysql_fetch_array($eskilericek)){
        ?>
        <?php  if($eskilerdenkimkaldi['baslik_seo'] == $Redbull) { continue;}else{  ?>
        <ul>
          <li><?php echo $eskilerdenkimkaldi['anket_baslik']; ?><?php echo "<div style='text-align: center; margin-top: 40px;'><p><a href='index.php?page=anket-sonucu&anket=".$eskilerdenkimkaldi['baslik_seo']."' id='gonder'>Sonuçlar</a></p></div>"; ?></li>
        </ul>
        <?php } } ?>
      </div>
    </div>
    <?php include "components/side-panel.php";?>
  </div>
