<div class="widgetbox box-inverse">
                <h4 class="widgettitle">Oyuncular Listesi</h4>

    <table class="table table-bordered">
  <thead>
    <tr style="font-weight: bold;background-color: #fded00;">
      <td>No</td>
      <td>Ad Soyad</td>

      <td>Pozisyon</td>

      <td>Attığı Gol</td>

      <td>Değer</td>
      <td colspan="2">İşlemler</td>
    </tr>
    </thead>

    <tbody>

    <?php
    $sayfa = (isset($_GET["sayfa"])) ? $_GET["sayfa"] : "";
	if(!$sayfa) $sayfa = 1;
	$limit = 10;
	$ksayisi = mysql_num_rows(mysql_query("SELECT * FROM oyuncular"));
	$ssayisi = ceil($ksayisi / $limit);
	$baslangic = ($sayfa*$limit)-$limit;

  $calistir = mysql_query("select * from oyuncular order by id DESC LIMIT $baslangic, $limit") or die("Hata Olustu!");
  mysql_query("SET NAMES 'utf8'");
  while($oku=mysql_fetch_assoc($calistir))

  {
  ?>
   <tr>

     <td><?php echo $oku['numara']; ?></td>

      <td><?php echo stripslashes($oku['ad_soyad']); ?></td>

      <td><?php echo stripslashes($oku['pozisyon']); ?></td>

      <td> 0 </td>

      <td><?php echo $oku['deger']; ?></td>

      <td style="text-align: center;">
      <a href="admin.php?div=oyuncu-duzenle&id=<?php echo $oku['id']; ?>"><i class="fa fa-pencil-square-o" style="font-size: 20px;"></i></a>
      </td>

      <td style="text-align: center;"><a href="admin.php?div=oyuncu-sil&id=<?php echo $oku['id']; ?>"><i class="fa fa-trash-o" style="font-size: 20px;"></i></a></td>



    </tr>

  <?php } ?>
</tbody>
  </table>
  <?php

echo "</tr>"."</table>";
	echo " <div class='pagination'><ul>";
	if($sayfa>1){
			echo "<li class='disabled'><a href="."?div=oyuncular&sayfa=".($sayfa-1).">&laquo</a></li>";
		}
	for($i=1; $i<=$ksayisi; $i++){
		if($i<=$ssayisi){
			if($i==$sayfa){
				echo "<li class='active'><span>".$i."</span></li>";
			}else{
				echo "<li><a href='?div=oyuncular&sayfa=$i'>$i</a></li>";
			}
		}
	}
	if($sayfa != $ssayisi){
			echo "<li><a href="."?div=oyuncular&sayfa=".($sayfa+1).">&raquo</a></li>";
		}
	echo '</ul></div>';


?>

<div class="box-footer clearfix no-border">

     <a href="admin.php?div=oyuncu-ekle">
        <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Yeni Oyuncu Ekle</button>
    </a>
 </div>


</div>
