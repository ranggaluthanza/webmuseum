<?php 
 
$koneksi = mysqli_connect("localhost","root","","db_web_museum");
 
// Check connection
if (mysqli_connect_errno()){
  echo "Koneksi database gagal : " . mysqli_connect_error();
}
if ($koneksi){
  echo "Koneksi Berhasil";
}
 
?>