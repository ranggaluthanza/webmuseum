-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 11:44 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_museum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `email_admin`, `foto`) VALUES
(19, 'dinda001', '1d70fd1ae95c18e397f768d287f08140', 'Dinda Rizky Ramadhanty', 'dindarizky92@gmail.com', '13Pevita.jpg'),
(20, 'Khalviza', '2e1f1288aa17fb65bb72bd4ac7b779d7', 'Khalviza Dwi Shelviani', 'khalviza99shelviani@gmail.com', '31Zara.jpg'),
(25, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `judul_seo` varchar(200) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  `tanggal` date NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `username` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `sumber`, `judul`, `judul_seo`, `isi_berita`, `gambar`, `publish`, `tanggal`, `dibaca`, `username`) VALUES
(56, 'intern', 'Peresmian Museum Tanmah dan Pertanian', '57-peresmian-museum-tanmah-dan-pertanian', '<p>Peresmian Museum Tanmah dan Pertanian vPeresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian Peresmian Museum Tanmah dan Pertanian vPeresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian</p>\r\n<p>Peresmian Museum Tanmah dan Pertanian vPeresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian</p>\r\n<p>Peresmian Museum Tanmah dan Pertanian vPeresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian</p>\r\n<p>Peresmian Museum Tanmah dan Pertanian vPeresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan PertanianPeresmian Museum Tanmah dan Pertanian vPeresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian</p>\r\n<p>Peresmian Museum Tanmah dan Pertanian vPeresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan PertanianPeresmian Museum Tanmah dan Pertanian vPeresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan PertanianPeresmian Museum Tanmah dan Pertanian vPeresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian&nbsp;Peresmian Museum Tanmah dan Pertanian</p>', '57service_04.jpg', 'Y', '2019-10-03', 8, 'admin'),
(49, 'detik', 'Produksi Bawang Putih Naik Tapi Masih Impor, Ini Kata Kementan', 'produksi-bawang-putih', '<p><span style=\"color: #999999; font-family: Raleway, sans-serif; font-size: 15px;\">Kementerian Pertanian (Kementan) resmi membuka Museum Tanah dan Pertanian di Jalan Juanda Bogor Jawa Barat untuk masyarakat umum, Senin (22/4). Sebagai perkenalan, museum menggratiskan tiket masuk selama tiga bulan pertama. \"Setelah peresmian, bakal dibuka pada hari itu juga. Tiga bulan pertama gratis supaya untuk pengenalan, untuk tarif ke depannya kita diskusikan dengan komunitas,\" ujar Sekretaris Jenderal Kementerian Pertanian, Syukur Iwantoro usai peresmian. </span></p>\r\n<p><span style=\"color: #999999; font-family: Raleway, sans-serif; font-size: 15px;\">Bangunan museum yang lokasinya tepat di seberang Museum Zoologi initerdiri dari tiga lantai. Lantai pertama berisi pengetahuan mengenai pertanian dan sejarah pertanian masa lalu, mulai dari sebelum kolonial sampai masa kolonial. Lantai dua berisi replika alat-alat pertanian sejak Indonesia merdeka. Terakhir, lantai tiga berisi replika peralatan tani Indonesia yang digunakan saat ini dan masa mendatang. Salah satunya, seperti drone pertanian, yang berfungsi memudahkan petani untuk menyemprot sawah secara efisien. \"Ini menggambarkan bahwa teknologi pertanian akan mendorong bisnis di bidang pertanian. Sehingga lebih efisien dan memiliki daya saing yang lebih dibanding pertanian sebelumnya,\" kata Syukur. </span></p>\r\n<p><span style=\"color: #999999; font-family: Raleway, sans-serif; font-size: 15px;\">Sementara itu, Menteri Pertanian periode 2009-2014, Suswono di tempat yang sama berharap, museum ini dapat memacu semangat para kaum milenial untuk dapat terlibat di bidang pertanian. Karena, menurutnya sampai sekarang bisnis di bidang pertanian merupakan bisnis menjanjikan. \"Ini membangkitkan spirit milenial, bahwa usaha pertanian sangat menguntungkan. Jangan dianggap sebagai suatu usaha yang tidak menjanjikan,\" kata Suswono. Lebih dari itu, </span></p>\r\n<p><span style=\"color: #999999; font-family: Raleway, sans-serif; font-size: 15px;\">Suswono berharap timbul inovasi dari kaum muda di sektor pertanian. Pasalnya, masalah pertanian erat kaitannya dengan masalah pangan ke depan yang semakin krusial. \"Sudah tergambarkan bagaimana pertanian dari tahun ke tahun. Tentu kita harapannya ke depan generasi muda tetap cinta pertanian,\" tuturnya.</span></p>', '99service_03.jpg', 'Y', '2019-10-03', 8, 'admin'),
(50, 'internal', 'Kunjungan Mahasiswa IPB', 'kunjungan-mahasiswa-ipb', '<p>Kunjungan Mahasiswa IPB&nbsp;Museum Tanah dan Pertanian juga berkolaborasi dengan mahasiswa IPB jurusan Informatika untuk mengembangkan museum</p>\r\n<p>Museum Tanah dan Pertanian juga berkolaborasi dengan mahasiswa IPB jurusan Informatika untuk mengembangkan museum&nbsp;Museum Tanah dan Pertanian juga berkolaborasi dengan mahasiswa IPB jurusan Informatika untuk mengembangkan museum&nbsp;Museum Tanah dan Pertanian juga berkolaborasi dengan mahasiswa IPB jurusan Informatika untuk mengembangkan museum</p>\r\n<p>Museum Tanah dan Pertanian juga berkolaborasi dengan mahasiswa IPB jurusan Informatika untuk mengembangkan museum</p>\r\n<p>Museum Tanah dan Pertanian juga berkolaborasi dengan mahasiswa IPB jurusan Informatika untuk mengembangkan museum</p>', '81service_02.jpg', 'Y', '2019-10-07', 24, 'admin'),
(58, 'Detik', 'Petani Kini Bisa Tanam Padi Sambil Duduk di Bawah Pohon', '69-petani-kini-bisa-tanam-padi-sambil-duduk-di-bawah-pohon', '<p><strong style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\">Kediri</strong><span style=\"color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\">&nbsp;- Menteri Pertanian () Andi Amran Sulaiman menekankan pentingnya pengelolaan sektor pertanian secara modern. Terkait hal ini, Amran Menilai peranan generasi muda sangat dibutuhkan karena pemerintah sudah menyediakan Alat Mesin Pertanian (Alsintan) dengan fungsi teknologi yang canggih.</span><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><span style=\"color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\">\"Penguasaan teknologi sangat penting dalam mewujudkan Indonesia Lumbung Pangan Dunia 2045, serta tantangan Revolusi Industri 4.0 di segala bidang,\" ujar Amran dalam acara Demontrasi Teknologi Mekanisasi 4.0 di Desa Jabon, Kecamatan Banyakan, Kediri, Jawa Timur, Rabu (9/10/2019)</span><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><span style=\"color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\">Menurut Amran, Indonesia harus berani mengalihkan pola tradisional menuju pola modern. Pengalihan ini wajib dilakukan untuk mengimbangi pesatnya kemajuan dunia. Meski demikian, kemajuan tersebut harus diimbangi dengan kemampuan sumber daya manusia yang menguasai mekanisasi.</span><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /></p>\r\n<div class=\"clearfix\" style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; padding: 0px; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px; clear: both !important; height: 0px !important; float: none !important;\">&nbsp;</div>\r\n<center style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\"></center>\r\n<p><span style=\"color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\">\"Dalam menjawab tantangan global dan nasional ini, Kementan melalui Balitbangtan telah menghasilkan produk teknologi inovatif mekanisasi 4.0. Kami berhasil mengembangkan drone penebar benih padi yang mampu menebar hingga satu hektar lahan dalam waktu 1 jam dengan kapasitas 50-60 kilogram per hektar,\" Jelas Amran.</span><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><span style=\"color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\">Amran menjelaskan, drone penebar ini mampu bekerja mandiri sesuai pola dan alur yang dibuat pada perangkat android dengan panduan GPS. Drone ini mampu melakukan resume operation untuk melanjutkan operation yang tertunda, sehingga tidak terjadi overlap karena dilakukan secara otomatis.</span><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><span style=\"color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\">\"Sepuluh tahun ke depan teknologi ini akan memudahkan petani. Mereka bisa nanam padi sambil duduk di bawah pohon\", Imbuh Amran.</span></p>\r\n<p><span style=\"color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\">Direktur Alat dan Mesin Pertanian Andi Nur Alam menjelaskan, secara spesifik ketahanan baterai drone yang diciptakan mampu beroperasi selama 20 menit dengan kapasitas angkut 6-15 kg benih padi. Drone sebar benih memberikan efisiensi dibanding alsin tanam benih langsung.</span><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><span style=\"color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\">Selain itu, pemerintah juga berhasil mengembangkan drone penebar pupuk prill dan drone sprayer untuk aplikasi pestisida. Kedua alat ini memiliki fungsi yang tidak kalah penting karena memberikan efisiensi 75 persen dibanding alat biasa.</span><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><span style=\"color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\">\"Kami juga bisa menciptakan robot tanam padi yang bisa difungsikan untuk menanam dengan komunikasi Internet of Thing melalui sarana GPS. Di samping itu, kami memiliki autonomous tractor roda 4 tanpa awak yang juga dikendalikan oleh sistem navigasi berbasis IoT. Ada juga traktor perahu sebagai alat pengolah tanah dengan konsep traktor roda dua,\" ungkapnya.</span><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><br style=\"text-rendering: optimizelegibility; -webkit-font-smoothing: antialiased; color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\" /><span style=\"color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\">Adapun selama lima tahun periode pertama pemerintahan Jokowi JK, menurut Amran telah menorehkan sejarah swasembada beras di 2019. Bila dibandingkan dengan tahun 1984, swasembada kali ini ditandai dengan produksi beras nasional yang jauh lebih dari cukup untuk 267 juta jiwa penduduk Indonesia. Konsumsi beras nasional 32,4 juta ton per tahun terpenuhi, tidak ada impor, dan gudang Bulog masih menyimpan 2,5 juta ton di gudang. Metode KSA BPS juga memperkirakan surplus dapat mencapai 5 juta ton di akhir 2019.</span></p>', '69foto berita 2.jpeg', 'Y', '2019-10-25', 13, 'adminkhalviza');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `deskripsi`, `tgl_mulai`, `tgl_akhir`, `tempat`, `gambar`) VALUES
(2, 'Kunjungan Mahasiswa', '<p>Mahsiswa IPB Berkunjung</p>', '2019-10-07', '2019-10-07', 'Museum Pertanian', '69service_04.jpg'),
(4, 'Peresmian Museum Tanah dan Pertanian', '<p>Peresmian dilakukan pada 10 agustus 2019&nbsp;</p>', '2019-10-26', '2019-10-28', 'Museum Pertanian', '33service_01.jpg'),
(5, 'Pendapat Masyarakat', '<p>Museum Pertanian mengumpulkan pendapat masyarakat tentang aspek-aspek yang diperlukan untuk pengembangan museum pertanian kedepan. Acara dilakukan pada 8 - 12 Oktober 2019</p>', '2019-10-08', '2019-10-12', 'Museum Pertanian', '19service_02.jpg'),
(6, 'Kunjungan Sekertaris Jenderal Kementrian Pertanian', '<p><span style=\"color: #2d2d2d; font-family: helvetica, Arial, sans-serif; font-size: 16px;\">Sekretaris Jenderal Kementerian Pertanian Syukur Iwantoro, mewakili Menteri Pertanian meresmikan Museum Pertanian serta Gedung Perpustakaan dan Pengetahuan Pertanian Digital (P3D) di kawasan Bogor, Jawa Barat. Peresmian museum ini menjadi simbol serta sejarah jalan hidup pertanian Indonesia.</span></p>', '2019-11-30', '2019-11-30', 'Museum Tanah dan pertanian', '71foto event.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(255) NOT NULL,
  `nama_seo` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `nama_seo`, `deskripsi`, `gambar`) VALUES
