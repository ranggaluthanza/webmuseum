<?php
if ($_GET['module']=='home'){
include "muka.php"; 
}
elseif ($_GET['module']=="tentang") {
include 'tentang.php';
}
elseif ($_GET['module']=="berita") { 
include 'berita.php';
}
elseif ($_GET['module']=="detail_berita") {
include 'berita_detail.php';
}
elseif ($_GET['module']=="event") {
include 'event.php';
}
elseif ($_GET['module']=="fasilitas") {
include 'fasilitas.php'; 
}
elseif ($_GET['module']=="detail_fasilitas") {
include 'fasilitas_detail.php';
}
elseif ($_GET['module']=="galeri") { 
include 'galeri.php'; 
}
elseif ($_GET['module']=="kontak") {
include 'kontak.php'; 
}
else{
include "muka.php";
// include 'kanan1.php';
}
?>