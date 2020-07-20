	<div class="slider-area">
		<div class="slider-wrapper owl-carousel">
			<div class="slider-item home-one-slider-otem slider-item-four slider-bg-one">
				<div class="container">
					<div class="row">
						<div class="slider-content-area">
							<div class="slide-text">
								<h1 class="homepage-three-title">Museum <span>Tanah</span> dan Pertanian</h1>
								<h2>Terwujudnya kedaulatan pangan,dan kesejahteraan petani. <br> </h2>
								<!-- <div class="slider-content-btn">
									<a class="button btn btn-light btn-radius btn-brd" href="#">Read More</a>
									<a class="button btn btn-light btn-radius btn-brd" href="#">Contact</a> 
								</div>-->
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php 
            $user=new User();
            $pop=$user->tampil_populer_s();
            $judul = strip_tags($pop['isi_berita']); 
            $jud = substr($judul,0,60); // ambil sebanyak 100 karakter
            $jud = substr($judul,0,strrpos($jud," ")); // potong per spasi kalimat
            ?>
			<div class="slider-item text-center home-one-slider-otem slider-item-four" style="background-image:url(foto_berita/<?php echo "$pop[gambar]"?>);">
				<div class="container">
					<div class="row">
						<div class="slider-content-area">
							<div class="slide-text">
								<h1 class="homepage-three-title"><?=$pop['judul']?></h1>
								<h2><?=$jud?> ...<br> </h2>
								<!-- <div class="slider-content-btn">
									<a class="button btn btn-light btn-radius btn-brd" href="#">Read More</a>
									<a class="button btn btn-light btn-radius btn-brd" href="#">Contact</a>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php
            $tgl=date('Y-m-d');
            $sql="SELECT * FROM event WHERE tgl_akhir >= '$tgl' "; 
            $result = $mysqli->query( $sql );
            $ec = $result->num_rows;
            $jo = $result->fetch_assoc();
            $tgl_mulai=date("d-m-Y", strtotime($jo['tgl_mulai']));
            $tgl_akhir=date("d-m-Y", strtotime($jo['tgl_akhir']));
            if($tgl_mulai!=$tgl_akhir){$tgl=" ".$tgl_mulai." s/d ".$tgl_akhir."  ";}else{$tgl=$tgl_mulai;}
            if($ec>0){
                echo"<div class=\"slider-item home-one-slider-otem slider-item-four\" style=\"background-image:url(foto_event/$jo[gambar]);\">
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"slider-content-area\">
                            <div class=\"slide-text\">
                                <h1 class=\"homepage-three-title\">$jo[nama_event]</h1>
                                <h2>Tanggal $tgl <br></h2>
                                <!-- <div class=\"slider-content-btn\">
                                    <a class=\"button btn btn-light btn-radius btn-brd\" href=\"#\">Read More</a>
                                    <a class=\"button btn btn-light btn-radius btn-brd\" href=\"#\">Contact</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                ";
            }else{
            ?>
			<div class="slider-item home-one-slider-otem slider-item-four slider-bg-three">
				<div class="container">
					<div class="row">
						<div class="slider-content-area">
							<div class="slide-text">
								<h1 class="homepage-three-title">Museum <span>Tanah</span> dan Pertanian</h1>
								<h2>Terwujudnya kedaulatan pangan,dan kesejahteraan petani. <br></h2>
								<!-- <div class="slider-content-btn">
									<a class="button btn btn-light btn-radius btn-brd" href="#">Read More</a>
									<a class="button btn btn-light btn-radius btn-brd" href="#">Contact</a>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>

            <?php }
            ?>
		</div>
	</div>
