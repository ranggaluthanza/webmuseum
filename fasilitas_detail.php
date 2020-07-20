<div class="banner-area banner-bg-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="banner">
						<h2>Fasilitas</h2>
						<ul class="page-title-link">
							<li><a href="<?php echo "$d[url]"?>">Beranda</a></li>
							<li><a href="#">Fasilitas</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

   <!--  <div id="about" class="section wb">
        <div class="container">
           <div class="row text-center">
				<div class="col-md-3 col-sm-6">
					<div class="about-item">
						<div class="about-icon">
							<span class="icon icon-display"></span>
						</div>
						<div class="about-text">
							<h3> <a href="#">Lorem ipsum dolor. </a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ea, quis magnam deserunt. </p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="about-item">
						<div class="about-icon">
							<span class="icon icon-database"></span>
						</div>
						<div class="about-text">
							<h3> <a href="#">Lorem ipsum dolor. </a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ea, quis magnam deserunt. </p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="about-item">
						<div class="about-icon">
							<span class="icon icon-magic-wand"></span>
						</div>
						<div class="about-text">
							<h3> <a href="#">Lorem ipsum dolor. </a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ea, quis magnam deserunt. </p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="about-item">
						<div class="about-icon">
							<span class="icon icon-cloud"></span>
						</div>
						<div class="about-text">
							<h3> <a href="#">Lorem ipsum dolor. </a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ea, quis magnam deserunt. </p>
						</div>
					</div>
				</div>
			</div>
        </div> end container -->
    </div><!-- end section -->
	
	<div class="section wb">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 single-content">
          <?php 
          $id=$_GET['id'];
          $fas=$user->detail_fasilitas($id);
          ?>          
            <p class="mb-5">
              <img src="<?php echo "$d[url]"?>/foto_fasilitas/<?echo "$fas[gambar]"?>" alt="Image" class="responsive">
            </p>  
            <h1 class="mb-4">
				<?echo "$fas[nama_fasilitas]"?>
            </h1>
            <div class="post-meta d-flex mb-5">
              
              <div class="vcard">
      
              </div>
            </div>
			<div class="message-box">
            <?echo "$fas[deskripsi]"?>
			</div>


            <div class="pt-5">
                   
                  </div>
      
      
                  <div class="pt-5">
                 
                  </div>
          </div>


          <div class="col-lg-3 ml-auto">
            <div class="message-box">
              <h2>Popular Posts</h2>
            </div>
                <?php
                $user=new User();
                $berita=$user->tampil_berita_populer();
                if(is_array($berita) || is_object($berita)){
                  $no=1;
                foreach ($berita as $key => $p) {
                $f=$user->detail_admin($p['username']);
                $thn=date("Y", strtotime($p['tanggal']));
                $tanggal=date("d M", strtotime($p['tanggal']));
                $isi_artikel = strip_tags($p['isi_berita']); // membuat paragraf pada isi berita dan mengabaikan tag html
                $isi = substr($isi_artikel,0,160); // ambil sebanyak 100 karakter
                $isi = substr($isi_artikel,0,strrpos($isi," ")); // potong per spasi kalimat
                ?>
            <div class="trend-entry d-flex">
              <div class="number align-self-start">0<?echo "$no"?></div>
              <div class="trend-contents">
                <h2><a href="<? echo "$d[url]"?>/dberita/<?echo "$p[judul_seo]"?>"><?echo "$p[judul]"?></a></h2>
                <div class="post-meta">
                  <span class="d-block"><a href="#"><?echo "$f[nama_admin]"?></a> in <a href="#"><?echo "$p[sumber]"?></a></span>
                  <span class="date-read"><?echo "$tanggal"?> <span class="mx-1">&bullet;</span> <?echo "$p[dibaca]"?>  read <span class="icon-star2"></span></span>
                </div>
              </div>
            </div>
            <?php $no++; }}?>
            
            <p>
              <a href="<? echo "$d[url]"?>/berita" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>
            </p>
          </div>


        </div>
        
      </div>
    </div>