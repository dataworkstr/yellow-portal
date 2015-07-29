<div class="widgetbox box-inverse">
                <h4 class="widgettitle">Çöp Haber Listesi <a href="admin.php?div=haberler" class="btn btn-default pull-right" style="float:right;margin-top: -7px;"><i class="fa fa-arrow-circle-left"></i> Geri Dön</a></h4>

    <table class="table table-bordered">
  <thead>
    <tr>
      <td>#</td>
      <td>Haber Başlığı 1</td>

      <td>Haber Başlığı 2</td>

      <td>Tarih</td>

      <td>Üye</td>
      <td>İşlemler</td>
    </tr>
    </thead>

    <tbody>

    <?php
    $sayfa = (isset($_GET["sayfa"])) ? $_GET["sayfa"] : "";
	if(!$sayfa) $sayfa = 1;
	$limit = 5;
	$ksayisi = mysql_num_rows(mysql_query("SELECT * FROM haberler"));
	$ssayisi = ceil($ksayisi / $limit);
	$baslangic = ($sayfa*$limit)-$limit;

  $calistir = mysql_query("select * from haberlercop order by id DESC LIMIT $baslangic, $limit") or die("Hata Olustu!");
  mysql_query("SET NAMES 'utf8'");
  while($oku=mysql_fetch_assoc($calistir))

  {
  ?>
   <tr>

     <td><?php echo $oku['id']; ?></td>

      <td><?php echo $oku['haber_adi']; ?></td>

      <td><?php echo $oku['haber_adi2']; ?></td>

      <td><?php echo $oku['haber_tarih']; ?></td>

      <td><?php echo $oku['haber_uye']; ?></td>

      <td>
      <a href="admin.php?div=haber-geri-al&id=<?php echo $oku['id']; ?>"><i class="fa fa-undo" style="font-size: 20px;"></i></a>
      </td>




    </tr>

  <?php } ?>
</tbody>
  </table>
  <?php

echo "</tr>"."</table>";
	echo " <div class='pagination'><ul>";
	if($sayfa>1){
			echo "<li class='disabled'><a href="."?div=haberler&sayfa=".($sayfa-1).">&laquo</a></li>";
		}
	for($i=1; $i<=$ksayisi; $i++){
		if($i<=$ssayisi){
			if($i==$sayfa){
				echo "<li class='active'><span>".$i."</span></li>";
			}else{
				echo "<li><a href='?div=cophaberler&sayfa=$i'>$i</a></li>";
			}
		}
	}
	if($sayfa != $ssayisi){
			echo "<li><a href="."?div=cophaberler&sayfa=".($sayfa+1).">&raquo</a></li>";
		}
	echo '</ul></div>';


?>


</div>
