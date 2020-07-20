<?php 
date_default_timezone_set('Asia/Makassar');

// Panggil atau sertakan (include) semua fungsi yang dibutuhkan
include "config/class.user.php";
include "config/validation.php";
//include "config/periksa.php";
$user=new User();
$validation = new Validation();

$d=$user->tampil_site_info();

$ip=$user->ip_user();
$browser=$user->client_browser();
// untuk tes hilangkan comment dibawah ini
// unset($_COOKIE['VISITOR']);
// Check bila sebelumnya data pengunjung sudah terrekam
if (! isset($_COOKIE['VISITOR'])) {
    // Masa akan direkam kembali
    // Tujuan untuk menghindari merekam pengunjung yang sama dihari yang sama.
    // Cookie akan disimpan selama 5 menit
    $duration = time()+60*5*1;
    // simpan kedalam cookie browser
    setcookie('VISITOR',$browser,$duration);
    // current time
    $dateTime = date('Y-m-d H:i:s');
    // SQL Command atau perintah SQL INSERT
    $sql = "INSERT INTO statistik (ip, browser, date_create) VALUES ('$ip', '$browser', '$dateTime')";
    $result = $mysqli->query( $sql );
}
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Museum-Tanah dan Pertanian</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php echo "$d[url]"?>/images/logokementan.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo "$d[url]"?>/images/logokementan.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo "$d[url]"?>/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo "$d[url]"?>/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo "$d[url]"?>/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo "$d[url]"?>/css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="<?php echo "$d[url]"?>/js/modernizer.js"></script>
    <style>
    .responsive {
      width: 99%;
      height: auto;
    }
    </style>
      

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__ball"></div>
		</div>
    </div><!-- end loader -->
    <!-- END LOADER -->
    
	<div class="top-bar">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="left-top">
						<div class="email-box">
							<a href="contact.html"><i class="fa fa-envelope-o" aria-hidden="true"></i> humas-ip@pertanian.go.id</a>
						</div>
						<div class="phone-box">
							<a href="tel:02518321746"><i class="fa fa-phone" aria-hidden="true"></i> (0251) 8321746</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="right-top">
						<div class="social-box">
							<ul>
								<li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
							
							<ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="<?php echo "$d[url]"?>/images/logokementan.png" width="60px" height="60px" alt="image"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a <?php if (!isset($_GET['module']) OR isset($_GET['module'])){if($_GET['module']=="home") {echo 'class="active"'; }}?> href="<?php echo "$d[url]"?>/">Beranda</a> </li>
                        <li> <a <?php if (isset($_GET['module'])){if($_GET['module']=="tentang") {echo 'class="active"'; }}?>href="<?php echo "$d[url]"?>/tentang">Tentang</a> </li>
                        <li> <a <?php if (isset($_GET['module'])){if($_GET['module']=="berita" OR $_GET['module']=="detail_berita") {echo 'class="active"'; }}?> href="<?php echo "$d[url]"?>/berita">Berita</a> </li>
                        <li> <a <?php if (isset($_GET['module'])){if($_GET['module']=="event") {echo 'class="active"'; }}?> href="<?php echo "$d[url]"?>/event">Event</a> </li>
                        <li> <a <?php if (isset($_GET['module'])){if($_GET['module']=="fasilitas" OR $_GET['module']=="detail_fasilitas") {echo 'class="active"'; }}?> href="<?php echo "$d[url]"?>/fasilitas">Fasilitas</a> </li>
                        <li><a>Reservasi</a></li>
                        <li><a>Koleksi</a></li>
						<li> <a <?php if (isset($_GET['module'])){if($_GET['module']=="kontak") {echo 'class="active"'; }}?> href="<?php echo "$d[url]"?>/kontak">Kontak</a> </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<?php include 'isi.php';?>    

<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-5 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <img src="<?php echo "$d[url]"?>/images/logokementan.png" height="70px" width="70px" alt="" />
                        </div>
                        <p> Alamat: Jl. Ir. H. Juanda No.98, RT.1/RW.1, Gudang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16123.</p>
                        <p>Telepon: (0251) 8321746</p>
                    </div><!-- end clearfix -->
                </div><!-- end col -->
                <div class="col-md-8 col-sm-7 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title text-right">
                           <b> MAPS </b>&nbsp;&nbsp;
                        <p class="text-right">Membantu anda dalam menemukan lokasi museum tanah dan pertanian</p>
                        </div>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15853.769405458964!2d106.8119497!3d-6.5918122!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1557406328061!5m2!1sid!2sid" width="99%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div><!-- end col -->

               
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2019 <a href="#">Museum Tanah dan Pertanian<!-- </a> Design By : 
					<a href="https://html.design/">html design</a> --></p>
                </div>

                
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="<?php echo "$d[url]"?>/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="<?php echo "$d[url]"?>/js/custom.js"></script>
    <script src="<?php echo "$d[url]"?>/js/portfolio.js"></script>
    <script src="<?php echo "$d[url]"?>/js/hoverdir.js"></script>    

</body>
</html>