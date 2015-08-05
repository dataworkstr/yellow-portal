<?php
$Redbull = $_GET['anket'];

$oku = mysql_fetch_array(mysql_query("select * from anket where baslik_seo = '$Redbull'"));
?>
<div>
  <div class="col-md-9">


   <div class="haberler-sayfasi">

    <div class="news-header"> <h3><i class="fa fa-comments"></i> Anket Sonuçları</h3></div>




  <!--   <div class="oyuncu-detay-yazi">

      <?php echo $oku['deger1']; ?> : <?php echo $oku['deger1_say']; ?><br/>
      <?php echo $oku['deger2']; ?> : <?php echo $oku['deger2_say']; ?><br/>
      <?php echo $oku['deger3']; ?> : <?php echo $oku['deger3_say']; ?><br/>

    </div> -->


    <?php
    $b = $oku['deger1_say']+$oku['deger2_say']+$oku['deger3_say'];
    $deger1_yuzde = $oku['deger1_say']/$b*(100).'%';
    $deger2_yuzde = $oku['deger2_say']/$b*(100).'%';
    $deger3_yuzde = $oku['deger3_say']/$b*(100).'%';
    ?>

    <div class="progress">
      <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?php echo $deger1_yuzde; ?>;height:100px;">
       <?php echo $oku['deger1']
       ?>
     </div>
     <div class="progress-bar progress-bar-warning" role="progressbar" style="width:<?php echo $deger2_yuzde; ?>;height:100px;">
       <?php echo $oku['deger2']
       ?>
     </div>
     <div class="progress-bar progress-bar-danger" role="progressbar" style="width:<?php echo $deger3_yuzde; ?>;height:100px;">
      <?php echo $oku['deger3']
      ?>
    </div>
  </div>
</div>


</div>

<?php include "components/side-panel.php";?>

</div>