(1, 'Fasilitas Lantai 1', '81-mushola', '<p>Lantai pertama berisi pengetahuan mengenai pertanian dan sejarah pertanian masa lalu, mulai dari sebelum kolonial sampai masa kolonial</p>', '57lantai 2.jpg'),
(2, 'Fasilitas Lantai 2', '87-fasilitas-lantai-2', '<p>Duis at tellus at dui tincidunt scelerisque nec sed felis. Suspendisse id dolor sed leo rutrum euismod. Nullam vestibulum fermentum erat. It nam auctor.</p>', '59lantai 2 juga.jpg'),
(3, 'Fasilitas Lantai 3', '98-fasilitas-lantai-3', '<p>Terakhir, lantai tiga berisi replika peralatan tani Indonesia yang digunakan saat ini dan masa mendatang.</p>', '86lantai 1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `identitas_web`
--

CREATE TABLE `identitas_web` (
  `id_identitas` int(11) NOT NULL,
  `tentang` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas_web`
--

INSERT INTO `identitas_web` (`id_identitas`, `tentang`, `judul`, `deskripsi`, `gambar`) VALUES
(1, 'Tentang Kami', 'Selamat datang di website museum tanah dan pertanian', '<p>Museum Tanah Bogor beralamat di Jl. Ir H. Juanda No. 98, Bogor. Jalan masuk ke kompleks gedung dimana museum ini berada letaknya berseberangan dengan lokasi Museum Zoologi Bogor.</p>\r\n<p>Museum Tanah Bogor didirikan pada 29 September 1988, dan merupakan tempat penyimpanan jenis contoh tanah dari seluruh wilayah penting di Indonesia yang dipajang dalam ukuran kecil dalam bentuk makromonolit. Di museum ini juga terdapat contoh berbagai batuan, pupuk, perangkat uji tanah, peta-peta, maket, dan alat survei tanah.</p>\r\n<p>&nbsp;</p>', '4about_01.jpg'),
(2, 'Visi Misi', 'Kami memberikan pelayanan terbaik untuk masyarakat agar lebih mengenal sejarah bangsa Indonesia', '<p>Sejarah adalah suatu ilmu pengetahuan yang disusun atas hasil penyelidikan beberapa peristiwa yang dapat dibuktikan dengan bahan kenyataan.</p>\r\n<ul>\r\n<li>Mewujudkan pengelolaan koleksi sesuai standar internasional.</li>\r\n<li>Mewujudkan pelayanan prima.</li>\r\n<li>Mewujudkan Museum sebagai sarana edukasi dan rekreasi.</li>\r\n<li>Mewujudkan kajian pengembangan permuseuman yang berkualitas.</li>\r\n<li>Mewujudkan tata kelola yang baik dengan pelibatan publik</li>\r\n</ul>', '11about_02.jpg'),
(3, 'Struktur Organisasi', '', '', '85strukturorganisasi.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nama_depan`, `nama_belakang`, `email`, `telpon`, `pesan`, `tanggal`) VALUES
(2, 'amalia', 'rasyaid', 'arijal12@gmail.com', '8876766', 'ini adalah pesan', '2019-10-10'),
(3, 'ISHAK', 'PAKPAHAN', 'rijalullayh2@yahoo.co.id', '8765544', 'Tes', '2019-10-10'),
(4, 'Abi', 'Dzar', 'abu@yahoo.com', '8876766', 'Tes Mahan', '2019-10-10'),
(5, 'amalia', 'rasyaid', 'tes@tes.com', '8876766', 'Tes ', '2019-10-10'),
(6, 'Muhammad', 'Rangga ', 'rangga.luthanza263@gmail.com', '082277831094', 'Hai aku rangga aku anak sekolah vokasi IPB, aku senang sekali mengunjungi web ini web ini sangat bagus dan responsive terimakasih ya kementan', '2019-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `site_info`
--

CREATE TABLE `site_info` (
  `id_info` int(11) NOT NULL,
  `url` varchar(225) NOT NULL,
  `tittle_site` varchar(200) NOT NULL,
  `judul_site` varchar(200) NOT NULL,
  `info_site` text NOT NULL,
  `footer_site` varchar(200) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_info`
--

INSERT INTO `site_info` (`id_info`, `url`, `tittle_site`, `judul_site`, `info_site`, `footer_site`, `owner`, `email`, `tahun`) VALUES
(1, 'http://localhost/museum', 'Musemum Pertanian', 'Musemum Pertanian', 'Museum', 'SI', 'Rangga Luthanza', 'Rangga Luthanza@gmail.com', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `id_statistik` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`id_statistik`, `ip`, `browser`, `date_create`) VALUES
(1, '::1', 'Opera', '2019-04-09 10:03:48'),
(2, '::1', 'Chrome', '2019-04-08 10:18:06'),
(3, '::1', 'Chrome', '2019-05-15 10:20:15'),
(4, '::1', 'Chrome', '2019-06-12 10:22:58'),
(5, '::1', 'Chrome', '2019-06-11 10:25:59'),
(6, '::1', 'Chrome', '2019-06-21 10:28:04'),
(7, '::1', 'Chrome', '2019-07-10 10:28:41'),
(8, '::1', 'Chrome', '2019-08-08 10:29:43'),
(9, '::1', 'Chrome', '2019-08-15 10:34:01'),
(10, '::1', 'Firefox', '2019-09-03 10:36:22'),
(11, '::1', 'Chrome', '2019-10-10 13:09:36'),
(12, '::1', 'Chrome', '2019-10-10 13:57:44'),
(13, '::1', 'Chrome', '2019-10-10 14:08:22'),
(14, '::1', 'Chrome', '2019-10-10 19:07:36'),
(15, '::1', 'Chrome', '2019-10-10 19:44:02'),
(16, '::1', 'Chrome', '2019-10-10 21:51:55'),
(17, '120.188.86.217', 'Chrome', '2019-10-10 22:05:54'),
(18, '52.191.160.148', 'Other', '2019-10-10 22:17:08'),
(19, '52.191.160.148', 'Other', '2019-10-10 22:17:10'),
(20, '158.140.187.237', 'Chrome', '2019-10-10 23:31:09'),
(21, '120.188.86.217', 'Chrome', '2019-10-11 05:23:49'),
(22, '120.188.86.217', 'Chrome', '2019-10-11 05:23:51'),
(23, '114.124.139.32', 'Chrome', '2019-10-11 09:09:20'),
(24, '202.124.205.250', 'Chrome', '2019-10-11 09:10:16'),
(25, '202.124.205.250', 'Chrome', '2019-10-11 09:16:42'),
(26, '114.124.132.17', 'Chrome', '2019-10-11 09:39:19'),
(27, '202.124.205.250', 'Chrome', '2019-10-11 10:20:40'),
(28, '202.124.205.250', 'Chrome', '2019-10-11 10:25:57'),
(29, '202.124.205.250', 'Chrome', '2019-10-11 10:34:50'),
(30, '202.124.205.250', 'Chrome', '2019-10-11 10:39:53'),
(31, '202.124.205.250', 'Chrome', '2019-10-11 10:49:27'),
(32, '202.124.205.250', 'Chrome', '2019-10-11 10:55:47'),
(33, '120.188.86.217', 'Chrome', '2019-10-11 10:56:44'),
(34, '120.188.86.217', 'Chrome', '2019-10-11 10:56:44'),
(35, '202.124.205.250', 'Chrome', '2019-10-11 11:01:59'),
(36, '202.124.205.250', 'Chrome', '2019-10-11 11:09:22'),
(37, '202.124.205.250', 'Chrome', '2019-10-11 11:09:39'),
(38, '202.124.205.250', 'Chrome', '2019-10-11 11:14:51'),
(39, '120.188.86.217', 'Chrome', '2019-10-11 11:16:48'),
(40, '120.188.86.217', 'Chrome', '2019-10-11 11:16:48'),
(41, '120.188.86.217', 'Chrome', '2019-10-11 11:18:00'),
(42, '202.124.205.250', 'Chrome', '2019-10-11 11:22:07'),
(43, '120.188.86.217', 'Chrome', '2019-10-11 11:22:15'),
(44, '120.188.86.217', 'Chrome', '2019-10-11 11:22:16'),
(45, '202.124.205.250', 'Chrome', '2019-10-11 11:29:52'),
(46, '202.124.205.250', 'Chrome', '2019-10-11 11:35:09'),
(47, '202.124.205.250', 'Chrome', '2019-10-11 11:35:50'),
(48, '202.124.205.250', 'Chrome', '2019-10-11 11:40:52'),
(49, '158.140.187.213', 'Chrome', '2019-10-11 12:36:18'),
(50, '158.140.187.213', 'Chrome', '2019-10-11 12:42:24'),
(51, '182.0.167.53', 'Chrome', '2019-10-11 15:06:23'),
(52, '92.23.58.228', 'Other', '2019-10-11 18:01:31'),
(53, '196.52.84.35', 'Other', '2019-10-11 18:01:31'),
(54, '103.227.252.206', 'Chrome', '2019-10-11 18:01:31'),
(55, '103.227.252.206', 'Chrome', '2019-10-11 18:01:31'),
(56, '92.23.58.228', 'Other', '2019-10-11 18:01:32'),
(57, '196.52.84.35', 'Other', '2019-10-11 18:01:32'),
(58, '154.127.57.151', 'Chrome', '2019-10-11 18:01:32'),
(59, '154.127.57.151', 'Chrome', '2019-10-11 18:01:33'),
(60, '89.31.57.5', 'Other', '2019-10-11 18:01:37'),
(61, '92.23.58.228', 'Other', '2019-10-11 18:01:50'),
(62, '51.15.235.211', 'Chrome', '2019-10-11 18:01:50'),
(63, '196.52.84.35', 'Firefox', '2019-10-11 18:01:50'),
(64, '207.244.71.38', 'Chrome', '2019-10-11 18:01:50'),
(65, '5.62.34.21', 'Other', '2019-10-11 18:01:50'),
(66, '92.23.58.228', 'Other', '2019-10-11 18:01:50'),
(67, '196.52.84.35', 'Firefox', '2019-10-11 18:01:50'),
(68, '5.62.34.21', 'Other', '2019-10-11 18:01:51'),
(69, '51.15.235.211', 'Chrome', '2019-10-11 18:01:51'),
(70, '207.244.71.38', 'Chrome', '2019-10-11 18:01:51'),
(71, '13.66.241.87', 'Other', '2019-10-11 21:18:01'),
(72, '40.118.225.73', 'Other', '2019-10-11 21:18:21'),
(73, '120.188.86.217', 'Chrome', '2019-10-11 21:41:15'),
(74, '120.188.86.217', 'Chrome', '2019-10-11 21:41:16'),
(75, '103.119.62.19', 'Chrome', '2019-10-11 21:46:12'),
(76, '158.140.187.213', 'Chrome', '2019-10-11 21:57:11'),
(77, '158.140.187.213', 'Chrome', '2019-10-11 22:02:33'),
(78, '13.66.167.51', 'Other', '2019-10-11 22:13:24'),
(79, '52.229.26.77', 'Other', '2019-10-11 23:33:23'),
(80, '52.229.26.77', 'Other', '2019-10-11 23:35:41'),
(81, '103.87.78.122', 'Other', '2019-10-12 06:18:46'),
(82, '120.188.86.217', 'Chrome', '2019-10-12 07:35:52'),
(83, '120.188.86.217', 'Chrome', '2019-10-12 07:35:52'),
(84, '103.119.62.19', 'Chrome', '2019-10-12 08:33:59'),
(85, '120.188.86.217', 'Chrome', '2019-10-12 08:51:20'),
(86, '120.188.86.217', 'Chrome', '2019-10-12 08:51:20'),
(87, '114.124.140.195', 'Chrome', '2019-10-12 08:57:43'),
(88, '114.124.140.195', 'Chrome', '2019-10-12 09:02:44'),
(89, '182.0.203.67', 'Chrome', '2019-10-12 11:07:06'),
(90, '120.188.86.217', 'Chrome', '2019-10-12 12:53:36'),
(91, '120.188.86.217', 'Chrome', '2019-10-12 12:53:37'),
(92, '120.188.86.217', 'Chrome', '2019-10-12 17:11:53'),
(93, '120.188.86.217', 'Chrome', '2019-10-12 17:11:54'),
(94, '120.188.86.217', 'Chrome', '2019-10-12 17:18:54'),
(95, '120.188.86.217', 'Chrome', '2019-10-12 17:18:55'),
(96, '40.78.22.188', 'Other', '2019-10-12 22:15:59'),
(97, '13.66.244.178', 'Other', '2019-10-12 22:17:26'),
(98, '52.183.86.94', 'Other', '2019-10-12 23:34:17'),
(99, '52.247.219.94', 'Other', '2019-10-13 00:22:38'),
(100, '52.247.219.94', 'Other', '2019-10-13 00:26:52'),
(101, '104.45.233.204', 'Other', '2019-10-13 23:33:39'),
(102, '52.183.77.58', 'Other', '2019-10-13 23:45:13'),
(103, '52.151.19.39', 'Other', '2019-10-14 00:20:41'),
(104, '52.250.109.121', 'Other', '2019-10-14 01:20:55'),
(105, '202.124.205.250', 'Chrome', '2019-10-14 16:32:56'),
(106, '114.124.196.228', 'Chrome', '2019-10-14 19:44:13'),
(107, '52.233.69.200', 'Other', '2019-10-15 00:24:38'),
(108, '40.112.162.159', 'Other', '2019-10-15 00:26:43'),
(109, '52.233.69.200', 'Other', '2019-10-15 00:40:00'),
(110, '40.65.111.67', 'Other', '2019-10-15 01:25:35'),
(111, '40.65.111.67', 'Other', '2019-10-15 01:25:55'),
(112, '52.151.41.102', 'Other', '2019-10-15 02:33:11'),
(113, '104.42.44.221', 'Other', '2019-10-16 01:27:13'),
(114, '40.125.73.75', 'Other', '2019-10-16 01:27:42'),
(115, '52.183.66.145', 'Other', '2019-10-16 02:31:36'),
(116, '13.66.134.174', 'Other', '2019-10-16 03:25:39'),
(117, '10.115.8.142', 'Other', '2019-10-16 13:26:23'),
(118, '180.244.232.8', 'Chrome', '2019-10-16 15:46:45'),
(119, '180.244.232.8', 'Chrome', '2019-10-16 20:09:24'),
(120, '180.244.232.8', 'Chrome', '2019-10-16 20:11:35'),
(121, '180.244.232.8', 'Chrome', '2019-10-16 20:20:38'),
(122, '180.244.232.8', 'Chrome', '2019-10-16 21:32:41'),
(123, '52.160.86.161', 'Other', '2019-10-17 02:35:00'),
(124, '20.36.18.200', 'Other', '2019-10-17 02:35:48'),
(125, '52.229.16.148', 'Other', '2019-10-17 03:24:44'),
(126, '52.151.55.10', 'Other', '2019-10-17 04:23:06'),
(127, '52.151.55.10', 'Other', '2019-10-17 04:36:58'),
(128, '20.36.31.51', 'Other', '2019-10-17 05:34:59'),
(129, '10.115.9.162', 'Other', '2019-10-17 15:16:16'),
(130, '180.244.232.8', 'Chrome', '2019-10-17 19:51:32'),
(131, '180.244.232.8', 'Chrome', '2019-10-17 20:03:43'),
(132, '180.244.232.8', 'Chrome', '2019-10-17 20:18:10'),
(133, '180.244.232.8', 'Chrome', '2019-10-17 20:43:10'),
(134, '180.244.232.8', 'Chrome', '2019-10-17 20:50:18'),
(135, '180.244.232.8', 'Chrome', '2019-10-17 20:56:35'),
(136, '180.244.232.8', 'Chrome', '2019-10-17 20:56:36'),
(137, '180.244.232.8', 'Chrome', '2019-10-17 21:02:09'),
(138, '180.244.232.8', 'Chrome', '2019-10-17 21:04:13'),
(139, '180.244.232.8', 'Chrome', '2019-10-17 21:05:42'),
(140, '114.124.213.91', 'Other', '2019-10-17 21:10:28'),
(141, '180.244.232.8', 'Chrome', '2019-10-17 21:13:58'),
(142, '114.124.246.106', 'Other', '2019-10-17 21:16:14'),
(143, '180.244.232.8', 'Chrome', '2019-10-17 21:19:42'),
(144, '180.244.232.143', 'Chrome', '2019-10-17 21:50:26'),
(145, '114.124.230.149', 'Chrome', '2019-10-17 22:01:41'),
(146, '114.124.204.170', 'Chrome', '2019-10-17 23:19:04'),
(147, '114.124.204.170', 'Chrome', '2019-10-17 23:19:05'),
(148, '103.119.62.19', 'Chrome', '2019-10-18 00:35:42'),
(149, '103.119.62.19', 'Chrome', '2019-10-18 00:42:06'),
(150, '103.119.62.19', 'Chrome', '2019-10-18 01:16:13'),
(151, '103.119.62.19', 'Chrome', '2019-10-18 01:16:13'),
(152, '158.140.187.237', 'Chrome', '2019-10-18 01:28:28'),
(153, '104.42.19.72', 'Other', '2019-10-18 03:24:06'),
(154, '40.125.76.208', 'Other', '2019-10-18 03:24:53'),
(155, '13.66.245.13', 'Other', '2019-10-18 04:23:36'),
(156, '13.66.245.13', 'Other', '2019-10-18 04:40:17'),
(157, '13.77.172.36', 'Other', '2019-10-18 05:33:02'),
(158, '13.77.172.36', 'Other', '2019-10-18 05:39:02'),
(159, '52.250.115.9', 'Other', '2019-10-18 06:25:41'),
(160, '202.124.205.250', 'Chrome', '2019-10-18 09:04:29'),
(161, '202.124.205.250', 'Chrome', '2019-10-18 09:18:03'),
(162, '202.124.205.250', 'Chrome', '2019-10-18 09:18:08'),
(163, '202.124.205.250', 'Chrome', '2019-10-18 09:25:13'),
(164, '202.124.205.250', 'Chrome', '2019-10-18 09:30:25'),
(165, '202.124.205.250', 'Chrome', '2019-10-18 09:56:50'),
(166, '202.124.205.250', 'Chrome', '2019-10-18 09:59:55'),
(167, '202.124.205.250', 'Chrome', '2019-10-18 10:24:07'),
(168, '202.124.205.250', 'Chrome', '2019-10-18 10:36:15'),
(169, '104.42.225.217', 'Other', '2019-10-19 04:18:14'),
(170, '52.175.208.100', 'Other', '2019-10-19 04:21:15'),
(171, '52.229.59.80', 'Other', '2019-10-19 05:33:30'),
(172, '51.143.96.193', 'Other', '2019-10-19 06:24:59'),
(173, '51.143.96.193', 'Other', '2019-10-19 06:30:01'),
(174, '51.143.96.193', 'Other', '2019-10-19 06:43:46'),
(175, '13.66.174.14', 'Other', '2019-10-19 07:20:33'),
(176, '13.66.174.14', 'Other', '2019-10-19 07:21:38'),
(177, '5.62.34.21', 'Chrome', '2019-10-19 18:10:02'),
(178, '5.62.34.21', 'Chrome', '2019-10-19 18:10:02'),
(179, '196.52.84.42', 'Other', '2019-10-19 18:10:02'),
(180, '70.32.0.77', 'Firefox', '2019-10-19 18:10:02'),
(181, '92.23.58.27', 'Other', '2019-10-19 18:10:02'),
(182, '70.32.0.77', 'Firefox', '2019-10-19 18:10:02'),
(183, '195.181.172.188', 'Other', '2019-10-19 18:10:02'),
(184, '92.23.58.27', 'Other', '2019-10-19 18:10:02'),
(185, '195.181.172.188', 'Other', '2019-10-19 18:10:02'),
(186, '196.52.84.42', 'Other', '2019-10-19 18:10:03'),
(187, '84.92.177.138', 'Firefox', '2019-10-19 18:10:09'),
(188, '195.181.170.91', 'Other', '2019-10-19 18:10:09'),
(189, '212.92.107.75', 'Other', '2019-10-19 18:10:10'),
(190, '84.92.177.138', 'Firefox', '2019-10-19 18:10:10'),
(191, '195.181.170.91', 'Other', '2019-10-19 18:10:10'),
(192, '103.227.252.200', 'Other', '2019-10-19 18:10:10'),
(193, '212.92.107.75', 'Other', '2019-10-19 18:10:10'),
(194, '103.227.252.200', 'Other', '2019-10-19 18:10:10'),
(195, '185.93.2.60', 'Chrome', '2019-10-19 18:10:14'),
(196, '185.93.2.60', 'Chrome', '2019-10-19 18:10:14'),
(197, '120.188.86.99', 'Other', '2019-10-19 21:21:10'),
(198, '120.188.86.99', 'Other', '2019-10-19 21:21:10'),
(199, '120.188.86.99', 'Chrome', '2019-10-19 21:21:31'),
(200, '120.188.86.99', 'Chrome', '2019-10-19 21:21:32'),
(201, '120.188.86.99', 'Chrome', '2019-10-19 21:33:17'),
(202, '120.188.86.99', 'Chrome', '2019-10-19 21:33:18'),
(203, '120.188.86.99', 'Chrome', '2019-10-19 21:52:51'),
(204, '120.188.86.99', 'Chrome', '2019-10-19 21:52:52'),
(205, '114.124.245.65', 'Chrome', '2019-10-19 22:57:08'),
(206, '52.250.7.233', 'Other', '2019-10-20 05:33:56'),
(207, '52.250.7.233', 'Other', '2019-10-20 05:49:35'),
(208, '52.183.28.191', 'Other', '2019-10-20 06:15:40'),
(209, '52.183.28.191', 'Other', '2019-10-20 06:25:15'),
(210, '114.4.222.139', 'Chrome', '2019-10-20 06:42:25'),
(211, '13.66.173.134', 'Other', '2019-10-20 07:29:21'),
(212, '52.247.232.125', 'Other', '2019-10-20 08:26:21'),
(213, '52.247.232.125', 'Other', '2019-10-20 08:41:57'),
(214, '120.188.79.21', 'Chrome', '2019-10-20 09:54:32'),
(215, '103.119.62.19', 'Chrome', '2019-10-20 10:11:40'),
(216, '103.119.62.19', 'Chrome', '2019-10-20 10:20:33'),
(217, '36.88.68.152', 'Chrome', '2019-10-20 11:21:51'),
(218, '13.77.163.27', 'Other', '2019-10-21 06:19:42'),
(219, '13.77.169.81', 'Other', '2019-10-21 07:18:48'),
(220, '52.229.36.13', 'Other', '2019-10-21 08:26:56'),
(221, '13.77.152.108', 'Other', '2019-10-21 09:16:24'),
(222, '13.77.152.108', 'Other', '2019-10-21 09:19:23'),
(223, '202.124.205.250', 'Chrome', '2019-10-21 09:50:15'),
(224, '202.124.205.250', 'Chrome', '2019-10-21 09:54:04'),
(225, '202.124.205.250', 'Chrome', '2019-10-21 10:06:52'),
(226, '66.249.71.120', 'Chrome', '2019-10-21 11:09:04'),
(227, '114.4.221.23', 'Chrome', '2019-10-21 13:14:42'),
(228, '114.4.221.23', 'Chrome', '2019-10-21 13:14:43'),
(229, '103.119.62.19', 'Chrome', '2019-10-21 13:41:49'),
(230, '202.124.205.250', 'Chrome', '2019-10-21 18:03:19'),
(231, '52.247.195.188', 'Other', '2019-10-22 07:16:58'),
(232, '40.125.74.30', 'Other', '2019-10-22 08:25:51'),
(233, '52.183.86.38', 'Other', '2019-10-22 09:16:23'),
(234, '20.190.60.217', 'Other', '2019-10-22 10:14:58'),
(235, '20.190.59.136', 'Other', '2019-10-23 08:35:44'),
(236, '13.77.176.119', 'Other', '2019-10-23 09:25:56'),
(237, '20.190.42.95', 'Other', '2019-10-23 10:19:02'),
(238, '52.247.233.35', 'Other', '2019-10-24 09:18:35'),
(239, '114.124.214.12', 'Chrome', '2019-10-24 09:32:53'),
(240, '52.156.71.212', 'Other', '2019-10-24 10:23:56'),
(241, '13.66.204.104', 'Other', '2019-10-24 11:25:54'),
(242, '120.188.78.56', 'Chrome', '2019-10-24 11:50:33'),
(243, '120.188.78.56', 'Chrome', '2019-10-24 11:55:45'),
(244, '120.188.78.56', 'Chrome', '2019-10-24 12:01:55'),
(245, '114.124.140.9', 'Chrome', '2019-10-24 20:09:42'),
(246, '120.188.78.56', 'Chrome', '2019-10-24 23:15:29'),
(247, '120.188.78.56', 'Chrome', '2019-10-24 23:15:29'),
(248, '103.87.78.122', 'Other', '2019-10-25 06:15:00'),
(249, '10.115.9.162', 'Other', '2019-10-25 09:07:28'),
(250, '114.124.197.14', 'Chrome', '2019-10-25 09:07:30'),
(251, '202.124.205.250', 'Chrome', '2019-10-25 09:11:46'),
(252, '120.188.4.63', 'Chrome', '2019-10-25 09:59:06'),
(253, '120.188.4.63', 'Chrome', '2019-10-25 09:59:07'),
(254, '202.124.205.250', 'Chrome', '2019-10-25 10:02:33'),
(255, '202.124.205.250', 'Chrome', '2019-10-25 10:07:35'),
(256, '202.124.205.250', 'Chrome', '2019-10-25 10:07:56'),
(257, '202.124.205.250', 'Chrome', '2019-10-25 10:07:58'),
(258, '202.124.205.250', 'Chrome', '2019-10-25 10:15:02'),
(259, '52.183.100.48', 'Other', '2019-10-25 10:18:12'),
(260, '202.124.205.250', 'Chrome', '2019-10-25 10:43:44'),
(261, '52.247.192.57', 'Other', '2019-10-25 11:36:08'),
(262, '13.77.178.86', 'Other', '2019-10-25 12:21:47'),
(263, '66.249.71.121', 'Chrome', '2019-10-25 14:20:12'),
(264, '66.249.71.121', 'Chrome', '2019-10-25 14:20:29'),
(265, '202.124.205.250', 'Chrome', '2019-10-25 15:15:39'),
(266, '202.124.205.250', 'Chrome', '2019-10-25 15:22:42'),
(267, '66.249.71.120', 'Chrome', '2019-10-26 02:52:02'),
(268, '52.151.20.125', 'Other', '2019-10-26 11:27:28'),
(269, '51.143.13.128', 'Other', '2019-10-26 12:22:09'),
(270, '13.66.203.73', 'Other', '2019-10-26 13:19:39'),
(271, '52.183.84.110', 'Other', '2019-10-27 12:17:23'),
(272, '13.66.250.136', 'Other', '2019-10-27 13:13:27'),
(273, '52.183.64.250', 'Other', '2019-10-27 14:34:26'),
(274, '52.183.64.250', 'Other', '2019-10-27 14:52:32'),
(275, '51.143.99.168', 'Other', '2019-10-27 15:24:23'),
(276, '52.183.6.182', 'Other', '2019-10-28 13:16:11'),
(277, '13.66.184.18', 'Other', '2019-10-28 14:28:50'),
(278, '13.77.161.241', 'Other', '2019-10-28 15:21:22'),
(279, '20.190.57.93', 'Other', '2019-10-28 16:22:00'),
(280, '10.115.9.162', 'Other', '2019-10-28 16:48:38'),
(281, '202.124.205.250', 'Chrome', '2019-10-28 16:49:29'),
(282, '10.115.9.162', 'Other', '2019-10-29 01:27:32'),
(283, '180.244.232.82', 'Chrome', '2019-10-29 01:27:38'),
(284, '180.244.232.82', 'Chrome', '2019-10-29 01:27:39'),
(285, '180.244.232.82', 'Chrome', '2019-10-29 01:34:17'),
(286, '180.244.232.82', 'Chrome', '2019-10-29 01:35:15'),
(287, '51.143.91.85', 'Other', '2019-10-29 14:34:54'),
(288, '52.247.221.11', 'Other', '2019-10-29 16:19:02'),
(289, '52.247.221.11', 'Other', '2019-10-29 17:28:46'),
(290, '13.66.221.51', 'Other', '2019-10-30 15:24:25'),
(291, '13.66.205.1', 'Other', '2019-10-30 17:37:21'),
(292, '52.151.17.30', 'Other', '2019-10-30 18:16:40'),
(293, '52.151.17.30', 'Other', '2019-10-30 18:26:14'),
(294, '180.244.232.26', 'Chrome', '2019-10-30 18:37:20'),
(295, '180.244.232.26', 'Chrome', '2019-10-30 18:42:26'),
(296, '52.175.205.135', 'Other', '2019-10-30 19:16:55'),
(297, '158.140.187.48', 'Chrome', '2019-10-30 20:00:29'),
(298, '158.140.186.16', 'Chrome', '2019-10-30 20:00:29'),
(299, '158.140.186.14', 'Chrome', '2019-10-30 20:20:02'),
(300, '180.244.232.117', 'Chrome', '2019-10-31 14:13:12'),
(301, '180.244.232.117', 'Chrome', '2019-10-31 14:18:40'),
(302, '180.244.232.117', 'Chrome', '2019-10-31 14:35:06'),
(303, '182.0.165.1', 'Chrome', '2019-10-31 14:35:56'),
(304, '52.151.2.29', 'Other', '2019-10-31 16:23:58'),
(305, '114.4.212.212', 'Chrome', '2019-10-31 18:13:42'),
(306, '::1', 'Chrome', '2019-10-31 18:33:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `identitas_web`
--
ALTER TABLE `identitas_web`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id_statistik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `identitas_web`
--
ALTER TABLE `identitas_web`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id_statistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
