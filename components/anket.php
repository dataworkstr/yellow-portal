 <div class="anket">
   <div class="news-header"><i class="fa fa-question"></i> Anket</div>

   <div class="anket-side">
     <div class="anket-title"> Haftanın oyuncusu kim ?<br/></div>
     <form method="post">

     <?php
         $cekelim = mysql_query("select * from oyuncular limit 3");

        while($neceksek = mysql_fetch_array($cekelim)){
     ?>
      <li><input type="radio" id="radio1" name="radio1" value="<?php echo $neceksek['ad_soyadseo']; ?>"/><?php echo $neceksek['ad_soyad']; ?><br/></li>
     <?php } ?>

      <p><input id="gonder" type="submit" value="Oyla"/></p>
    </form>
  </div>

  <span id="sonuc"></span>

</div>





  <script type="text/javascript">

  $('#gonder').click(function(){

  	var isim_degiskeni = $('#radio1').val();
  	var post_edilecek_veriler = isim_degiskeni;
  	$.ajax({
  		type:'POST',
  		url:'anketoyla.php',
  		data:post_edilecek_veriler,
  		success:function(cevap){
  			$("#sonuc").html(cevap);
  		}
  	});
  });
  </script>
