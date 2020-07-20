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

  // Hapus event
  if ($module=='event' AND $act=='hapus'){
      $nama=$user->detail_event($_GET['id']);

      // hapus file gambar yang berhubungan dengan event tersebut
      @unlink("../../../foto_event/$nama[gambar]");   
      @unlink("../../../foto_event/small_$nama[gambar]"); 
      // hapus data event di database 
      $del=$user->delete_event($_GET['id']);    
    
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

  // Input event
  elseif ($module=='event' AND $act=='input'){
    //kelola foto
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $tipe_file   = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak        = rand(1,99);
    $nama_gambar = $acak.$nama_file; 
    $random=$user->random(7);

    $nama_event = $user->escape_string($_POST['nama_event']); 
    $tgl_mulai = $user->escape_string($_POST['tgl_mulai']); 
    $tgl_akhir = $user->escape_string($_POST['tgl_akhir']); 
    $tempat = $user->escape_string($_POST['tempat']); 
    $deskripsi = $user->escape_string($_POST['deskripsi']);
    $tgl_mulai=date('Y-m-d', strtotime($tgl_mulai));
    $tgl_akhir=date('Y-m-d', strtotime($tgl_akhir));

    $msg = $validation->check_empty($_POST, array('nama_event','deskripsi'));
    // checking empty fields
  if($msg != null) {
    echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Ops",
    text: "'.$msg.'",
    type: "warning"
    }, function(){
        window.location.href = "../../index.php?module=event&act=tambahevent";
    });</script>';
  } else {
   if(empty($lokasi_file)){

    $simpan_event = $user->simpan_event($nama_event, $tgl_mulai, $tgl_akhir, $tempat, $deskripsi);
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
              window.location.href = "../../index.php?module=event&act=tambahevent";
          });</script>';
      }
      else{
//simpan photo baru
        $folder = "../../../foto_event/"; // folder untuk photo
        $ukuran = 365;                     
        $gb=$gambar->UploadFoto($nama_gambar, $folder, $ukuran);

        $simpan_event = $user->simpan_event_gb($nama_event, $tgl_mulai, $tgl_akhir, $tempat, $deskripsi, $nama_gambar);
        
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
  // Update event
  elseif ($module=='event' AND $act=='update'){
          
    $id    = $_POST['id'];
    $user=new User();
    $r=$user->detail_event($id);
     //kelola foto
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $tipe_file   = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak        = rand(1,99);
    $nama_gambar = $acak.$nama_file; 
    $random=$user->random(7);
    //
    $nama_event = $user->escape_string($_POST['nama_event']); 
    $tgl_mulai = $user->escape_string($_POST['tgl_mulai']); 
    $tgl_akhir = $user->escape_string($_POST['tgl_akhir']); 
    $tempat = $user->escape_string($_POST['tempat']); 
    $deskripsi = $user->escape_string($_POST['deskripsi']);
    $tgl_mulai=date('Y-m-d', strtotime($tgl_mulai));
    $tgl_akhir=date('Y-m-d', strtotime($tgl_akhir));

   $msg = $validation->check_empty($_POST, array('nama_event','deskripsi')); 
   if($msg != null) {
     echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Oops",
    text: "'.$msg.'",
    type: "warning"
    }, function(){
        window.location.href = "../../index.php?module=event&act=editevent&id='.$id.'";
    });</script>';
  }else{

   if (empty($lokasi_file)){         
      $update_user = $user->update_event($nama_event, $tgl_mulai, $tgl_akhir, $tempat, $deskripsi, $id);
    
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
              window.location.href = "../../index.php?module=event&act=tambahevent";
          });</script>';
            } else {

      //hapus photo lama
      $nama=$user->detail_event($id);

      // hapus file gambar yang berhubungan dengan event tersebut
      @unlink("../../../foto_event/$nama[foto]");   
      @unlink("../../../foto_event/small_$nama[foto]");
      //simpan photo baru
        $folder = "../../../foto_event/"; // folder untuk photo
        $ukuran = 365;                     // photo diperkecil (thumb)
        $gb=$gambar->UploadFoto($nama_gambar, $folder, $ukuran);


        $update_user = $user->update_event_gb($nama_event, $tgl_mulai, $tgl_akhir, $tempat, $deskripsi, $nama_gambar, $id); 

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
