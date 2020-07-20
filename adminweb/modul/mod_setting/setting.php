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
  $aksi = "modul/mod_setting/aksi_setting.php";

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
              <h3 class=\"mb-0\">Identitas &nbsp; &nbsp; &nbsp;
              <!--  <button type=\"button\" class=\"mb-1 btn btn-primary\" onclick=location.href=\"?module=setting&act=tambahsetting\">+ Tambah Identitas</button> -->
              </h3>
            </div>
            <div class=\"card-body\">
             <div class=\"table-responsive\">
            <table class=\"table table-bordered table-striped\"  >
              <thead>
                <tr>
                  <th>No.</th>
                  <th>URL</th>
                  <th>Owner</th>
                  <th>Email Owner</th>
                  <th>Tahun</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>";
						  $user=new User();
					      $news=$user->tampil_setting();  
					      $no = 1;
					      if(is_array($news) || is_object($news)){
					      foreach ($news as $key => $r) { 
								echo"<tr>
									<td>$no</td>
									<td>$r[url]</td>
									<td>$r[owner]</td>
									<td>$r[email]</td>
                  <td>$r[tahun]</td>
									<td width=100px>
				                  <a href=\"?module=setting&act=editsetting&id=$r[id_info]\" class=\"text-blue\" title=\"Edit Data\"><i class=\"fas fa-edit\"></i> </a> &nbsp;&nbsp;&nbsp;

								</td>
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

///////
case "editsetting":
$user=new User();
$r=$user->detail_setting($_GET['id']);
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
              <h3 class=\"mb-0\">Ubah Setting</h3>
            </div>
            <div class=\"card-body\">	 						
						<form class=\"horizontal-form\" enctype=\"multipart/form-data\" method=\"POST\" action=\"$aksi?module=setting&act=update\">
						<input type=\"hidden\" name=\"id\" value=\"$_GET[id]\" >
							<div class=\"form-group row\">
              <div class=\"col-12 col-md-3 text-right\">
                <label for=\"\">URL</label>
              </div>
              <div class=\"col-12 col-md-9 input-group-sm\"> 
                <input type=\"text\" name=\"url\" class=\"form-control\" value=\"$r[url]\" required>
              </div>
            </div>
            <div class=\"form-group row\">
              <div class=\"col-12 col-md-3 text-right\">
                <label for=\"\">Owner</label>
              </div>
              <div class=\"col-12 col-md-9 input-group-sm\">
                <input type=\"text\" name=\"owner\" class=\"form-control\" value=\"$r[owner]\">
              </div>
            </div>
            <div class=\"form-group row\">
              <div class=\"col-12 col-md-3 text-right\">
                <label for=\"\">Email Owner</label>
              </div>
              <div class=\"col-12 col-md-9 input-group-sm\">
                <input type=\"text\" name=\"email\" class=\"form-control\" value=\"$r[email]\">
              </div>
            </div>
            <div class=\"form-group row\">
              <div class=\"col-12 col-md-3 text-right\">
                <label for=\"\">Tahun Pembuatan</label>
              </div>
              <div class=\"col-12 col-md-9 input-group-sm\">
                <input type=\"text\" name=\"tahun\" class=\"form-control\" value=\"$r[tahun]\">
              </div>
            </div>
            
            
						
						<div class=\"form-footer pt-5 border-top text-center\">
							<button type=\"submit\" class=\"btn btn-primary btn-default\">Simpan </button> &nbsp; &nbsp; &nbsp;
							<input type=\"reset\" class=\"mb-1 btn btn-outline-secondary\" onclick=\"self.history.back()\" value=\"Batal\" />
						</div>
					</form>
						
					</div>
        		</div>


          </div>
        </div>
      </div>";
break;

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
