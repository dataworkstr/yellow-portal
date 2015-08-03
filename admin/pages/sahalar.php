<?php
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>
               <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Sahalar Listesi</h4>

    <table class="table table-bordered">
  <thead>
    <tr style="font-weight: bold;background-color: #fded00;">
      <td>#</td>
      <td>Saha Adı</td>

      <td>Kapasite</td>

      <td>Boyut</td>

      <td colspan="2">İşlemler</td>
    </tr>
    </thead>

    <tbody>

    <?php
    $sayfa = (isset($_GET["sayfa"])) ? $_GET["sayfa"] : "";
	if(!$sayfa) $sayfa = 1;
	$limit = 10;
	$ksayisi = mysql_num_rows(mysql_query("SELECT * FROM sahalar"));
	$ssayisi = ceil($ksayisi / $limit);
	$baslangic = ($sayfa*$limit)-$limit;

  $calistir = mysql_query("select * from sahalar order by id DESC LIMIT $baslangic, $limit") or die("Hata Olustu!");
  mysql_query("SET NAMES 'utf8'");
  while($oku=mysql_fetch_assoc($calistir))

  {
  ?>
   <tr>

     <td><?php echo $oku['id']; ?></td>

      <td><?php echo stripslashes($oku['saha_adi']); ?></td>

      <td><?php echo stripslashes($oku['saha_kapasite']); ?></td>

      <td><?php echo $oku['saha_boyut']; ?></td>

      <td style="text-align: center;">
      <a href="admin.php?div=saha-duzenle&id=<?php echo $oku['id']; ?>"><i class="fa fa-pencil-square-o" style="font-size: 20px;"></i></a>
      </td>

      <td style="text-align: center;"><a href="admin.php?div=saha-sil&id=<?php echo $oku['id']; ?>"><i class="fa fa-trash-o" style="font-size: 20px;"></i></a></td>



    </tr>

  <?php } ?>
</tbody>
  </table>
  <?php

echo "</tr>"."</table>";
	echo " <div class='pagination'><ul>";
	if($sayfa>1){
			echo "<li class='disabled'><a href="."?div=sahalar&sayfa=".($sayfa-1).">&laquo</a></li>";
		}
	for($i=1; $i<=$ksayisi; $i++){
		if($i<=$ssayisi){
			if($i==$sayfa){
				echo "<li class='active'><span>".$i."</span></li>";
			}else{
				echo "<li><a href='?div=sahalar&sayfa=$i'>$i</a></li>";
			}
		}
	}
	if($sayfa != $ssayisi){
			echo "<li><a href="."?div=sahalar&sayfa=".($sayfa+1).">&raquo</a></li>";
		}
	echo '</ul></div>';


?>

<div class="box-footer clearfix no-border">

     <a href="admin.php?div=saha-ekle">
        <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Yeni Saha Ekle</button>
    </a>
 </div>


</div>
