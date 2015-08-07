<div>
  <div class="col-md-9">


    <div class="haberler-sayfasi">

      <div class="news-header"> <h3><i class="fa fa-newspaper-o"></i> Haberler</h3></div>
      <ul>

        <?php

        $sayfa = (isset($_GET["sayfa"])) ? $_GET["sayfa"] : "";
        if(!$sayfa) $sayfa = 1;
        $limit = 6;
        $ksayisi = mysql_num_rows(mysql_query("SELECT * FROM haberler"));
        $ssayisi = ceil($ksayisi / $limit);
        $baslangic = ($sayfa*$limit)-$limit;

        $habersayfasimenu = mysql_query("select * from haberler order by id DESC LIMIT $baslangic, $limit");

        while($okumenuhaber = mysql_fetch_array($habersayfasimenu)){
         ?>

         <li>
          <div class="haber-sayfasi-tek-haber">
            <a href="haber/<?php echo $okumenuhaber['haber_adiseo'] ?>" class="haberin-resmi"><img src="<?php echo $okumenuhaber['haber_resim'] ?>" width="194" height="88"/></a>
            <div class="anasayfa-haber-baslik">
              <a href="haber/<?php echo $okumenuhaber['haber_adiseo'] ?>"><?php echo stripslashes($okumenuhaber['haber_adi2']); ?></a><br/>
            </div>
            <div class="haber-text"><?php echo kisalt(stripslashes($okumenuhaber['haber_icerik']),100); ?> </div><div class="devami-butonu"><a href="haber/<?php echo $okumenuhaber['haber_adiseo'] ?>">Devamı..</a></div>

          </div>

        </li>
        <hr/>

        <?php } ?>



      </ul>








      <div class="sayfalama">
        <nav>
          <?php

          echo "<ul class='pagination'>";
          if($sayfa>1){
           echo "<li class='disabled'><a href="."?div=haberler&sayfa=".($sayfa-1).">&laquo</a></li>";
         }
         for($i=1; $i<=$ksayisi; $i++){
          if($i<=$ssayisi){
           if($i==$sayfa){
            echo "<li class='active'><span>".$i."</span></li>";
          }else{
            echo "<li><a href='?div=haberler&sayfa=$i'>$i</a></li>";
          }
        }
      }
      if($sayfa != $ssayisi){
       echo "<li><a href="."?div=haberler&sayfa=".($sayfa+1).">&raquo</a></li>";
     }
     echo '</ul>';


     ?>
   </nav>
 </div>

</div>


</div>

<?php include "components/side-panel.php";?>

</div>
