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
       <a href="index.php?page=takim-detay&takim=<?php echo $oku['takim_adiseo'] ?>"><img src="images/fenerlogo.png" width="100" height="100"/></a>  <br/>
       <p><a href="index.php?page=takim-detay&takim=<?php echo $oku['takim_adiseo'] ?>"><?php echo $oku['takim_adi'] ?></a></p>

        <div class="oyuncu-adi">


            <table class="table">

                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td><div class="sakatlanmis-oyuncu">Skt</div></td>
                          <td>OZAN</td>
                        </tr>

                        <tr>
                          <th scope="row">2</th>
                          <td><div class="yabanci-oyuncu">Ybn</div></td>
                          <td>RONALDO</td>
                        </tr>

                           <tr>
                          <th scope="row">2</th>
                          <td><div class="yerli-oyuncu">Avp</div></td>
                          <td>RONALDO</td>
                        </tr>

                      </tbody>
            </table>


        </div>
    </div>
        </div>

        <?php } ?>


</div>




</div>

<?php include "components/side-panel.php";?>

</div>
