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

  // Hapus berita
  if ($module=='berita' AND $act=='hapus'){
      $nama=$user->detail_berita($_GET['id']);

      // hapus file gambar yang berhubungan dengan berita tersebut
      @unlink("../../../foto_berita/$nama[gambar]");   
      @unlink("../../../foto_berita/small_$nama[gambar]"); 
      // hapus data berita di database 
      $del=$user->delete_berita($_GET['id']);    
    
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

  // Input berita
  elseif ($module=='berita' AND $act=='input'){
    //kelola foto
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $tipe_file   = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak        = rand(1,99);
    $nama_gambar = $acak.$nama_file; 
    $random=$user->random(7);

    $judul = $user->escape_string($_POST['judul']); 
    $sumber = $user->escape_string($_POST['sumber']);           
    $judul_seo  = $user->seo_title($judul);
    $publish    = $_POST['publish'];
    $isi_berita = $user->escape_string($_POST['isi_berita']);
    $tanggal=date('Y-m-d');
    $username=$user->escape_string($_POST['username']);
    $judul_seo=''.$acak.'-'.$judul_seo.'';

    $msg = $validation->check_empty($_POST, array('judul','isi_berita'));
    // checking empty fields
  if($msg != null) {
    echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Ops",
    text: "'.$msg.'",
    type: "warning"
    }, function(){
        window.location.href = "../../index.php?module=berita&act=tambahberita";
    });</script>';
  } else {
   if(empty($lokasi_file)){

    $simpan_berita = $user->simpan_berita($sumber, $judul, $judul_seo, $isi_berita, $publish, $username, $tanggal);
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
              window.location.href = "../../index.php?module=berita&act=tambahberita";
          });</script>';
      }
      else{
//simpan photo baru
        $folder = "../../../foto_berita/"; // folder untuk photo
        $ukuran = 365;                     
        $gb=$gambar->UploadFoto($nama_gambar, $folder, $ukuran);

        $simpan_berita = $user->simpan_berita_gb($sumber, $judul, $judul_seo, $isi_berita, $publish, $username, $tanggal, $nama_gambar);
        
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
  // Update berita
  elseif ($module=='berita' AND $act=='update'){
          
    $id    = $_POST['id'];
    $user=new User();
    $r=$user->detail_berita($id);
     //kelola foto
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $tipe_file   = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak        = rand(1,99);
    $nama_gambar = $acak.$nama_file; 
    $random=$user->random(7);
    //
    $judul = $user->escape_string($_POST['judul']); 
    $sumber = $user->escape_string($_POST['sumber']);           
    $publish    = $_POST['publish'];
    $isi_berita = $user->escape_string($_POST['isi_berita']);
    $tanggal=date('Y-m-d');
    $username='$_SESSION[username]';

   $msg = $validation->check_empty($_POST, array('judul','isi_berita')); 
   if($msg != null) {
     echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Oops",
    text: "'.$msg.'",
    type: "warning"
    }, function(){
        window.location.href = "../../index.php?module=berita&act=editberita&id='.$id.'";
    });</script>';
  }else{

   if (empty($lokasi_file)){         
      $update_user = $user->update_berita($sumber, $judul, $isi_berita, $publish, $tanggal, $id);
    
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
              window.location.href = "../../index.php?module=berita&act=tambahberita";
          });</script>';
            } else {

      //hapus photo lama
      $nama=$user->detail_berita($id);

      // hapus file gambar yang berhubungan dengan berita tersebut
      @unlink("../../../foto_berita/$nama[foto]");   
      @unlink("../../../foto_berita/small_$nama[foto]");
      //simpan photo baru
        $folder = "../../../foto_berita/"; // folder untuk photo
        $ukuran = 365;                     // photo diperkecil (thumb)
        $gb=$gambar->UploadFoto($nama_gambar, $folder, $ukuran);


        $update_user = $user->update_berita_gb($sumber, $judul, $isi_berita, $publish,  $tanggal, $nama_gambar, $id); 

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
