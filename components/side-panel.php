<div class="col-md-3">

  <div class="maclar">
    <div class="news-header">
      <i class="fa fa-bullhorn"></i>
      <span> Son Maçlar</span>
      <div class="son-maclar-ikon">
        <i class="fa fa-chevron-left"></i>
        <i class="fa fa-chevron-right"></i>
      </div>
    </div>

       <?php

        $api_url="http://api.openweathermap.org/data/2.5/forecast/?id=745044&lang=tr";
        $weather_data = file_get_contents($api_url);
        $json = json_decode($weather_data, TRUE);


        foreach($json['list']as $k){

        if($k['dt_txt']=="2015-08-07 21:00:00")
        {
            $hava_durumu = substr($k['main']['temp'],0,2);

            $nasilhavalaroralarda =  $k['weather'][0]['main'];

            switch($nasilhavalaroralarda){

                case "Clouds" :
                $nasılhavalaroralarda2 = "Bulutlu";
                $nekihava = "fa fa-cloud";
                break;

                default:
                $nasılhavalaroralarda2 = $nasilhavalaroralarda;
                $nekihava = "fa fa-sun-o";
                break;

            }
        }

        }





   ?>


    <div class="mac-detayi" style="display:none;">
      <div class="takimlar">
        <span>Körükspor</span> - <span>AAÜ Ejderhaspor</span>
      </div>
      <div class="sol-logo"><img src="images/fenerlogo.png" width="60" height="60"/></div>
      <div class="skor">6 - 0</div>
      <div class="sag-logo"><img src="images/fenerlogo.png" width="60" height="60"/></div>
      <div class="mac-bilgi">
       <i class="fa fa-calendar-o"></i>  <span>19 Temmuz 2015</span> - <span>19:07</span><br/>
       <i class="fa fa-globe"></i> <span>Gültepe Arena</span>  <i class="fa"></i>/<i class="fa"></i>   <i class="<?php echo $nekihava;?>"></i><span><?php echo $hava_durumu; ?></span>°&nbsp;<span><?php echo $nasılhavalaroralarda2; ?></span>
     </div>
     <hr/>
   </div>




   <div class="mac-detayi" style="display:none;">
    <div class="takimlar">
      <span>Körükspor</span> - <span>AAÜ Ejderhaspor</span>
    </div>
    <div class="sol-logo"><img src="images/fenerlogo.png" width="60" height="60"/></div>
    <div class="skor">0 - 0</div>
    <div class="sag-logo"><img src="images/fenerlogo.png" width="60" height="60"/></div>
    <div class="mac-bilgi">
     <i class="fa fa-calendar-o"></i>  <span>19 Temmuz 2015</span> - <span>19:07</span><br/>
     <i class="fa fa-globe"></i> <span>Gültepe Arena</span>  <i class="fa"></i>/<i class="fa"></i>   <i class="fa fa-sun-o"></i><span>34°</span>&nbsp;<span>Güneşli</span>
   </div>
   <hr/>
 </div>
 <div class="mac-detayi" style="display:none;">
  <div class="takimlar">
    <span>Körükspor</span> - <span>AAÜ Ejderhaspor</span>
  </div>
  <div class="sol-logo"><img src="images/fenerlogo.png" width="60" height="60"/></div>
  <div class="skor">1 - 0</div>
  <div class="sag-logo"><img src="images/fenerlogo.png" width="60" height="60"/></div>
  <div class="mac-bilgi">
   <i class="fa fa-calendar-o"></i>  <span>19 Temmuz 2015</span> - <span>19:07</span><br/>
   <i class="fa fa-globe"></i> <span>Gültepe Arena</span>  <i class="fa"></i>/<i class="fa"></i>   <i class="fa fa-sun-o"></i><span>34°</span>&nbsp;<span>Güneşli</span>
 </div>
 <hr/>
</div>

<div class="mac-detayi" style="display:none;">
  <div class="takimlar">
    <span>Körükspor</span> - <span>AAÜ Ejderhaspor</span>
  </div>
  <div class="sol-logo"><img src="images/fenerlogo.png" width="60" height="60"/></div>
  <div class="skor">2 - 0</div>
  <div class="sag-logo"><img src="images/fenerlogo.png" width="60" height="60"/></div>
  <div class="mac-bilgi">
   <i class="fa fa-calendar-o"></i>  <span>19 Temmuz 2015</span> - <span>19:07</span><br/>
   <i class="fa fa-globe"></i> <span>Gültepe Arena</span>  <i class="fa"></i>/<i class="fa"></i>   <i class="fa fa-sun-o"></i><span>34°</span>&nbsp;<span>Güneşli</span>
 </div>
 <hr/>
</div>
<div class="mac-detayi avrupa" style="display:none;">
  <div class="takimlar">
    <span>Körükspor</span> - <span>AAÜ Ejderhaspor</span>
  </div>
  <div class="sol-logo"><img src="images/fenerlogo.png" width="60" height="60"/></div>
  <div class="skor">99 - 99</div>
  <div class="sag-logo"><img src="images/fenerlogo.png" width="60" height="60"/></div>
  <div class="mac-bilgi">
   <i class="fa fa-calendar-o"></i>  <span>19 Temmuz 2015</span> - <span>19:07</span><br/>
   <i class="fa fa-globe"></i> <span>Gültepe Arena</span>  <i class="fa"></i>/<i class="fa"></i>   <i class="fa fa-sun-o"></i><span>34°</span>&nbsp;<span>Güneşli</span>
 </div>
 <hr/>
</div>



<div class="mac-devami-git"> <a href="#"><i class="fa fa-chevron-circle-right"></i> Tüm maçları görüntülemek için tıklayın..</a></div>





</div>

<?php include "anket.php"; ?>


<div class="puantablosu">
 <div class="news-header"><i class="fa fa-table"></i> Puan Tablosu</div>
 <table class="table">
  <thead>
    <tr>
      <th>Takım Adı</th>
      <th>G</th>
      <th>B</th>
      <th>M</th>
      <th>P</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Körükspor</td>
      <td>3</td>
      <td>0</td>
      <td>2</td>
      <td>9</td>
    </tr>
    <tr>
      <td>AAÜ Ejderhaspor</td>
      <td>3</td>
      <td>0</td>
      <td>2</td>
      <td>9</td>
    </tr>
  </tbody>
</table>
</div>
<div class="puantablosu2">

  <div class="news-header"><i class="fa fa-futbol-o"></i> Gol Krallığı</div>

  <table class="table">
    <thead>
      <tr>
        <th>İsim</th>
        <th>Gol</th>
        <th>Oran</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Can Ağırkaya</td>
        <td>9</td>
        <td>1.23</td>
      </tr>
      <tr>
        <td>Oytun Yüksel</td>
        <td>6</td>
        <td>1.23</td>
      </tr>
      <tr>
        <td>Ozan Umut Şimşek</td>
        <td>9</td>
        <td>1.23</td>
      </tr>
      <tr>
        <td>Ozan Umut Şimşek</td>
        <td>9</td>
        <td>1.23</td>
      </tr>
      <tr>
        <td>Ozan Umut Şimşek</td>
        <td>9</td>
        <td>1.23</td>
      </tr>

    </tbody>
  </table>

</div>




</div>
