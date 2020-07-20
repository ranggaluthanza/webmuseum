 <?php
 if (isset($_GET['module'])) {
            if ($_GET['module']=="home") {
              include 'home.php';
            }
            elseif ($_GET['module']=="berita") {
               include "modul/mod_berita/berita.php";
            }
            elseif ($_GET['module']=="admin") {
              include "modul/mod_admin/admin.php";
            }
            elseif ($_GET['module']=="event") {
              include "modul/mod_event/event.php";
            }
            elseif ($_GET['module']=="fasilitas") {
              include "modul/mod_fasilitas/fasilitas.php";
            }
            elseif ($_GET['module']=="identitas") {
              include "modul/mod_identitas/identitas.php";
            }
            elseif ($_GET['module']=="pengunjung") {
              include "modul/mod_pengunjung/pengunjung.php";
            }
            elseif ($_GET['module']=="kontak") {
              include "modul/mod_kontak/kontak.php";
            }
            elseif ($_GET['module']=="setting") {
              include "modul/mod_setting/setting.php";
            }
            elseif ($_GET['module']=="maps") {
              include "modul/mod_maps/maps.php";
            }
            elseif ($_GET['module']=="profile") {
              include "modul/mod_detail/detail.php";
            }
            elseif ($_GET['module']=="proseslogin") {
              include 'proseslogin.php';            
            }
            elseif ($_GET['module']=="logout") {
              session_destroy();
              echo "<script>location='login/';</script>";
            }
          }
          else{
            echo"modul tidak ditemukan";
           // include 'kanan1.php';
          }
        ?>