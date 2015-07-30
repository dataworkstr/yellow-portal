<?php
include "ayar.php";
if($_SESSION['login'] != "true") die("permission denied");
?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Yellow Bulls - Admin Paneli</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />

<link rel="stylesheet" href="css/bootstrap-fileupload.min.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap-timepicker.min.css" type="text/css" />

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/responsive-tables.css">

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="http://jquery-ui.googlecode.com/svn/tags/1.6rc5/ui/i18n/ui.datepicker-tr.js"></script>


<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/modernizr.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/responsive-tables.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.autogrow-textarea.js"></script>
<script type="text/javascript" src="js/charCount.js"></script>
<script type="text/javascript" src="js/ui.spinner.min.js"></script>
<script type="text/javascript" src="js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="js/forms.js"></script>





<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->

</head>

<body>


    <div class="mainwrapper">

    <div class="header">
            <div class="logo">
                <a href="admin.php"><img src="images/logo.png" alt="" /></a>
            </div>
            <div class="headerinner">
                <ul class="headmenu">
                    <li class="odd">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="count">4</span>
                            <span class="head-icon head-message"></span>
                            <span class="headmenu-label">Messages</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-header">Messages</li>
                            <li><a href=""><span class="icon-envelope"></span> New message from <strong>Jack</strong> <small class="muted"> - 19 hours ago</small></a></li>
                            <li><a href=""><span class="icon-envelope"></span> New message from <strong>Daniel</strong> <small class="muted"> - 2 days ago</small></a></li>
                            <li><a href=""><span class="icon-envelope"></span> New message from <strong>Jane</strong> <small class="muted"> - 3 days ago</small></a></li>
                            <li><a href=""><span class="icon-envelope"></span> New message from <strong>Tanya</strong> <small class="muted"> - 1 week ago</small></a></li>
                            <li><a href=""><span class="icon-envelope"></span> New message from <strong>Lee</strong> <small class="muted"> - 1 week ago</small></a></li>
                            <li class="viewmore"><a href="messages.html">View More Messages</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                            <span class="count">10</span>
                            <span class="head-icon head-users"></span>
                            <span class="headmenu-label">New Users</span>
                        </a>
                        <ul class="dropdown-menu newusers">
                            <li class="nav-header">New Users</li>
                            <li>
                                <a href="">
                                    <img src="images/photos/thumb1.png" alt="" class="userthumb" />
                                    <strong>Draniem Daamul</strong>
                                    <small>April 20, 2013</small>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="images/photos/thumb2.png" alt="" class="userthumb" />
                                    <strong>Shamcey Sindilmaca</strong>
                                    <small>April 19, 2013</small>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="images/photos/thumb3.png" alt="" class="userthumb" />
                                    <strong>Nusja Paul Nawancali</strong>
                                    <small>April 19, 2013</small>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="images/photos/thumb4.png" alt="" class="userthumb" />
                                    <strong>Rose Cerona</strong>
                                    <small>April 18, 2013</small>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="images/photos/thumb5.png" alt="" class="userthumb" />
                                    <strong>John Doe</strong>
                                    <small>April 16, 2013</small>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="odd">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                            <span class="count">1</span>
                            <span class="head-icon head-bar"></span>
                            <span class="headmenu-label">Statistics</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-header">Statistics</li>
                            <li><a href=""><span class="icon-align-left"></span> New Reports from <strong>Products</strong> <small class="muted"> - 19 hours ago</small></a></li>
                            <li><a href=""><span class="icon-align-left"></span> New Statistics from <strong>Users</strong> <small class="muted"> - 2 days ago</small></a></li>
                            <li><a href=""><span class="icon-align-left"></span> New Statistics from <strong>Comments</strong> <small class="muted"> - 3 days ago</small></a></li>
                            <li><a href=""><span class="icon-align-left"></span> Most Popular in <strong>Products</strong> <small class="muted"> - 1 week ago</small></a></li>
                            <li><a href=""><span class="icon-align-left"></span> Most Viewed in <strong>Blog</strong> <small class="muted"> - 1 week ago</small></a></li>
                            <li class="viewmore"><a href="charts.html">View More Statistics</a></li>
                        </ul>
                    </li>
                    <?php


                            $adi = $_SESSION["username"];
                 $goster = mysql_fetch_array(mysql_query("select * from kullanicilar where username='$adi' "));

                    ?>
                    <li class="right">
                        <div class="userloggedinfo">
                            <img src="../<?php echo $goster['profil_photo']; ?>" alt="" />
                            <div class="userinfo">
                                <h5>
                                    <?php
                                    echo $goster['adsoyad'];
                                    ?>

                                </h5>
                                <ul>
                                    <li><a href="admin.php?div=edit-profil">Profili Düzenle</a></li>
                                    <li><a href="admin.php?div=cikis">Çıkış</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul><!--headmenu-->
            </div>
        </div>

    <div class="leftpanel">

       <?php

            $menuyak = $_GET['div'];

