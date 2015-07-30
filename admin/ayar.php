<?php

session_start();
ob_start();


     // $dbhost      = "localhost:1454";
     // $dbadi       = "yellowbulls";
     // $dbuser      = "root";
     // $dbpass      = "root";

$dbhost      = "localhost";
$dbadi       = "canagirk_yellowbulls";
$dbuser      = "canagirk_yellowb";
$dbpass      = "yellowbulls-db2015*";


$baglanti = mysql_connect($dbhost,$dbuser,$dbpass);
if(! $baglanti) die("MYSQL Bağlantısı sağlanamadı");

@mysql_select_db($dbadi,$baglanti) or die("Veritabanına bağlantı sağlanamadı");
mysql_set_charset('utf8',$baglanti);

function cevir($s) {
  $tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç');
  $eng = array('s','s','i','i','g','g','u','u','o','o','c','c');
  $s = str_replace($tr,$eng,$s);
  $s = strtolower($s);
  $s = preg_replace('/&.+?;/', '', $s);
  $s = preg_replace('/[^%a-z0-9 _-]/', '', $s);
  $s = preg_replace('/\s+/', '-', $s);
  $s = preg_replace('|-+|', '-', $s);
  $s = trim($s, '-');

  return $s;
}


function format_date($str) {
  $month = array(" ", "Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık");
  $y = explode(' ', $str);
  $x = explode('-', $y[0]);
  $date = "";
  $m = (int)$x[1];
  $m = $month[$m];
  $st = array(1, 21, 31);
  $nd = array(2, 22);
  $rd = array(3, 23);
  if(in_array( $x[2], $st)) {
    $date = $x[2].'';
  }
  else if(in_array( $x[2], $nd)) {
    $date .= $x[2].'';
  }
  else if(in_array( $x[2], $rd)) {
    $date .= $x[2].'';
  }
  else {
    $date .= $x[2].'';
  }
  $date .= ' ' . $m . ' ' . $x[0];

  return $date;
}

function temizle($s) {
  $s = preg_replace('/&.+?;/', '', $s);
  $s = preg_replace('/[^%a-z0-9 _-]/', '', $s);
  $s = preg_replace('/\s+/', '', $s);
  $s = preg_replace('|-+|', '', $s);
  return $s;
}

function rastgele_sifre($num) {
  $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
  $pass = array();
  $alphaLength = strlen($alphabet) - 1;
  for ($i = 0; $i < $num; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
  }
  return implode($pass);
}

function kisalt($kelime, $str = 10)
{
  if (strlen($kelime) > $str)
  {
   if (function_exists("mb_substr")) $kelime = mb_substr($kelime, 0, $str, "UTF-8").'..';
   else $kelime = substr($kelime, 0, $str).'..';
 }
 return $kelime;
}


function Zamagoster($par)
{
  $explode = explode(" ", $par);
  $explode2 = explode("-", $explode[0]);
  $zaman = substr($explode[1], 0, 5);

  if ($explode2[1] == "1") $ay = "Ocak";
  elseif ($explode2[1] == "2") $ay = "Şubat";
  elseif ($explode2[1] == "3") $ay = "Mart";
  elseif ($explode2[1] == "4") $ay = "Nisan";
  elseif ($explode2[1] == "5") $ay = "Mayıs";
  elseif ($explode2[1] == "6") $ay = "Haziran";
  elseif ($explode2[1] == "7") $ay = "Temmuz";
  elseif ($explode2[1] == "8") $ay = "Ağustos";
  elseif ($explode2[1] == "9") $ay = "Eylül";
  elseif ($explode2[1] == "10") $ay = "Ekim";
  elseif ($explode2[1] == "11") $ay = "Kasım";
  elseif ($explode2[1] == "12") $ay = "Aralık";

  return $explode2[2]." ".$ay." ".$explode2[0].", ".$zaman;

}



?>
