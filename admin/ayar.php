<?php

session_start();
ob_start();

$dbhost		= "localhost:1454";
$dbadi		= "yellowbulls";// veri tabanınızın adı
$dbuser		= "root"; // veritabanı kullanıcı adı
$dbpass		= "root";// veritabanı sifresi


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


function vericek ($tablo) {
    $goster = mysql_fetch_array(mysql_query(select * from $tablo));

    return $goster;
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



?>