<?php 
$user=new User();
$t=$user->detail_identitas(1);
$isi_artikel = strip_tags($t['deskripsi']); // membuat paragraf pada isi berita dan mengabaikan tag html
$isi = substr($isi_artikel,0,190); // ambil sebanyak 100 karakter
$isi = substr($isi_artikel,0,strrpos($isi," ")); // potong per spasi kalimat
?>
    <div id="about" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box">
                        <h4><?=$t['tentang']?></h4>
                        <h2><?=$t['judul']?></h2>
                        <p class="lead"><?=$isi?> ... </p>

                        <a href="tentang" class="btn btn-light btn-radius btn-brd grd1">Selengkapnya</a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                         <img src="foto_identitas/small_<?echo "$t[gambar]"?>" width="550px" class="img-responsive">
    <!-- <h1>cara membuat link langsung ke google play</h1> -->
    <!-- <span style="color: #ff0000"><video src="images/video.crdownload" controls width="500px" height="300px"></video></span>
    <br>-->

                    </div><!-- end media -->
                </div><!-- end col -->
            </div><!-- end row -->

           <!--  <hr class="hr1"> 

            <div class="row">
				<div class="col-md-6">
                    <div class="post-media wow fadeIn">
                        <img src="uploads/about_02.jpg" alt="" class="img-responsive img-rounded">
                    </div> end media -->
                <!-- end col -->
				
                <!-- <div class="col-md-6">
                    <div class="message-box">
                        <h4>Visi Misi</h4>
                        <h2>Kami memberikan pelayanan terbaik untuk masyarakat agar lebih mengenal sejarah bangsa Indonesia</h2>
                        <p class="lead">Sejarah adalah suatu ilmu pengetahuan yang disusun atas hasil penyelidikan beberapa peristiwa yang dapat dibuktikan dengan bahan kenyataan.</p>

                        <p>Mewujudkan pengelolaan koleksi sesuai standar internasional.</p>
						<p>Mewujudkan pelayanan prima.</p>
						<p>Mewujudkan Museum sebagai sarana edukasi dan rekreasi.</p>
						<p>Mewujudkan kajian pengembangan permuseuman yang berkualitas.</p>
						<p>Mewujudkan tata kelola yang baik dengan pelibatan publik</p>

                        <a href="#services" class="btn btn-light btn-radius btn-brd grd1">Selengkapnya</a>
                    </div> end messagebox --> 
                </div><!-- end col --> 
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	

