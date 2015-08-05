<html>
<?php 
error_reporting(false);
include "admin/ayar.php"; 
?>
<head>

  <meta charset="utf-8"/>
  <title>Yellow Bulls - Resmi Web Sitesi</title>
  <meta name="description" content="Yellow Pages Portal"/>
  <meta name="author" content="Murat Bayri"/>
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
  <meta name="robots" content="ALL"/>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  
  
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> 
  <script src="https://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
  
  <script type="text/javascript" src="js/jssor.js"></script>
  <script type="text/javascript" src="js/jssor.slider.js"></script>
  
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  
  <link rel="stylesheet" href="css/style.css">
  

</head>

<div id="tum-site" class="row">

  <!-- <div class="advertise-top"> </div> -->

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><div class="header-logo"><img src="images/logo.png" width="92" height="86"/></div></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="index.php"><div class="menu-home-icon"><i class="fa fa-home"></i></div> <span class="sr-only">(current)</span></a></li>
          <li><a href="index.php?page=news">Haberler</a></li>
          <li><a href="index.php?page=teams">Takımlar</a></li>
          <li><a href="index.php?page=players">Oyuncular</a></li>
          <li><a href="index.php?page=stadium">Sahalar</a></li>

        </ul>


      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="next-match">
    <div class="countdown">
     <span id="clock"></span>
   </div>
   <div class="next-match-home-team-logo"></div>
   <div class="next-match-home-team-name">Körükspor</div>
   <div class="next-match-away-team-logo"></div>
   <div class="next-match-away-team-name">AAÜ Ejderhaspor</div>
   <div class="next-match-detail">12 Aralık 2012 - 19:07</div>
   <div class="next-match-detail2">Çolak Giyim Demirlispor Spor Kompleksi  / 34 Güneşli</div>
 </div>


 <body>
  <script type="text/javascript">
    $(document).ready(function() {


      $('#clock').countdown('2015/08/07 20:00:00')
      .on('update.countdown', function(event) {
        var format = '%H saat %M dakika %S saniye';
        if(event.offset.days > 0) {
          format = '%-d gün%!d ' + format;
        }
        if(event.offset.weeks > 0) {
          format = '%-w hafta%!w ' + format;
        }
        $(this).html(event.strftime(format));
      })
      .on('finish.countdown', function(event) {
        $(this).html('Maç Oynandı!');
        $(this).parent().addClass('disabled')

      });
    });
  </script>