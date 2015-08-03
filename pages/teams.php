  <div>
    <div class="col-md-9">


      <div class="haberler-sayfasi">

        <div class="news-header"> <h3><i class="fa fa-th-list"></i> Takımlar</h3></div>

        <?php

        $goster = mysql_query("select * from takimlar");

        while ($oku = mysql_fetch_array($goster)){
          ?>

          <div class="col-xs-6">
            <div class="oyuncu-liste">
             <a href="index.php?page=takim-detay&takim=<?php echo $oku['takim_adiseo'] ?>"><img src="<?php echo $oku['logo'] ?>" width="100" height="100"/></a>  <br/>
             <p><a href="index.php?page=takim-detay&takim=<?php echo $oku['takim_adiseo'] ?>"><?php echo $oku['takim_adi'] ?></a></p>

             <div class="oyuncu-adi">


              <table class="table">
                <tbody>
                  <?php


                  $metin= $oku['oyuncular'];
                  $yenimetin = explode(',',$metin);
                  foreach($yenimetin as $yazdir){
                    $oyuncukimki = mysql_query("select * from oyuncular where ad_soyadseo = '$yazdir'");

                    while ($gelsinbakalim = mysql_fetch_array($oyuncukimki)){
                      ?>
                      <tr>
                        <th scope="row"><?php echo $gelsinbakalim['numara'] ?></th>
                        <td>
                          <?php

                          $durumucek = $gelsinbakalim['durum'];

                          $yenidurum = explode(', ',$durumucek);

                          foreach($yenidurum as $durumyaz){
                            switch($durumyaz){

                              case "sakat":
                              echo "<div class='sakatlanmis-oyuncu'>Skt</div>";
                              break;

                              case "avp":
                              echo "<div class='yerli-oyuncu'>Avp</div>";
                              break;

                              case "yabanci":
                              echo "<div class='yabanci-oyuncu'>Avp</div>";
                              break;

                              case "hafifsakat":
                              echo "<div class='hafif-sakat'>Skt</div>";
                              break;


                            }
                          }

                          ?>


                        </td>
                        <td><?php echo $gelsinbakalim['ad_soyad']; ?></td>
                      </tr>

                      <?php }} ?>



                    </tbody>
                  </table>


                </div>
              </div>
            </div>

            <?php }} ?>


          </div>




        </div>

        <?php include "components/side-panel.php";?>
      </div>