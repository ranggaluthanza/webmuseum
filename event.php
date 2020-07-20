<div class="banner-area banner-bg-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="banner">
						<h2>Event</h2>
						<ul class="page-title-link">
							<li><a href="<?php echo "$d[url]"?>">Beranda</a></li>
							<li><a href="#">Event</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div id="features" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Event</h3>
                <p class="lead">Kami akan memberikan informasi tentang event-event pertanian nasional maupun internasional</p>
            </div><!-- end title -->
            <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
              <?
              $hari_ini=date("Y-m-d");
              $query = "SELECT * FROM event WHERE tgl_mulai > '$hari_ini' ORDER BY id_event Asc";
              $result2 = $mysqli->query( $query );
              $ada=$result2->num_rows;
              if($ada>0){
              ?>
              <div class="row">
              <h3 class="text-center">Coming Soon</h3>
          <?php 
                  $no=1;
                  if(is_array($result2) || is_object($result2)){
                  foreach ($result2 as $key => $rd) {
                  $deskripsi = strip_tags($rd['deskripsi']); // membuat paragraf pada isi berita dan mengabaikan tag html
                  $isi = substr($deskripsi,0,190); // ambil sebanyak 100 karakter
                  $isi = substr($deskripsi,0,strrpos($isi," ")); // potong per spasi kalimat
                  if($no%2==0){$event="event-right";}else{$event="event-left";}
                  $tgl_mulai=date("d-m-Y", strtotime($rd['tgl_mulai']));
          $tgl_akhir=date("d-m-Y", strtotime($rd['tgl_akhir']));
          if($tgl_mulai!=$tgl_akhir){$tgl=" ".$tgl_mulai." s/d ".$tgl_akhir."  ";}else{$tgl=$tgl_mulai;}
          ?>              
              <div class="col-lg-6 <?echo "$event"?>">
                <img class="img-fluid" src="foto_event/small_<?echo "$rd[gambar]"?>" alt="" height="230px" width="350px"><br><br>
                <h3> <?=$rd['nama_event']?></h3>
                <h5>Tanggal: <?=$tgl?></h5>
                            <h5>Tempat: <?=$rd['tempat']?></h5>
                <p>
                  <?=$rd['deskripsi']?>
                </p>
                <br>
              </div>
              <?php $no++; }} ?>
            </div>
            <hr>
            <?}else{}?>

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
$hari_ini=date("Y-m-d");
$query = "SELECT * FROM event WHERE tgl_mulai <= '$hari_ini' ORDER BY id_event Desc Limit $posisi, $batas";
$result1 = $user->getData($query);
if(!isset($_GET['page'])){
?>

					<div class="row">
            <h3 class="text-center">Sudah Selesai atau Sedang Berlangsung</h3><br>
	        <?php 
                  $no=1;
                  if(is_array($result1) || is_object($result1)){
                  foreach ($result1 as $key => $rd) {
                  $deskripsi = strip_tags($rd['deskripsi']); // membuat paragraf pada isi berita dan mengabaikan tag html
                  $isi = substr($deskripsi,0,190); // ambil sebanyak 100 karakter
                  $isi = substr($deskripsi,0,strrpos($isi," ")); // potong per spasi kalimat
                  if($no%2==0){$event="event-right";}else{$event="event-left";}
                  $tgl_mulai=date("d-m-Y", strtotime($rd['tgl_mulai']));
  				$tgl_akhir=date("d-m-Y", strtotime($rd['tgl_akhir']));
  				if($tgl_mulai!=$tgl_akhir){$tgl=" ".$tgl_mulai." s/d ".$tgl_akhir."  ";}else{$tgl=$tgl_mulai;}
          ?>							
							<div class="col-lg-6 <?echo "$event"?>">
								<img class="img-fluid" src="foto_event/small_<?echo "$rd[gambar]"?>" alt="" height="230px" width="350px"><br><br>
								<h3> <?=$rd['nama_event']?></h3>
								<h5>Tanggal: <?=$tgl?></h5>
                        		<h5>Tempat: <?=$rd['tempat']?></h5>
								<p>
									<?=$rd['deskripsi']?>
								</p>
								<br>
							</div>
							<?php $no++; }}?>
						</div>
						
        </div><!-- end container -->
    </div><!-- end section -->
					<!-- Pagination start -->
						<div class="container">
                        <div class="pagination-bx m-b30">
                            <?php 
                            $result = $mysqli->query("SELECT * FROM event WHERE tgl_mulai <= '$hari_ini' ");
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
                                  <li><a href="<? echo "$d[url]"?>/event/<?echo $prev?>" class="previous"> <i class="fa fa-angle-double-left"></i> Prev</a></li>
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
                                  <li class="hidden-xs"><a href="<? echo "$d[url]"?>/event/<?echo $i?>" aria-label="hlm <? echo $i?>"> <? echo $i?> </a></li>
                                      <?
                                    }
                                 $showPage = $i;
                                         }
                                }
                                if($halaman<$jmlhal){
                                  $next=$halaman+1;
                                  ?>
                                  <li><a href="<? echo "$d[url]"?>/event/<?echo $next?>" class="next"> <i class="fa fa-angle-double-right"></i></a></li>
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
$query = "SELECT * FROM event WHERE tgl_mulai<='$hari_ini' ORDER BY id_event Desc Limit $posisi, $batas";
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
                            $tgl_mulai=date("d-m-Y", strtotime($rd['tgl_mulai']));
            				$tgl_akhir=date("d-m-Y", strtotime($rd['tgl_akhir']));
            				if($tgl_mulai!=$tgl_akhir){$tgl=" ".$tgl_mulai." s/d ".$tgl_akhir."  ";}else{$tgl=$tgl_mulai;}
                            ?>							
							<div class="col-lg-6 <?echo "$event"?>">
								<img class="img-fluid" src="<? echo "$d[url]"?>/foto_event/small_<?echo "$rd[gambar]"?>" alt="" height="230px" width="350px"><br><br>
								<h3> <?=$rd['nama_event']?></h3>
								<h5>Tanggal: <?=$tgl?></h5>
                        		<h5>Tempat: <?=$rd['tempat']?></h5>
								<p>
									<?=$rd['deskripsi']?>
								</p>
				
							</div>
							<?php $no++; }}?>
						</div>
						
        </div><!-- end container -->
    </div><!-- end section -->
					<!-- Pagination start -->
						<div class="container">
                        <div class="pagination-bx m-b30">
                            <?php 
                            $result = $mysqli->query("SELECT * FROM event WHERE tgl_mulai<='$hari_ini'");
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
                                  <li><a href="<? echo "$d[url]"?>/event/<?echo $prev?>" class="previous"> <i class="fa fa-angle-double-left"></i> Prev</a></li>
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
                                  <li class="hidden-xs"><a href="<? echo "$d[url]"?>/event/<?echo $i?>" aria-label="hlm <? echo $i?>"> <? echo $i?> </a></li>
                                      <?
                                    }
                                 $showPage = $i;
                                         }
                                }
                                if($halaman<$jmlhal){
                                  $next=$halaman+1;
                                  ?>
                                  <li><a href="<? echo "$d[url]"?>/event/<?echo $next?>" class="next"> <i class="fa fa-angle-double-right"></i></a></li>
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