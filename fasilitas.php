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

    <div id="features" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Fasilitas Museum</h3>
                <p class="lead">Fasilitas yang tersedia di Museum Tanah dan Pertanian Bogor <br>Lantai 1, Lantai 2 dan Lantai 3</p>
            </div><!-- end title -->

   <?php
$user=new User();
$page=(isset($_GET['page'])) ;
$batas=4;
$halaman=$page;
if (empty($halaman)){
  $posisi=0;
  $halaman=1;
} 
else {
  $posisi=($halaman-1)*$batas;
}
$query = "SELECT * FROM fasilitas ORDER BY id_fasilitas Desc Limit $posisi, $batas";
$result1 = $user->getData($query);
if(!isset($_GET['page'])){
?>

					<div class="row">
						<?php 
                            $no=1;
                            if(is_array($result1) || is_object($result1)){
                            foreach ($result1 as $key => $rd) {
                            $deskripsi = strip_tags($rd['deskripsi']); // membuat paragraf pada isi berita dan mengabaikan tag html
                            $isi = substr($deskripsi,0,190); // ambil sebanyak 100 karakter
                            $isi = substr($deskripsi,0,strrpos($isi," ")); // potong per spasi kalimat
                            if($no%2==0){$event="event-right";}else{$event="event-left";}
                            ?>							
							<div class="col-lg-6 <?echo "$event"?>">
								<img class="img-fluid" src="foto_fasilitas/small_<?echo "$rd[gambar]"?>" alt="" height="230px" width="350px"><br><br>
								<a href="dfasilitas/<?echo "$rd[nama_seo]"?>"><h3><?=$rd['nama_fasilitas']?></h3></a>
								<h6></h6>
								<p>
									<?=$isi?>
								</p>
								<a href="dfasilitas/<?echo "$rd[nama_seo]"?>" class="primary-btn text-uppercase">View Details</a><br><br>
							</div>
							<?php $no++; }}?>
						</div>
						
        </div><!-- end container -->
    </div><!-- end section -->
					<!-- Pagination start -->
						<div class="container">
                        <div class="pagination-bx m-b30">
                            <?php 
                            $result = $mysqli->query("SELECT * FROM fasilitas");
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
                                  <li><a href="<? echo "$d[url]"?>/fasilitas/<?echo $prev?>" class="previous"> <i class="fa fa-angle-double-left"></i> Prev</a></li>
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
                                  <li class="hidden-xs"><a href="<? echo "$d[url]"?>/fasilitas/<?echo $i?>" aria-label="hlm <? echo $i?>"> <? echo $i?> </a></li>
                                      <?
                                    }
                                 $showPage = $i;
                                         }
                                }
                                if($halaman<$jmlhal){
                                  $next=$halaman+1;
                                  ?>
                                  <li><a href="<? echo "$d[url]"?>/fasilitas/<?echo $next?>" class="next"> <i class="fa fa-angle-double-right"></i></a></li>
                                <?
                                }
                                else {
                                    echo "<li><a href='#' class='next'>  <i class=\"fa fa-angle-double-right\"></i> </a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                        <!-- Pagination END -->

    <?php }else {
$page=$_GET['page'];
$batas=4;
$halaman=$page;
if (empty($halaman)){
  $posisi=0;
  $halaman=1;
} 
else {
  $posisi=($halaman-1)*$batas;
}
$query = "SELECT * FROM fasilitas ORDER BY id_fasilitas Desc Limit $posisi, $batas";
$result1 = $user->getData($query);
?>

					<div class="row">
						<?php 
                            $no=1;
                            if(is_array($result1) || is_object($result1)){
                            foreach ($result1 as $key => $rd) {
                            $deskripsi = strip_tags($rd['deskripsi']); // membuat paragraf pada isi berita dan mengabaikan tag html
                            $isi = substr($deskripsi,0,190); // ambil sebanyak 100 karakter
                            $isi = substr($deskripsi,0,strrpos($isi," ")); // potong per spasi kalimat
                            if($no%2==0){$event="event-right";}else{$event="event-left";}
                            ?>							
							<div class="col-lg-6 <?echo "$event"?>">
								<img class="img-fluid" src="<? echo "$d[url]"?>/foto_fasilitas/small_<?echo "$rd[gambar]"?>" alt="" height="230px" width="350px"><br><br>
                <a href="dfasilitas/<?echo "$rd[nama_seo]"?>"><h3><?=$rd['nama_fasilitas']?></h3></a>
								<h6></h6>
								<p>
									<?=$isi?>
								</p>
								<a href="<? echo "$d[url]"?>/dfasilitas/<?echo "$rd[nama_seo]"?>" class="primary-btn text-uppercase">View Details</a><br><br>
							</div>
							<?php $no++; }}?>
						</div>
						
        </div><!-- end container -->
    </div><!-- end section -->
					<!-- Pagination start -->
						<div class="container">
                        <div class="pagination-bx m-b30">
                            <?php 
                            $result = $mysqli->query("SELECT * FROM fasilitas");
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
                                  <li><a href="<? echo "$d[url]"?>/fasilitas/<?echo $prev?>" class="previous"> <i class="fa fa-angle-double-left"></i> Prev</a></li>
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
                                  <li class="hidden-xs"><a href="<? echo "$d[url]"?>/fasilitas/<?echo $i?>" aria-label="hlm <? echo $i?>"> <? echo $i?> </a></li>
                                      <?
                                    }
                                 $showPage = $i;
                                         }
                                }
                                if($halaman<$jmlhal){
                                  $next=$halaman+1;
                                  ?>
                                  <li><a href="<? echo "$d[url]"?>/fasilitas/<?echo $next?>" class="next"> <i class="fa fa-angle-double-right"></i></a></li>
                                <?
                                }
                                else {
                                    echo "<li><a href='#' class='next'>  <i class=\"fa fa-angle-double-right\"></i> </a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                        <!-- Pagination END -->
                   <?php }?>     