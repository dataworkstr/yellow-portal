<?php

  session_start();
  ob_start();
  session_destroy();
  echo "
  <div class='alert alert-info alert-dismissable'>
            <i class='fa fa-info'></i>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Çıkış Yaptınız. Ana Sayfaya Yönlendiriliyorsunuz
  </div>

  ";
  header("Refresh:3; url=index.php");
  ob_end_flush();
?>
