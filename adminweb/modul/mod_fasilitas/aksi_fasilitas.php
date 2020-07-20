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

  // Hapus fasilitas
  if ($module=='fasilitas' AND $act=='hapus'){
      $nama=$user->detail_fasilitas($_GET['id']);

      // hapus file gambar yang berhubungan dengan fasilitas tersebut
      @unlink("../../../foto_fasilitas/$nama[gambar]");   
      @unlink("../../../foto_fasilitas/small_$nama[gambar]"); 
      // hapus data fasilitas di database 
      $del=$user->delete_fasilitas($_GET['id']);    
    
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

  // Input fasilitas
  elseif ($module=='fasilitas' AND $act=='input'){
    //kelola foto
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $tipe_file   = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak        = rand(1,99);
    $nama_gambar = $acak.$nama_file; 
    $random=$user->random(7);

    $nama_fasilitas = $user->escape_string($_POST['nama_fasilitas']); 
    $deskripsi = $user->escape_string($_POST['deskripsi']);           
    $nama_seo  = $user->seo_title($nama_fasilitas);
    $nama_seo=''.$acak.'-'.$nama_seo.'';

    $msg = $validation->check_empty($_POST, array('nama_fasilitas','deskripsi'));
    // checking empty fields
  if($msg != null) {
    echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Ops",
    text: "'.$msg.'",
    type: "warning"
    }, function(){
        window.location.href = "../../index.php?module=fasilitas&act=tambahfasilitas";
    });</script>';
  } else {
   if(empty($lokasi_file)){

    $simpan_fasilitas = $user->simpan_fasilitas($nama_fasilitas, $nama_seo, $deskripsi);
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
              window.location.href = "../../index.php?module=fasilitas&act=tambahfasilitas";
          });</script>';
      }
      else{
//simpan photo baru
        $folder = "../../../foto_fasilitas/"; // folder untuk photo
        $ukuran = 365;                     
        $gb=$gambar->UploadFoto($nama_gambar, $folder, $ukuran);

        $simpan_fasilitas = $user->simpan_fasilitas_gb($nama_fasilitas, $nama_seo, $deskripsi, $nama_gambar);
        
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
  // Update fasilitas
  elseif ($module=='fasilitas' AND $act=='update'){
          
    $id    = $_POST['id'];
    $user=new User();
    $r=$user->detail_fasilitas($id);
     //kelola foto
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $tipe_file   = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak        = rand(1,99);
    $nama_gambar = $acak.$nama_file; 
    $random=$user->random(7);
    //
    $nama_fasilitas = $user->escape_string($_POST['nama_fasilitas']); 
    $deskripsi = $user->escape_string($_POST['deskripsi']);           
    $nama_seo=$r['nama_seo'];

   $msg = $validation->check_empty($_POST, array('nama_fasilitas','deskripsi')); 
   if($msg != null) {
     echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Oops",
    text: "'.$msg.'",
    type: "warning"
    }, function(){
        window.location.href = "../../index.php?module=fasilitas&act=editfasilitas&id='.$id.'";
    });</script>';
  }else{

   if (empty($lokasi_file)){         
      $update_user = $user->update_fasilitas($nama_fasilitas, $nama_seo, $deskripsi, $id);
    
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
              window.location.href = "../../index.php?module=fasilitas&act=tambahfasilitas";
          });</script>';
            } else {

      //hapus photo lama
      $nama=$user->detail_fasilitas($id);

      // hapus file gambar yang berhubungan dengan fasilitas tersebut
      @unlink("../../../foto_fasilitas/$nama[foto]");   
      @unlink("../../../foto_fasilitas/small_$nama[foto]");
      //simpan photo baru
        $folder = "../../../foto_fasilitas/"; // folder untuk photo
        $ukuran = 365;                     // photo diperkecil (thumb)
        $gb=$gambar->UploadFoto($nama_gambar, $folder, $ukuran);


        $update_user = $user->update_fasilitas_gb($nama_fasilitas, $nama_seo, $deskripsi, $nama_gambar, $id); 

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
