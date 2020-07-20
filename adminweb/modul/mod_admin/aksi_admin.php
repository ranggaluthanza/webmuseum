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
  include "../../../config/fungsi_thumbnail.php";
  
  echo '<script src="../../dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../../dist/sweetalert.css">';

  $user = new User();
  $tanggal=new Tanggal();
  $validation=new Validation();
  $gambar=new Gambar();

  $module = $_GET['module'];
  $act    = $_GET['act'];

  // Hapus admin
  if ($module=='admin' AND $act=='hapus'){
      $nama=$user->detail_admin($_GET['id']);

      // hapus file gambar yang berhubungan dengan berita tersebut
      @unlink("../../../photo/$nama[foto]");   
      @unlink("../../../photo/small_$nama[foto]"); 
      // hapus data admin di database 
      $del=$user->delete_admin($_GET['id']);    
    
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

  // Input admin
  elseif ($module=='admin' AND $act=='input'){
    //kelola foto
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $tipe_file   = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak        = rand(1,99);
    $nama_gambar = $acak.$nama_file; 
    $random=$user->random(7);

    $username = $user->escape_string($_POST['username']); 
    $password = $user->escape_string($_POST['password']); 
    $nama_admin = $user->escape_string($_POST['nama_admin']); 
    $email = $user->escape_string($_POST['email']);
    
    $password=md5($password);
    $msg = $validation->check_empty($_POST, array('username','password','nama_admin'));
    $check_admin = $user->check_admin($_POST['username']);
    // checking empty fields
  if($msg != null) {
    echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Ops",
    text: "'.$msg.'",
    type: "warning"
    }, function(){
        window.location.href = "../../index.php?module=admin&act=tambahadmin";
    });</script>';
  } 
  elseif(!$check_admin){
     echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Oops",
    text: "Usrname '.$username.' sudah ada. Gunakan yang lain",
    type: "warning"
    }, function(){
        window.location.href = "../../index.php?module=admin&act=tambahadmin";
    });</script>';
  } else {
   if(empty($lokasi_file)){

    $simpan_admin = $user->simpan_admin($username, $password, $nama_admin, $email);
    echo '<p>&nbsp;</p>
          <script language="javascript">swal({
            title: "Success!",
            text: "Data Berhasil Ditambah",
            type: "success"
          }, function(){
                window.location.href = "../../index.php?module='.$module.'";
          });</script>';
   }

  else {
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/png" AND $tipe_file != "image/gif" ){
        echo '<p>&nbsp;</p>
          <script language="javascript">swal({
          title: "Ops",
          text: "Upload foto gagal. Pastikan ukuran file hanya jpg, png, atau gif.",
          type: "warning"
          }, function(){
              window.location.href = "../../index.php?module=admin&act=tambahadmin";
          });</script>';
      }
      else{
//simpan photo baru
        $folder = "../../../photo/"; // folder untuk photo
        $ukuran = 60;                     
        $gb=$gambar->UploadFoto($nama_gambar, $folder, $ukuran);

        $simpan_admin = $user->simpan_admin_gb($username, $password, $nama_admin, $email, $nama_gambar);
        
        echo '<p>&nbsp;</p>
          <script language="javascript">swal({
            title: "Success!",
            text: "Data Berhasil Ditambah",
            type: "success"
          }, function(){
                window.location.href = "../../index.php?module='.$module.'";
          });</script>';            
      }
    }
      //$tanggal=date("Y-m-d");
  }
}
  // Update admin
  elseif ($module=='admin' AND $act=='update'){
          
    $id    = $_POST['id'];
    $user=new User();
    $r=$user->detail_admin($id);
     //kelola foto
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $tipe_file   = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak        = rand(1,99);
    $nama_gambar = $acak.$nama_file; 
    $random=$user->random(7);
    //
    $username = $user->escape_string($_POST['username']); 
    $password = $user->escape_string($_POST['password']); 
    $nama_admin = $user->escape_string($_POST['nama_admin']); 
    $email = $user->escape_string($_POST['email']); 
    $check_admins = $user->check_admins($_POST['username'], $id);

    if($password==""){
      $password="$r[password]";
    } else{
      $password=md5($_POST['password']);
    }
   if(!$check_admins){
     echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Oops",
    text: "Usrname '.$username.' sudah ada. Gunakan yang lain",
    type: "warning"
    }, function(){
        window.location.href = "../../index.php?module=admin&act=editadmin&id='.$id.'";
    });</script>';
  }else{

   if (empty($lokasi_file)){         
      $update_user = $user->update_admin($username, $password, $nama_admin, $email, $id);
    
       echo '<p>&nbsp;</p>
          <script language="javascript">swal({
            title: "Success!",
            text: "Data Sudah Diubah",
            type: "success"
          }, function(){
                window.location.href = "../../index.php?module='.$module.'";
          });</script>';
   } else { 
          if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/png" AND $tipe_file != "image/gif" ){
              echo '<p>&nbsp;</p>
          <script language="javascript">swal({
          title: "Ops",
          text: "Upload foto gagal. Pastikan ukuran file hanya jpg, png, atau gif.",
          type: "warning"
          }, function(){
              window.location.href = "../../index.php?module=admin&act=tambahadmin";
          });</script>';
            } else {

      //hapus photo lama
      $nama=$user->detail_admin($id);

      // hapus file gambar yang berhubungan dengan berita tersebut
      @unlink("../../../photo/$nama[foto]");   
      @unlink("../../../photo/small_$nama[foto]");
      //simpan photo baru
        $folder = "../../../photo/"; // folder untuk photo
        $ukuran = 60;                     // photo diperkecil (thumb)
        $gb=$gambar->UploadFoto($nama_gambar, $folder, $ukuran);


        $update_user = $user->update_admin_gb($username, $password, $nama_admin, $email, $nama_gambar, $id); 

         echo '<p>&nbsp;</p>
          <script language="javascript">swal({
            title: "Success!",
            text: "Data Telah Diubah",
            type: "success"
          }, function(){
                window.location.href = "../../index.php?module='.$module.'";
          });</script>';  
           }
        }
      }
    }
  }
?>
