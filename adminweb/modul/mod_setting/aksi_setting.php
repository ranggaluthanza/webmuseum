<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h2 class=\"fail\">Untuk mengakses modul, Anda harus login dulu.</h2>
        <p class=\"fail\"><a href=\"index.php\">LOGIN</a></p></div>";   
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../../config/class.admin.php";
  include_once '../../../config/validation.php';
  include "../../../config/library.php";
  
  
  echo '<script src="../../dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../../dist/sweetalert.css">';

  $user = new User();
  $tanggal=new Tanggal();
  $validation=new Validation();


  $module = $_GET['module'];
  $act    = $_GET['act'];

  // Hapus setting
  if ($module=='setting' AND $act=='hapus'){
      $nama=$user->detail_setting($_GET['id']);

      // hapus file gambar yang berhubungan dengan setting tersebut
      @unlink("../../../foto_setting/$nama[gambar]");   
      @unlink("../../../foto_setting/small_$nama[gambar]"); 
      // hapus data setting di database 
      $del=$user->delete_setting($_GET['id']);    
    
  echo '<p>&nbsp;</p>
        <script language="javascript">swal({
        title: "Hapus",
        text: "Data Sudah Dihapus",
        type: "success"
        }, function(){
              window.location.href = "../../index.php?module='.$module.'";
        });</script>';
  //  header("location:../../index.php?module=".$module);
  }

 
  // Update setting
  elseif ($module=='setting' AND $act=='update'){
          
    $id    = $_POST['id'];
    $user=new User();
    $r=$user->detail_setting($id);
     //kelola foto
  
    $url = $user->escape_string($_POST['url']); 
    $owner = $user->escape_string($_POST['owner']); 
    $email = $user->escape_string($_POST['email']);
    $tahun = $user->escape_string($_POST['tahun']);

   $msg = $validation->check_empty($_POST, array('url')); 
   if($msg != null) {
     echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Oops",
    text: "'.$msg.'",
    type: "warning"
    }, function(){
        window.location.href = "../../index.php?module=setting&act=editsetting&id='.$id.'";
    });</script>';
  }else{
       
      $update_user = $user->update_setting($url, $owner, $email, $tahun, $id);
    
       echo '<p>&nbsp;</p>
          <script language="javascript">swal({
            title: "Success!",
            text: "Data Sudah Diubah",
            type: "success"
          }, function(){
                window.location.href = "../../index.php?module='.$module.'";
          });</script>';
   
      }
    }
  }
?>
