<?php 
/*1 ha antara 120 - 150 batang tanaman dengan jarak tanam 9 x 9*/   
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h2 class=\"fail\">Untuk mengakses modul, Anda harus login dulu.</h2>
        <p class=\"fail\"><a href=\"login.php?auth\">LOGIN</a></p></div>";   
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  // fungsi untuk check box Tag (lahan Terkait) di form input dan edit lahan 
echo "<link rel=\"stylesheet\" href=\"alert/css/sweetalert.css\">";
  $aksi = "modul/mod_pengunjung/aksi_pengunjung.php";

  // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    // Tampil lahan
    default:
echo"<div class=\"header bg-gradient-primary pb-8 pt-5 pt-md-8\">
      <div class=\"container-fluid\">
      </div>
    </div>
    <div class=\"container-fluid mt--7\">
      <!-- Table -->
      <div class=\"row\">
        <div class=\"col\">
          <div class=\"card shadow\">
            <div class=\"card-header border-0\">
              <h3 class=\"mb-0\">Pengunjung &nbsp; &nbsp; &nbsp;
              <!--  <button type=\"button\" class=\"mb-1 btn btn-primary\" onclick=location.href=\"?module=pengunjung&act=tambahpengunjung\">+ Tambah Pengunjung</button> -->
              </h3>
            </div>
            <div class=\"card-body\">
             <div class=\"table-responsive\">
            <table class=\"table table-bordered table-striped\" id=\"example\" >
              <thead>
                <tr>
                  <th>No.</th>
                  <th>IP</th>
                  <th>Browser</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                </tr>
              </thead>
              <tbody>";
						  $user=new User();
					      $news=$user->tampil_pengunjung();  
					      $no = 1;
					      if(is_array($news) || is_object($news)){
					      foreach ($news as $key => $r) { 
					      $jam=date('H:i:s', strtotime($r['date_create']));
                $tgl=date('d M Y', strtotime($r['date_create']));
								echo"<tr>
									<td>$no</td>
									<td>$r[ip]</td>
									<td>$r[browser]</td>
									<td>$tgl</td>
									<td>$jam</td>
   		          			</tr>";
				        $no++;
				      }
				    }
								
							echo"</tbody>
						</table>
          </div>
        </div>


          </div>
        </div>
      </div>";
break;

///////


	}
}
?>
<script type="text/javascript">
         function radioValidation(){
        var gender = document.getElementsByName('jk');
        var genValue = false;
        for(var i=0; i<gender.length;i++){
            if(gender[i].checked == true){
                genValue = true;    
            }
        }
        if(!genValue){
            alert("Pilih Jenis Kelamin");
            return false;
        }

    }
        </script>

<script src="alert/js/sweetalert.min.js"></script>
  <script>
        jQuery(document).ready(function($){
            $('.delete-link').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: 'Peringatan',
                        text: 'Anda Yakin Akan Menghapus Data ini?',
                        type: 'warning',
                        html: true,
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,
                        },function(){
                        window.location.href = getLink
                    });
                return false;
            });
        });
    </script>
