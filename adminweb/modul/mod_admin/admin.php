<link rel="stylesheet" href="alert/css/sweetalert.css">
<?php   
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h2 class=\"fail\">Untuk mengakses modul, Anda harus login dulu.</h2>
        <p class=\"fail\"><a href=\"login.php?auth\">LOGIN</a></p></div>";   
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  echo "<link rel=\"stylesheet\" href=\"alert/css/sweetalert.css\">";

  $aksi = "modul/mod_admin/aksi_admin.php";

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
              <h3 class=\"mb-0\">Administrator &nbsp; &nbsp; &nbsp;
                <button type=\"button\" class=\"mb-1 btn btn-primary\" onclick=location.href=\"?module=admin&act=tambahadmin\">+ Tambah Admin</button></h3>
            </div>
            <div class=\"card-body\">
             <div class=\"table-responsive\">
            <table class=\"table table-bordered table-striped\" id=\"example\" >
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Username</th>
                  <th>Nama Admin</th>
                  <th>Email</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>";
						  $user=new User();
					      $news=$user->tampil_admin();  
					      $no = 1;
					      if(is_array($news) || is_object($news)){
					      foreach ($news as $key => $r) { 
								echo"<tr>
									<td>$no</td>
									<td>$r[username]</td>
									<td>$r[nama_admin]</td>
									<td>$r[email_admin]</td>
									<td>";
									if($r['foto']!=""){
										echo "<img src=\"../photo/small_$r[foto]\" class=\"img-circle\" alt=\"user image\" width=\"40px\">";
									}else{
										echo "-";
									}
									echo "</td>
									<td width=100px>
				                  <a href=\"?module=admin&act=editadmin&id=$r[id_admin]\" class=\"text-blue\" title=\"Edit Data\"><i class=\"fas fa-edit\"></i> </a> &nbsp;&nbsp;&nbsp;
				                  <a href=\"$aksi?module=admin&act=hapus&id=$r[id_admin]\" class=\"text-red delete-link\" title=\"Delete Data\"><i class=\"far fa-trash-alt\"></i></a>

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
case "tambahadmin":
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
              <h3 class=\"mb-0\">Tambah Admin</h3>
            </div>
            <div class=\"card-body\">	 						
						<form class=\"horizontal-form\" method=\"POST\" enctype=\"multipart/form-data\" action=\"$aksi?module=admin&act=input\">
						<div class=\"form-group row\">
							<div class=\"col-12 col-md-3 text-right\">
								<label for=\"\">Username</label>
							</div>
							<div class=\"col-12 col-md-9 input-group-sm\">
								<input type=\"text\" name=\"username\" class=\"form-control\" placeholder=\"username\" required>
							</div>
						</div>
						<div class=\"form-group row\">
							<div class=\"col-12 col-md-3 text-right\">
								<label for=\"\">Password</label>
							</div>
							<div class=\"col-12 col-md-9 input-group-sm\">
								<input type=\"password\" name=\"password\" class=\"form-control\" placeholder=\"password\" required>
							</div>
						</div>
						<div class=\"form-group row\">
							<div class=\"col-12 col-md-3 text-right\">
								<label for=\"\">Nama Admin</label>
							</div>
							<div class=\"col-12 col-md-9 input-group-sm\">
								<input type=\"text\" name=\"nama_admin\" class=\"form-control\" placeholder=\"Nama Admin\" required>
							</div>
						</div>
						<div class=\"form-group row\">
							<div class=\"col-12 col-md-3 text-right\">
								<label for=\"\">Email</label>
							</div>
							<div class=\"col-12 col-md-9 input-group-sm\">
								<input type=\"text\" name=\"email\" class=\"form-control\" placeholder=\"email\">
							</div>
						</div>

						<div class=\"form-group row\">
							<div class=\"col-12 col-md-3 text-right\">
								<label for=\"\">Foto</label>
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
case "editadmin":
$user=new User();
$r=$user->detail_admin($_GET['id']);
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
              <h3 class=\"mb-0\">Ubah Admin</h3>
            </div>
            <div class=\"card-body\">	 						
						<form class=\"horizontal-form\" enctype=\"multipart/form-data\" method=\"POST\" action=\"$aksi?module=admin&act=update\">
						<input type=\"hidden\" name=\"id\" value=\"$_GET[id]\" >
							<div class=\"form-group row\">
							<div class=\"col-12 col-md-3 text-right\">
								<label for=\"\">Username</label>
							</div>
							<div class=\"col-12 col-md-9 input-group-sm\">
								<input type=\"text\" name=\"username\" class=\"form-control\" value=\"$r[username]\" required>
							</div>
							</div>
							<div class=\"form-group row\">
								<div class=\"col-12 col-md-3 text-right\">
									<label for=\"\">Password</label>
								</div>
								<div class=\"col-12 col-md-9 input-group-sm\">
									<input type=\"password\" name=\"password\" class=\"form-control\" placeholder=\"bila tidak diganti, jangan diisi\" >
								</div>
							</div>
							<div class=\"form-group row\">
								<div class=\"col-12 col-md-3 text-right\">
									<label for=\"\">Nama Admin</label>
								</div>
								<div class=\"col-12 col-md-9 input-group-sm\">
									<input type=\"text\" name=\"nama_admin\" class=\"form-control\" value=\"$r[nama_admin]\" required>
								</div>
							</div>

							<div class=\"form-group row\">
								<div class=\"col-12 col-md-3 text-right\">
									<label for=\"\">Email</label>
								</div>
								<div class=\"col-12 col-md-9 input-group-sm\">
									<input type=\"text\" name=\"email\" class=\"form-control\" value=\"$r[email_admin]\">
								</div>
							</div>

							<div class=\"form-group row\">
								<div class=\"col-12 col-md-3 text-right\">
									<label for=\"\">Foto</label>
								</div>";
								if($r['foto']!=""){
									$katain="Ganti Foto ";
								echo "<img src=\"../photo/small_$r[foto]\" class=\"img-circle\" alt=\"user image\" width=\"80px\">";
								}else{
									$katain="Tambah Foto ";
									echo "belum ada foto";
								}
								
							echo "</div>

							<div class=\"form-group row\">
								<div class=\"col-12 col-md-3 text-right\">
									<label for=\"\">$katain</label>
								</div>
								<div class=\"col-12 col-md-9 input-group-sm\">
			                    <input type='file' title=\"Photo\"    class='form-control' name=\"fupload\"/>
			                <p class='help-block'>Bila foto tidak diganti, biarkan kosong.</p>
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
