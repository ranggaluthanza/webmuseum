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