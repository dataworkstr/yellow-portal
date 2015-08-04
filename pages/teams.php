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
                  $yenimetin = explode(', ',$metin);
                  foreach($yenimetin as $yazdir){

                      $hangitakim = $oku['takim_adiseo'];
                    $oyuncukimki = mysql_query("select * from oyuncular where ad_soyadseo = '$yazdir' and kulub = '$hangitakim' order by pozisyon ASC");

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
                              echo "<div class='yabanci-oyuncu'>Ybn</div>";
                              break;

                              case "hafifsakat":
                              echo "<div class='hafif-sakat'>Skt</div>";
                              break;



                            }
                          }

                          ?>


                        </td>
                        <td><a href="index.php?page=oyuncu-detay&oyuncu=<?php echo $gelsinbakalim['ad_soyadseo']; ?>" class="oyuncu-linkleri-rengi"><?php echo $gelsinbakalim['ad_soyad']; ?></a></td>

                        <td style="width:70px;"><?php echo $gelsinbakalim['pozisyon']; ?></td>
                      </tr>

                      <?php }} ?>



                    </tbody>
                  </table>


                </div>
              </div>
            </div>

            <?php } ?>


                      <div class="col-xs-8 ortala">

                                  <div class="oyuncu-liste">
                                        <div class="oyuncu-adi">
                                                 <table class="table">
                                                    <tbody>


                                  <h1 class="serbest-oyuncular-basligi">Serbest Oyuncular</h1>

                                  <?php
                                    $bosoyuncucek = mysql_query("select * from oyuncular where kulub = 'Serbest' order by pozisyon ASC");

                                while($asdx = mysql_fetch_array($bosoyuncucek)){

                                  ?>


                                     <tr>
                        <th scope="row"><?php echo $asdx['numara'] ?></th>
                        <td>
                          <?php

                          $durumucek3 = $asdx['durum'];

                          $yenidurum2 = explode(', ',$durumucek3);

                          foreach($yenidurum2 as $durumyaz3){
                            switch($durumyaz3){

                              case "sakat":
                              echo "<div class='sakatlanmis-oyuncu'>Skt</div>";
                              break;

                              case "avp":
                              echo "<div class='yerli-oyuncu'>Avp</div>";
                              break;

                              case "yabanci":
                              echo "<div class='yabanci-oyuncu'>Ybn</div>";
                              break;

                              case "hafifsakat":
                              echo "<div class='hafif-sakat'>Skt</div>";
                              break;



                            }
                          }

                          ?>


                        </td>
                        <td><a href="index.php?page=oyuncu-detay&oyuncu=<?php echo $asdx['ad_soyadseo']; ?>" class="oyuncu-linkleri-rengi"><?php echo $asdx['ad_soyad']; ?></a></td>

                        <td><?php echo $asdx['pozisyon']; ?></td>
                      </tr>







                                  <?php } ?>

                                                     </tbody>
                                                </table>
                                          </div>

                                  </div>

                      </div>



          </div>




        </div>

        <?php include "components/side-panel.php";?>
      </div>
