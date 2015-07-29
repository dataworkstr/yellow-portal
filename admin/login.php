<?php
  include("ayar.php");

  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  if(($_POST["username"]=="") and ($_POST["password"]=="")){
    echo "<meta charset='utf-8'>";
    echo "Kullancı Adı veya Şifre Yanlış.<br>";
    echo "Giriş sayfasına yönlendiriliyorsunuz.";
    header("Refresh: 2; url=index.php");
  }else {
    $calistir = mysql_query("select * from kullanicilar where username = '$username' and password = '$password' and id = 1 ") or die("Hata Olustu!".mysql_error());
    mysql_query("SET NAMES 'utf8'");
        if (mysql_num_rows($calistir)>0){

        $_SESSION["login"] = "true";
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;

        header("Location:admin.php");
        }else{
     echo "<meta charset='utf-8'>";
    echo "Kullancı Adı veya Şifre Yanlış.<br>";
    echo "Giriş sayfasına yönlendiriliyorsunuz.";
    header("Refresh: 1; url=index.php");
        }
  }



  ?>

