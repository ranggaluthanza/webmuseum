<?php
 include "config/class.user.php";
 include_once 'config/validation.php';
 $user = new User();
 $validation=new Validation();
 echo '<script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">';

$first_name     = $_POST['first_name'];
$last_name     = $_POST['last_name'];
$email    = $_POST['email'];
$phone   = $_POST['phone'];
$comments = $_POST['comments'];

$msg = $validation->check_empty($_POST, array('first_name', 'email', 'phone', 'comments'));
$check_email = $validation->email_valid($_POST['email']);

    // checking empty fields
  if($msg != null) {
    echo '<p>&nbsp;</p>
    <script language="javascript">swal({
    title: "Ops",
    text: "'.$msg.'",
    type: "warning"
    }, function(){
        window.location.href = "kontak";
    });</script>';
  } elseif (!$check_email) {
  	 echo '<p>&nbsp;</p>
          <script language="javascript">swal({
          title: "Ops",
          text: "Penulisan email tidak valid",
          type: "warning"
          }, function(){
              window.location.href = "kontak";
          });</script>';
  }else{
$tanggal=date('Y-m-d');
$simpan_pesan = $user->simpan_pesan($first_name, $last_name, $email, $phone, $comments, $tanggal);
    echo '<p>&nbsp;</p>
          <script language="javascript">swal({
            title: "Success!",
            text: "Pesan Anda Telah Terkirim.",
            type: "success"
          }, function(){
                window.location.href = "kontak";
          });</script>';
  }        