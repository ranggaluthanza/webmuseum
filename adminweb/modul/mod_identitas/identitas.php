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
  $aksi = "modul/mod_identitas/aksi_identitas.php";

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
              <!--  <button type=\"button\" class=\"mb-1 btn btn-primary\" onclick=location.href=\"?module=identitas&act=tambahidentitas\">+ Tambah Identitas</button> -->
              </h3>
            </div>
            <div class=\"card-body\">
             <div class=\"table-responsive\">
            <table class=\"table table-bordered table-striped\" id=\"example\" >
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Tentang</th>
                  <th>Judul</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>";
						  $user=new User();
					      $news=$user->tampil_identitas();  
					      $no = 1;
					      if(is_array($news) || is_object($news)){
					      foreach ($news as $key => $r) { 
					      	             $judul = strip_tags($r['judul']); 
	                            $jud = substr($judul,0,60); // ambil sebanyak 100 karakter
	                            $jud = substr($judul,0,strrpos($jud," ")); // potong per spasi kalimat
	                            $jk = strlen($judul);
	                            if($jk<65){$judulnya=$judul;}else{$judulnya= ''.$jud. ' ...';}
								echo"<tr>
									<td>$no</td>
									<td>$r[tentang]</td>
									<td>$judulnya</td>
									<td>";
									if($r['gambar']!=""){
										echo "<img src=\"../foto_identitas/small_$r[gambar]\" class=\"img-circle\" alt=\"user image\" width=\"80px\">";
									}else{
										echo "-";
									}
									echo "</td>
									<td width=100px>
				                  <a href=\"?module=identitas&act=editidentitas&id=$r[id_identitas]\" class=\"text-blue\" title=\"Edit Data\"><i class=\"fas fa-edit\"></i> </a> &nbsp;&nbsp;&nbsp;

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
case "tambahidentitas":
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
              <h3 class=\"mb-0\">Tambah Identitas</h3>
            </div>
            <div class=\"card-body\">	 						
						<form class=\"horizontal-form\" method=\"POST\" enctype=\"multipart/form-data\" action=\"$aksi?module=identitas&act=input\">
						<input type=hidden name=\"username\" value=\"$_SESSION[username]\">
						<div class=\"form-group row\">
							<div class=\"col-12 col-md-3 text-right\">
								<label for=\"\">Tentang</label>
							</div>
							<div class=\"col-12 col-md-9 input-group-sm\">
								<input type=\"text\" name=\"tentang\" class=\"form-control\" placeholder=\"tentang\" required>
							</div>
						</div>
            <div class=\"form-group row\">
              <div class=\"col-12 col-md-3 text-right\">
                <label for=\"\">Judul</label>
              </div>
              <div class=\"col-12 col-md-9 input-group-sm\">
                <input type=\"text\" name=\"judul\" class=\"form-control\"  required>
              </div>
            </div>
						<div class=\"form-group row\">
							<div class=\"col-12 col-md-3 text-right\">
								<label for=\"\">Deskripsi</label>
							</div>
							<div class=\"col-12 col-md-9\">
								<textarea name=\"deskripsi\" id=\"info\" class=\"form-control\"  rows=\"10\"></textarea>
							</div>
						</div>

						<div class=\"form-group row\">
							<div class=\"col-12 col-md-3 text-right\">
								<label for=\"\">Gambar</label>
							</div>
							<div class=\"col-12 col-md-9 input-group-sm\">
		                            <input type='file' title=\"Photo\"    class='form-control' name=\"fupload\"/>
		                <p class='help-block'>File types support : JPG, JPEG, PNG, GIF</p>
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

///////
case "editidentitas":
$user=new User();
$r=$user->detail_identitas($_GET['id']);
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
              <h3 class=\"mb-0\">Ubah Identitas</h3>
            </div>
            <div class=\"card-body\">	 						
						<form class=\"horizontal-form\" enctype=\"multipart/form-data\" method=\"POST\" action=\"$aksi?module=identitas&act=update\">
						<input type=\"hidden\" name=\"id\" value=\"$_GET[id]\" >
							<div class=\"form-group row\">
              <div class=\"col-12 col-md-3 text-right\">
                <label for=\"\">Tentang</label>
              </div>
              <div class=\"col-12 col-md-9 input-group-sm\">
                <input type=\"text\" name=\"tentang\" class=\"form-control\" value=\"$r[tentang]\" required>
              </div>
            </div>
            <div class=\"form-group row\">
              <div class=\"col-12 col-md-3 text-right\">
                <label for=\"\">Judul</label>
              </div>
              <div class=\"col-12 col-md-9 input-group-sm\">
                <input type=\"text\" name=\"judul\" class=\"form-control\" value=\"$r[judul]\">
              </div>
            </div>
            <div class=\"form-group row\">
              <div class=\"col-12 col-md-3 text-right\">
                <label for=\"\">Deskripsi</label>
              </div>
              <div class=\"col-12 col-md-9\">
                <textarea name=\"deskripsi\" id=\"info\" class=\"form-control\"  rows=\"10\">$r[deskripsi]</textarea>
              </div>
            </div>
						<div class=\"form-group row\">
								<div class=\"col-12 col-md-3 text-right\">
									<label for=\"\">Gambar</label>
								</div>";
								if($r['gambar']!=""){
									$katain="Ganti Gambar ";
								echo "<img src=\"../foto_identitas/small_$r[gambar]\" class=\"img-circle\" alt=\"user image\" width=\"120px\">";
								}else{
									$katain="Tambah Gambar ";
									echo "belum ada gambar";
								}
								
							echo "</div>

						<div class=\"form-group row\">
							<div class=\"col-12 col-md-3 text-right\">
								<label for=\"\">$katain</label>
							</div>
							<div class=\"col-12 col-md-9 input-group-sm\">
		                    <input type='file' title=\"Photo\"    class='form-control' name=\"fupload\"/>
		                <p class='help-block'>File types support : JPG, JPEG, PNG, GIF</p>
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
<script type="text/javascript" src="alert/js/jquery-2.1.4.min.js"></script>
<script src="alert/js/sweetalert.min.js"></script>
<script>
	$('#status').on('change',function(){
    if( $(this).val()==="Menikah"){
    $("#tanggungan").show();
     $('#anak').attr('required', true)
    }
    else{
    $("#tanggungan").hide()
    $('#anak').attr('required', false)
    }
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#detModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detail.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
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
