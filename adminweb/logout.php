<?php
session_start();
$_SESSION['username']='';
$_SESSION['password']='';
unset($_SESSION['username']);
unset($_SESSION['password']);
session_unset();
session_destroy();
?>
<script src="dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="dist/sweetalert.css">
  <p>&nbsp;</p>
<script language="javascript">swal({
  title: "Logout",
  text: "Anda telah Logout",
  type: "success"
}, function(){
      window.location.href = "login.php?auth";
});</script>