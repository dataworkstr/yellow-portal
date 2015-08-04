<?php
include "../ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>
               <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Anket Listesi</h4>

    <table class="table table-bordered">
  <thead>
    <tr style="font-weight: bold;background-color: #fded00;">
      <td>#</td>
      <td>Anket Başlığı</td>

      <td colspan="2">İşlemler</td>
    </tr>
    </thead>

    <tbody>

    <?php
    $sayfa = (isset($_GET["sayfa"])) ? $_GET["sayfa"] : "";
	if(!$sayfa) $sayfa = 1;
	$limit = 10;
	$ksayisi = mysql_num_rows(mysql_query("SELECT * FROM haberler"));
	$ssayisi = ceil($ksayisi / $limit);
	$baslangic = ($sayfa*$limit)-$limit;

  $calistir = mysql_query("select * from anketler order by id DESC LIMIT $baslangic, $limit") or die("Hata Olustu!");
  mysql_query("SET NAMES 'utf8'");
  while($oku=mysql_fetch_assoc($calistir))

  {
  ?>
   <tr>

     <td><?php echo $oku['id']; ?></td>

      <td><?php echo $oku['anket_baslik']; ?></td>

      <td style="text-align: center;">
      <a href="admin.php?div=anket-duzenle&id=<?php echo $oku['id']; ?>"><i class="fa fa-pencil-square-o" style="font-size: 20px;"></i></a>
      </td>

      <td style="text-align: center;"><a href="admin.php?div=anket-sil&id=<?php echo $oku['id']; ?>"><i class="fa fa-trash-o" style="font-size: 20px;"></i></a></td>



    </tr>

  <?php } ?>
</tbody>
  </table>
  <?php

echo "</tr>"."</table>";
	echo " <div class='pagination'><ul>";
	if($sayfa>1){
			echo "<li class='disabled'><a href="."?div=anketler&sayfa=".($sayfa-1).">&laquo</a></li>";
		}
	for($i=1; $i<=$ksayisi; $i++){
		if($i<=$ssayisi){
			if($i==$sayfa){
				echo "<li class='active'><span>".$i."</span></li>";
			}else{
				echo "<li><a href='?div=anketler&sayfa=$i'>$i</a></li>";
			}
		}
	}
	if($sayfa != $ssayisi){
			echo "<li><a href="."?div=anketler&sayfa=".($sayfa+1).">&raquo</a></li>";
		}
	echo '</ul></div>';


?>

<div class="box-footer clearfix no-border">

     <a href="admin.php?div=anket-ekle">
        <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Yeni Anket Ekle</button>
    </a>
 </div>


</div>
