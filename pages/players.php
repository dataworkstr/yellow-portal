<div>
    <div class="col-md-9">


        <div class="oyuncular-sayfasi">

            <div class="news-header"> <h3><i class="fa fa-th-list"></i> Oyuncular</h3></div>


            <script type="text/javascript">
                $(document).ready( function() {

                    $('.oyuncu-liste2').hover( function() {
                        $(this).find('.oyuncu-adi-container').slideToggle(300);
                    });

                });
            </script>

            <?php

            $Macbookpro = mysql_query("select * from oyuncular order by ad_soyad ASC");

            while ($oyuncugoster = mysql_fetch_array($Macbookpro)){

                ?>
                <div class="oyuncu-liste2">
                   <div class="oyuncuresim"><a href="index.php?page=oyuncu-detay&oyuncu=<?php echo $oyuncugoster['ad_soyadseo'] ?>"><img src="<?php echo $oyuncugoster['oyuncu_photo'] ?>" width="105" height="120"></a> <br/>
                      <div class="oyuncu-adi-container" style="display:none;"><a href="index.php?page=oyuncu-detay&oyuncu=<?php echo $oyuncugoster['ad_soyadseo'] ?>" class="oyuncu-adison" ><?php echo $oyuncugoster['ad_soyad'] ?></a>                </div>
                  </div>
              </div>

              <?php } ?>






          </div>


      </div>

      <?php include "components/side-panel.php";?>

  </div>
