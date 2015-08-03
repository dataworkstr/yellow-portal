<div>
<div class="col-md-9">


    <div class="oyuncular-sayfasi">

<div class="news-header"> <h3><i class="fa fa-th-list"></i> Statlar</h3></div>

      <script type="text/javascript">
            $(document).ready( function() {

                $('.statlar').hover( function() {
                    $(this).find('.statismi').slideToggle(300);
                });

            });
     </script>

    <?php
        $sahacekelim = mysql_query("select * from sahalar");

while($gostersahalari = mysql_fetch_array($sahacekelim)){
    ?>

     <div class="statlar">
         <a href="index.php?page=saha-detay&sahalar=<?php echo $gostersahalari['saha_adiseo']; ?>"><div class="statresmi" ><img src="<?php echo $gostersahalari['saha_resim']; ?>" class="img-responsive" height="150"/></div></a>
        <a href="index.php?page=saha-detay&sahalar=<?php echo $gostersahalari['saha_adiseo']; ?>"> <div class="statismi" style="display:none;"> <?php echo $gostersahalari['saha_adi']; ?> </div></a>
     </div>

        <?php } ?>




</div>

</div>

<?php include "components/side-panel.php";?>

</div>