<!-- Section berita -->
    <div id="services" class="parallax section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Berita</h3>
                <p class="lead">Memberikan informasi berita tentang museum tanah dan pertanian secara akurat dan sesuai fakta</p>
            </div>

            <div class="owl-services owl-carousel owl-theme">
                <?php
                $user=new User();
                $berita=$user->tampil_berita_home();
                if(is_array($berita) || is_object($berita)){
                foreach ($berita as $key => $b) {
                $thn=date("Y", strtotime($b['tanggal']));
                $tanggal=date("d M", strtotime($b['tanggal']));
                $isi_artikel = strip_tags($b['isi_berita']); // membuat paragraf pada isi berita dan mengabaikan tag html
                $isi = substr($isi_artikel,0,160); // ambil sebanyak 100 karakter
                $isi = substr($isi_artikel,0,strrpos($isi," ")); // potong per spasi kalimat
                ?>
                <div class="service-widget">
                    <div class="post-media wow fadeIn">
                        <a href="<?php echo "$d[url]"?>/foto_berita/<?echo "$b[gambar]"?>" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                        <img src="<?php echo "$d[url]"?>/foto_berita/small_<?echo "$b[gambar]"?>" alt="" class="img-responsive img-rounded">
                    </div>
					<div class="service-dit"><a href="<? echo "$d[url]"?>/dberita/<?echo "$b[judul_seo]"?>">
						<h3 ><?php echo "$b[judul]"?></h3></a>
						<p><?php echo "$isi"?></p>
					</div>
                </div>
                <!-- end service -->
                <?php }}?>

            </div><!-- end row -->

            <hr class="hr1">

            <div class="text-center">
                <a href="berita" class="btn btn-light btn-radius btn-brd">Lihat Berita Selanjutnya</a>
            </div>
        </div><!-- end container -->
    </div><!-- end section -->

   
    <!-- Event -->

     <div id="services" class="section wb" style=>
        <div class="container">
            <div class="section-title text-center">
                <h3>Event</h3>
                <p class="lead">Kami akan memberikan informasi tentang event-event pertanian nasional maupun internasional</p>
            </div><!-- end title -->

            <div class="owl-services owl-carousel owl-theme">

            <?php
            $user=new User();
            $berita=$user->tampil_event_home();
            if(is_array($berita) || is_object($berita)){
            foreach ($berita as $key => $e) {
            $tgl_mulai=date("d-m-Y", strtotime($e['tgl_mulai']));
            $tgl_akhir=date("d-m-Y", strtotime($e['tgl_akhir']));

            $deskripsi = strip_tags($e['deskripsi']); // membuat paragraf pada isi berita dan mengabaikan tag html
            $isi = substr($deskripsi,0,160); // ambil sebanyak 100 karakter
            $isi = substr($deskripsi,0,strrpos($isi," ")); // potong per spasi kalimat
            $jk = strlen($deskripsi);
            if($jk<60){$deskripsinya=$deskripsi;}else{$deskripsinya= ''.$isi. ' ...';}
            if($tgl_mulai!=$tgl_akhir){$tgl=" ".$tgl_mulai." s/d ".$tgl_akhir."  ";}else{$tgl=$tgl_mulai;}
            ?>           
                <div class="service-widget">
                    <div class="post-media wow fadeIn">
                        <a href="foto_event/<? echo"$e[gambar]"?>" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                        <img src="foto_event/small_<? echo"$e[gambar]"?>" alt="" class="img-responsive img-rounded">
                    </div>
                    <div class="service-dit">
                        <h3><?=$e['nama_event']?></h3>
                        <h5>Tanggal: <?=$tgl?></h5>
                        <h5>Tempat: <?=$e['tempat']?></h5>
                        <p><?=$deskripsinya?></p>
                    </div>
                </div>
                <!-- end service -->
                <?php }} ?>
                
            </div><!-- end row -->

            <hr class="hr1">

            <div class="text-center">
                <a href="event" class="btn btn-light btn-radius btn-brd">Lihat Selengkapnya</a>
            </div>
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

     <div id="features" class="parallax section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Fasilitas Museum</h3>
                <p class="lead">Fasilitas yang tersedia di Museum Tanah dan Pertanian Bogor<br>Lantai 1, Lantai 2 dan Lantai 3</p>
            </div><!-- end title -->
             <hr class="hr1">

            <div class="row text-center">
                
                <?php
                $user=new User();
                $berita=$user->tampil_fasilitas_home();
                if(is_array($berita) || is_object($berita)){
                foreach ($berita as $key => $f) {
                
                $deskripsi = strip_tags($f['deskripsi']); // membuat paragraf pada isi berita dan mengabaikan tag html
                $isi = substr($deskripsi,0,160); // ambil sebanyak 100 karakter
                $isi = substr($deskripsi,0,strrpos($isi," ")); // potong per spasi kalimat
                $jk = strlen($deskripsi);
                if($jk<60){$deskripsinya=$deskripsi;}else{$deskripsinya= ''.$isi. ' ...';}
                ?>     
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <a href="foto_fasilitas/<? echo"$f[gambar]"?>" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                            <img src="foto_fasilitas/small_<? echo"$f[gambar]"?>" alt="" class="img-responsive img-rounded">
                        </div>
                        <h3><?=$f['nama_fasilitas']?></h3>
                        <p><?=$deskripsinya?></p>
                        <a href="dfasilitas/<?echo "$f[nama_seo]"?>" class="primary-btn text-uppercase">Details</a>
                    </div><!-- end service -->
                </div><!-- end col -->

                <?php }} ?>

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->