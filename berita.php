<div class="banner-area banner-bg-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="banner">
						<h2>Berita</h2>
						<ul class="page-title-link">
							<li><a href="<?php echo "$d[url]"?>">Beranda</a></li>
							<li><a href="#">Berita</a></li>
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
	
<?php
$user=new User();
$page=(isset($_GET['page'])) ;
$batas=2;
$halaman=$page;
if (empty($halaman)){
  $posisi=0;
  $halaman=1;
} 
else {
  $posisi=($halaman-1)*$batas;
}
$query = "SELECT * FROM berita WHERE publish='Y' ORDER BY id_berita Desc Limit $posisi, $batas";
$result1 = $user->getData($query);
if(!isset($_GET['page'])){
?> <div class="section wb">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 single-content">
                        <?php 
                            $ur=1;
                            if(is_array($result1) || is_object($result1)){
                            foreach ($result1 as $key => $rd) {
                            $isi_artikel = strip_tags($rd['isi_berita']); // membuat paragraf pada isi berita dan mengabaikan tag html
                            $isi = substr($isi_artikel,0,190); // ambil sebanyak 100 karakter
                            $isi = substr($isi_artikel,0,strrpos($isi," ")); // potong per spasi kalimat
                            $tgl=date("d", strtotime($rd['tanggal']));
                            $thn=date("Y", strtotime($rd['tanggal']));
                            $tanggal=date("M, d", strtotime($rd['tanggal']));
                            $dibaca=$user->format_angka($rd['dibaca']);
                            ?>
                        <p class="mb-5"> <a href="<? echo "$d[url]"?>/dberita/<?echo "$rd[judul_seo]"?>"><img src="<? echo "$d[url]"?>/foto_berita/small_<? echo"$rd[gambar]"?>"></a> </p>

                            <h1 class="mb-4"><a href="<? echo "$d[url]"?>/dberita/<?echo "$rd[judul_seo]"?>"><?echo "$rd[judul]"?></a></h1>
                                <div class="post-meta d-flex mb-5">
              
                              <div class="vcard">
                                <span class="d-block"><a href="#">Bambang</a> in <a href="#"><? echo"$rd[sumber]"?></a></span>
                                <span class="date-read"><? echo"$tanggal"?> <span class="mx-1">&bullet;</span> <? echo"$rd[dibaca]"?> read <span class="icon-star2"></span></span>
                              </div>
                            </div>
                                <div class="message-box">
                                    <p><?echo "$isi"?></p>
                                    <a href="<? echo "$d[url]"?>/dberita/<?echo "$rd[judul_seo]"?>" title="READ MORE" rel="bookmark" class="site-button-link">more <i class="fa fa-angle-double-right"></i></a>
                                </div>
                                
                            
                        <?}
                        }
                        ?>
                        
                        
                        <!-- Pagination start -->
                        <div class="pagination-bx m-b30">
                            <?php 
                            $result = $mysqli->query("SELECT * FROM berita WHERE publish='Y'");
                                /* determine number of rows result set */
                                $row_cnt = $result->num_rows;
                            // a SELECT query will generate a mysqli_result
                            $jmlhal = ceil($row_cnt/$batas);
                            $showPage="";
                            ?>
                            <ul class="pagination">
                                <? 
                                if($halaman > 1){
                                  $prev=$halaman-1;
                                  ?>
                                  <li><a href="<? echo "$d[url]"?>/berita/<?echo $prev?>" class="previous"> <i class="fa fa-angle-double-left"></i> Prev</a></li>
                                <?
                                }
                                else {
                                  echo " <li><a href='#' class='previous'><i class=\"fa fa-angle-double-left\"></i> </a></li>";
                                }
                                for($i = 1; $i<= $jmlhal; $i++)
                                {
                                         if ((($i >= $halaman - 3) && ($i <= $halaman + 3)) || ($i == 1) || ($i == $jmlhal))
                                         {
                                            if (($showPage == 1) && ($i != 2))  echo "<li class='visible-xs'>...</li>";
                                            if (($showPage != ($jmlhal - 1)) && ($i == $jmlhal))  echo "<li  class='visible-xs'>...</li>";
                                            if ($i == $halaman) echo " <li class='hidden-xs'><a href='#'>".$i."</a></li> ";
                                      else {
                                        ?>
                                  <li class="hidden-xs"><a href="<? echo "$d[url]"?>/berita/<?echo $i?>" aria-label="hlm <? echo $i?>"> <? echo $i?> </a></li>
                                      <?
                                    }
                                 $showPage = $i;
                                         }
                                }
                                if($halaman<$jmlhal){
                                  $next=$halaman+1;
                                  ?>
                                  <li><a href="<? echo "$d[url]"?>/berita/<?echo $next?>" class="next"> <i class="fa fa-angle-double-right"></i></a></li>
                                <?
                                }
                                else {
                                    echo "<li><a href='#' class='next'>  <i class=\"fa fa-angle-double-right\"></i> </a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- Pagination END -->
                    </div>
                    <!-- Left part END -->
                    <?php include 'kanan.php';?>
                </div>
            </div>
        </div>
        <?} else{ ?> 
    <!-- Content END-->
    <div class="section wb">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 single-content">
                        <?php 
                            $page=$_GET['page'];
                            $batas=2;
                            $halaman=$page;
                            if (empty($halaman)){
                              $posisi=0;
                              $halaman=1;
                            } 
                            else {
                              $posisi=($halaman-1)*$batas;
                            }
                            $query = "SELECT * FROM berita WHERE  publish='Y' ORDER BY id_berita Desc Limit $posisi, $batas";
                            $result1 = $user->getData($query);
                            $ur=1;
                            foreach ($result1 as $key => $rd) {
                            $isi_artikel = strip_tags($rd['isi_berita']); // membuat paragraf pada isi berita dan mengabaikan tag html
                            $isi = substr($isi_artikel,0,200); // ambil sebanyak 100 karakter
                            $isi = substr($isi_artikel,0,strrpos($isi," ")); // potong per spasi kalimat
                            $tgl=date("d", strtotime($rd['tanggal']));
                            $thn=date("Y", strtotime($rd['tanggal']));
                            $tanggal=date("M, d", strtotime($rd['tanggal']));
                            $dibaca=$user->format_angka($rd['dibaca']);
                            
                            ?>
                        <p class="mb-5"> <a href="<? echo "$d[url]"?>/dberita/<?echo "$rd[judul_seo]"?>"><img src="<? echo "$d[url]"?>/foto_berita/small_<? echo"$rd[gambar]"?>"></a> </p>

                            <h1 class="mb-4"><a href="<? echo "$d[url]"?>/dberita/<?echo "$rd[judul_seo]"?>"><?echo "$rd[judul]"?></a></h1>
                                <div class="post-meta d-flex mb-5">
              
                              <div class="vcard">
                                <span class="d-block"><a href="#">Bambang</a> in <a href="#"><? echo"$rd[sumber]"?></a></span>
                                <span class="date-read"><? echo"$tanggal"?> <span class="mx-1">&bullet;</span> <? echo"$rd[dibaca]"?> read <span class="icon-star2"></span></span>
                              </div>
                            </div>
                                <div class="message-box">
                                    <p><?echo "$isi"?></p>
                                    <a href="<? echo "$d[url]"?>/dberita/<?echo "$rd[judul_seo]"?>" title="READ MORE" rel="bookmark" class="site-button-link">more <i class="fa fa-angle-double-right"></i></a>
                                </div>
                        <?}?>
                        
                        
                        <!-- Pagination start -->
                        <div class="pagination-bx m-b30">
                            <?php 
                            $result = $mysqli->query("SELECT * FROM berita WHERE  publish='Y'");
                                /* determine number of rows result set */
                                $row_cnt = $result->num_rows;
                            // a SELECT query will generate a mysqli_result
                            $jmlhal = ceil($row_cnt/$batas);
                            $showPage="";
                            ?>
                            <ul class="pagination">
                                <? 
                                if($halaman > 1){
                                  $prev=$halaman-1;
                                  ?>
                                  <li><a href="<? echo "$d[url]"?>/berita/<?echo $prev?>" class="previous"> <i class="fa fa-angle-double-left"></i> </a></li>
                                <?
                                }
                                else {
                                  echo " <li><a href='#' class='previous'><i class=\"fa fa-angle-double-left\"></i> </a></li>";
                                }
                                for($i = 1; $i<= $jmlhal; $i++)
                                {
                                         if ((($i >= $halaman - 3) && ($i <= $halaman + 3)) || ($i == 1) || ($i == $jmlhal))
                                         {
                                            if (($showPage == 1) && ($i != 2))  echo "<li class='visible-xs'>...</li>";
                                            if (($showPage != ($jmlhal - 1)) && ($i == $jmlhal))  echo "<li  class='visible-xs'>...</li>";
                                            if ($i == $halaman) echo " <li class='hidden-xs'><a href='#'>".$i."</a></li> ";
                                      else {
                                        ?>
                                  <li class="hidden-xs"><a href="<? echo "$d[url]"?>/berita/<?echo $i?>" aria-label="hlm <? echo $i?>"> <? echo $i?> </a></li>
                                      <?
                                    }
                                 $showPage = $i;
                                         }
                                }
                                if($halaman<$jmlhal){
                                  $next=$halaman+1;
                                  ?>
                                  <li><a href="<? echo "$d[url]"?>/berita/<?echo $next?>" class="next"> <i class="fa fa-angle-double-right"></i></a></li>
                                <?
                                }
                                else {
                                    echo "<li><a href='#' class='next'>  <i class=\"fa fa-angle-double-right\"></i> </a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- Pagination END -->
                    </div>
                    <!-- Left part END -->
                    <?php include 'kanan.php';?>
                </div>
            </div>
        </div>
        <?php } ?>


         


        </div>
        
      </div>
    </div>