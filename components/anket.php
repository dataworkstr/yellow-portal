 <div class="anket">
   <div class="news-header"><i class="fa fa-question"></i> Anket</div>

   <div class="anket-side">



     <?php

    if(!$_POST['gonder']){
         $cekelim = mysql_query("select * from anket where anasayfa = 1");

        $neceksek = mysql_fetch_array($cekelim);

        echo "<div class='anket-title'>".$neceksek['anket_baslik']."<br/></div>";

        echo "<form method='post'>";

        echo  "<li><input type='radio' id='oyuncu' name='oyuncu' value='".$neceksek['deger1']."'/>".$neceksek['deger1']."<br/></li>";

        echo  "<li><input type='radio' id='oyuncu' name='oyuncu' value='".$neceksek['deger2']."'/>".$neceksek['deger2']."<br/></li>";

        echo  "<li><input type='radio' id='oyuncu' name='oyuncu' value='".$neceksek['deger3']."'/>".$neceksek['deger3']."<br/></li>";

      echo "<p><input id='gonder' name='gonder' type='submit' value='Oyla'/><a href='#' id='gonder'>Sonuçlar</a></p>";

    }else{

        $oylanankisi = $_POST['oyuncu'];

        $getirinbakalim = mysql_query("select * from anket");

        while($oku = mysql_fetch_array($getirinbakalim)){

            if($oku['deger1'] == $oylanankisi){

                $toplagelsin = $oku['deger1_say']+1;

                mysql_query("update anket set deger1_say ='$toplagelsin' ",$baglanti) or die("Veri güncellenemedi".mysql_error());

            }else if($oku['deger2'] == $oylanankisi){

                $toplagelsin2 = $oku['deger2_say']+1;

                mysql_query("update anket set deger2_say ='$toplagelsin2' ",$baglanti) or die("Veri güncellenemedi".mysql_error());

            }else if($oku['deger3'] == $oylanankisi){

                $toplagelsin3 = $oku['deger3_say']+1;

                mysql_query("update anket set deger3_say ='$toplagelsin3' ",$baglanti) or die("Veri güncellenemedi".mysql_error());

            }

        }

        echo "<div class='oylama-success'><i class='fa fa-check-circle'></i> Oyunuz başarılı bir şekilde gönderildi.</div>";
           echo "<div style='text-align: center; margin-top: 40px;'><p><a href='#' id='gonder'>Sonuçlar</a></p></div>";

        }



     ?>




    </form>



  </div>



</div>