switch ($menuyak){

    case "haberler" :
    $yak1 = "class='active'";
    break;

        case "haber-ekle" :
        $yak1 = "class='active'";
        break;

        case "haber-duzenle" :
        $yak1 = "class='active'";
        break;

    case "takimlar" :
    $yak2 = "class='active'";
    break;

    case "oyuncular" :
    $yak3 = "class='active'";
    break;

        case "oyuncu-ekle" :
        $yak3 = "class='active'";
        break;

        case "oyuncu-duzenle" :
        $yak3 = "class='active'";
        break;

    case "sahalar" :
    $yak4 = "class='active'";
    break;

    case "maclar" :
    $yak5 = "class='active'";
    break;

    case "genel-ayarlar" :
    $yak = "class='active'";
    break;

    default:
    $yak6 = "class='active'";
    break;



}

       ?>


        <div class="leftmenu">
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Menü</li>
                <li <?php echo $yak6 ?></l><a href="admin.php"><span class="iconfa-laptop"></span> Admin Paneli</a></li>

                <li <?php echo $yak1 ?>><a href="admin.php?div=haberler"><span class="fa fa-newspaper-o"></span> Haberler</a></li>

                <li <?php echo $yak2 ?>><a href="admin.php?div=haberler"><span class="fa fa-flag-checkered"></span> Takımlar</a></li>

                <li <?php echo $yak3 ?>><a href="admin.php?div=oyuncular"><span class="fa fa-users"></span> Oyuncular</a></li>

                <li <?php echo $yak4 ?>><a href="admin.php?div=haberler"><span class="fa fa-globe"></span> Sahalar</a></li>

                <li <?php echo $yak5 ?>><a href="admin.php?div=haberler"><span class="fa fa-futbol-o"></span> Maçlar</a></li>

                <li <?php echo $yak ?>><a href="admin.php?div=haberler"><span class="fa fa-cog"></span> Genel Ayarlar</a></li>

            </ul>
        </div><!--leftmenu-->

    </div><!-- leftpanel -->

    <div class="rightpanel">

        <ul class="breadcrumbs">
            <li><a href="admin.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>Admin Paneli</li>

        </ul>



        <div class="maincontent">
            <div class="maincontentinner">

                <?php include "pages/index.php"; ?>
            </div>
        </div>



    </div><!--maincontentinner-->

</div><!--rightpanel-->

<script type="text/javascript">
    jQuery(document).ready(function() {

      // simple chart
      var flash = [[0, 11], [1, 9], [2,12], [3, 8], [4, 7], [5, 3], [6, 1]];
      var html5 = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
      var css3 = [[0, 6], [1, 1], [2,9], [3, 12], [4, 10], [5, 12], [6, 11]];

      function showTooltip(x, y, contents) {
         jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 5
        }).appendTo("body").fadeIn(200);
     }


     var plot = jQuery.plot(jQuery("#chartplace"),
      [ { data: flash, label: "Flash(x)", color: "#6fad04"},
      { data: html5, label: "HTML5(x)", color: "#06c"},
      { data: css3, label: "CSS3", color: "#666"} ], {
         series: {
            lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
            points: { show: true }
        },
        legend: { position: 'nw'},
        grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
        yaxis: { min: 0, max: 15 }
    });

     var previousPoint = null;
     jQuery("#chartplace").bind("plothover", function (event, pos, item) {
         jQuery("#x").text(pos.x.toFixed(2));
         jQuery("#y").text(pos.y.toFixed(2));

         if(item) {
            if (previousPoint != item.dataIndex) {
               previousPoint = item.dataIndex;

               jQuery("#tooltip").remove();
               var x = item.datapoint[0].toFixed(2),
               y = item.datapoint[1].toFixed(2);

               showTooltip(item.pageX, item.pageY,
                   item.series.label + " of " + x + " = " + y);
           }

       } else {
          jQuery("#tooltip").remove();
          previousPoint = null;
      }

  });

     jQuery("#chartplace").bind("plotclick", function (event, pos, item) {
         if (item) {
            jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });


        //datepicker
        jQuery('#datepicker').datepicker();

        // tabbed widget
        jQuery('.tabbedwidget').tabs();



    });
</script>
</body>
</html>
