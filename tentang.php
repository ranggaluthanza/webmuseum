<div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Tentang</h2>
                        <ul class="page-title-link">
                            <li><a href="<?php echo "$d[url]"?>">Beranda</a></li>
                            <li><a href="#">Tentang</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
$user=new User();
$t=$user->detail_identitas(1);
?>
    <div id="about" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box">
                        <h4><?=$t['tentang']?></h4>
                        <h2><?=$t['judul']?></h2>
                        <p class="lead"><?=$t['deskripsi']?>. </p>
                    </div><!-- end messagebox -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                       
    <!-- <h1>cara membuat link langsung ke google play</h1> -->
   <!--  <span style="color: #ff0000"><video src="images/video.crdownload" controls width="500px" height="300px"></video></span> -->
                        <img src="foto_identitas/small_<?echo "$t[gambar]"?>" width="550px" class="img-responsive">
                    
                    </div><!-- end media -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="hr1"> 
<?php 
$v=$user->detail_identitas(2);
?>
            <div class="row">
                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                        <img src="foto_identitas/small_<?echo "$v[gambar]"?>" alt="" class="img-responsive img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
                
                <div class="col-md-6">
                    <div class="message-box">
                        <h4><?=$v['tentang']?></h4>
                        <h2><?=$v['judul']?></h2>
                        <p class="lead"><?=$v['deskripsi']?>. </p>
                    </div>
                </div>

                        <hr class="hr1"/>
                        <?php 
                        $g=$user->detail_identitas(3);
                        ?>
                        <div class="row">
                             <div class="message-box text-center">
                            <h4><?=$g['tentang']?></h4>
                            </div>
                <div class="col-md-12">
                    <div class="post-media wow fadeIn">
                        <img src="foto_identitas/<?echo "$g[gambar]"?>" alt="" class="img-responsive" style="display:block; margin-left: auto;margin-right: auto;">
                    </div><!-- end media -->
                </div><!-- end col -->
                
                    </div><!-- end messagebox -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    
           <!--  <div class="row logos">
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="uploads/logo_01.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="uploads/logo_02.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="uploads/logo_03.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="uploads/logo_04.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="uploads/logo_05.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="uploads/logo_06.png" alt="" class="img-repsonsive"></a>
                </div>
            </div> end row --> 

        </div><!-- end container -->
    </div><!-- end section -->