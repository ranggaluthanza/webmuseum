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
  include "../../../config/fungsi_thumbnail2.php";
  
  echo '<script src="../../dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../../dist/sweetalert.css">';

  $user = new User();
  $tanggal=new Tanggal();
  $validation=new Validation();
  $gambar=new Gambar();

  $module = $_GET['module'];
  $act    = $_GET['act'];

  // Hapus profil
  if ($module=='profil' AND $act=='hapus'){
      $nama=$user->detail_profil($_GET['id']);

      // hapus file gambar yang berhubungan dengan profil tersebut
      @unlink("../../../foto_profil/$nama[gambar]");   
      @unlink("../../../foto_profil/small_$nama[gambar]"); 
      // hapus data profil di database 
      $del=$user->delete_profil($_GET['id']);    
    
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

  // Input profil
  elseif ($module=='profil' AND $act=='input'){
    //kelola foto
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $tipe_file   = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak        = rand(1,99);
    $nama_gambar = $acak.$nama_file; 
    $random=$user->random(7);

    $tentang = $user->escape_string($_POST['tentang']); 
    $judul = $user->escape_string($_POST['judul']); 
    $deskripsi = $user->escape_string($_POST['deskripsi']);           
    
    $msg = $validation->check_empty($_POST, array('tentang','deskripsi'));
    // checking empty fields
  if($msg != null) {
    echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Ops",
    text: "'.$msg.'",
    type: "warning"
    }, function(){
        window.location.href = "../../index.php?module=profil&act=tambahprofil";
    });</script>';
  } else {
   if(empty($lokasi_file)){

    $simpan_profil = $user->simpan_profil($tentang, $judul, $deskripsi);
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
              window.location.href = "../../index.php?module=profil&act=tambahprofil";
          });</script>';
      }
      else{
//simpan photo baru
        $folder = "../../../foto_profil/"; // folder untuk photo
        $ukuran = 365;                     
        $gb=$gambar->UploadFoto($nama_gambar, $folder, $ukuran);

        $simpan_profil = $user->simpan_profil_gb($tentang, $judul, $deskripsi, $nama_gambar);
        
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
  // Update profil
  elseif ($module=='profil' AND $act=='update'){
          
    $id    = $_POST['id'];
    $user=new User();
    $r=$user->detail_profil($id);
     //kelola foto
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $tipe_file   = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak        = rand(1,99);
    $nama_gambar = $acak.$nama_file; 
    $random=$user->random(7);
    //
    $tentang = $user->escape_string($_POST['tentang']); 
    $judul = $user->escape_string($_POST['judul']); 
    $deskripsi = $user->escape_string($_POST['deskripsi']);

   $msg = $validation->check_empty($_POST, array('tentang')); 
   if($msg != null) {
     echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Oops",
    text: "'.$msg.'",
    type: "warning"
    }, function(){
        window.location.href = "../../index.php?module=profil&act=editprofil&id='.$id.'";
    });</script>';
  }else{

   if (empty($lokasi_file)){         
      $update_user = $user->update_profil($tentang, $judul, $deskripsi, $id);
    
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
              window.location.href = "../../index.php?module=profil&act=tambahprofil";
          });</script>';
            } else {

      //hapus photo lama
      $nama=$user->detail_profil($id);

      // hapus file gambar yang berhubungan dengan profil tersebut
      @unlink("../../../foto_profil/$nama[foto]");   
      @unlink("../../../foto_profil/small_$nama[foto]");
      //simpan photo baru
        $folder = "../../../foto_profil/"; // folder untuk photo
        $ukuran = 550;                     // photo diperkecil (thumb)
        $gb=$gambar->UploadFoto($nama_gambar, $folder, $ukuran);


        $update_user = $user->update_profil_gb($tentang, $judul, $deskripsi, $nama_gambar, $id); 

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
