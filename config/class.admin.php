<?php 
    date_default_timezone_set('Asia/Makassar');//tentukan waktu
 //koneksi   
	include "db_config.php";   
	class User{
		protected $db;
		public function __construct(){
			$this->db = new DB_con();
			$this->db = $this->db->ret_obj();
		}

	   /*** for login process ***/
		public function check_login($username, $password){
        $password = md5($password);		
		$query = "SELECT * from admin WHERE username='$username' and password='$password'";	
		$result = $this->db->query($query) or die($this->db->error);	
		$adm = $result->fetch_array(MYSQLI_ASSOC);
		$count_row = $result->num_rows;
		
		if ($count_row == 1) {
			session_start();

		  $_SESSION['KCFINDER']=array();
		  $_SESSION['KCFINDER']['disabled'] = false;
		  $_SESSION['KCFINDER']['uploadURL'] = "../tinymcpuk/gambar";
		  $_SESSION['KCFINDER']['uploadDir'] = "";	

	      $_SESSION['login']         = true; // this login var will use for the session thing
	      $_SESSION['username']      =$adm['username'];
		  $_SESSION['password']      =$adm['password'];
		  $_SESSION['session_admin'] =$adm['nama_admin'];
		  $_SESSION['session_id']    =$adm['id_admin'];
		  $_SESSION['session_email'] =$adm['email_admin'];
		  $_SESSION['session_foto']  =$adm['foto'];
		  $_SESSION['session_level'] ="Admin";
	            return true;
	        }			
		else{return false;}
	}


	public function random($panjang_karakter)   
    {   
       $karakter = '1234567890abcdefghijkmnopqrstuvwxyz';   
       $string = '';   
       for($i = 0; $i < $panjang_karakter; $i++) {   
       $pos = rand(0, strlen($karakter)-1);   
        $string .= $karakter{$pos};   
       }   
       return $string;   
       }  
public function seo_title($s) {
    $c = array (' ');
    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    
    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}
    public function hitung_umur($tanggal_lahir) {
    list($year,$month,$day) = explode("-",$tanggal_lahir);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    if ($month_diff < 0) $year_diff--;
        elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
    return $year_diff;
}   


 public function tampil_admin(){
		$query = "SELECT * FROM admin order by id_admin asc";
	 $result= $this->db->query($query);
			 $num_result=$result->num_rows;
			 if($num_result>0){
			 while($rows=$result->fetch_assoc()){
			 $this->dataus[]=$rows;
			}
	return $this->dataus;
	 }
 } 

 public function check_admin($id){	
		$query = "SELECT username from admin WHERE username='$id'";		
		$result = $this->db->query($query) or die($this->db->error);
		$count_row = $result->num_rows;		
		if ($count_row == 0) {
	            return true;
	        }
	    }

public function check_admins($username, $id){	
		$query = "SELECT username from admin WHERE username='$username' AND id_admin!='$id'";		
		$result = $this->db->query($query) or die($this->db->error);
		$count_row = $result->num_rows;		
		if ($count_row == 0) {
	            return true;
	        }
	    }

public function detail_admin($id){
	$query = "SELECT * FROM admin where id_admin = '$id'";
	$result = $this->db->query($query) or die($this->db->error);
	$user_data = $result->fetch_array(MYSQLI_ASSOC);
	return $user_data;
}

public function delete_admin($id){
	$query = "DELETE FROM admin WHERE id_admin='$id'";		
	$result = $this->db->query($query) or die($this->db->error);	
} 

public function simpan_admin($username, $password, $nama_admin, $email){
	$query = "INSERT INTO admin SET username='$username', password='$password', nama_admin='$nama_admin', email_admin='$email' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function simpan_admin_gb($username, $password, $nama_admin, $email, $nama_gambar){
	$query = "INSERT INTO admin SET username='$username', password='$password', nama_admin='$nama_admin', email_admin='$email', foto='$nama_gambar'";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function update_admin($username, $password, $nama_admin, $email, $id){
	$query = "UPDATE admin SET username='$username', password='$password', nama_admin='$nama_admin', email_admin='$email' WHERE id_admin='$id' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function update_admin_gb($username, $password, $nama_admin, $email, $nama_gambar, $id){
	$query = "UPDATE admin SET username='$username', password='$password', nama_admin='$nama_admin', email_admin='$email', foto='$nama_gambar' WHERE id_admin='$id' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

//module berita

 public function tampil_berita(){
	$query = "SELECT * FROM berita order by id_berita desc";
 $result= $this->db->query($query);
		 $num_result=$result->num_rows;
		 if($num_result>0){
		 while($rows=$result->fetch_assoc()){
		 $this->dataus[]=$rows;
		}
return $this->dataus;
 }
} 

public function detail_berita($id){
	$query = "SELECT * FROM berita where id_berita = '$id'";
	$result = $this->db->query($query) or die($this->db->error);
	$user_data = $result->fetch_array(MYSQLI_ASSOC);
	return $user_data;
}

public function delete_berita($id){
	$query = "DELETE FROM berita WHERE id_berita='$id'";		
	$result = $this->db->query($query) or die($this->db->error);	
} 

public function simpan_berita($sumber, $judul, $judul_seo, $isi_berita, $publish, $username, $tanggal
){
	$query = "INSERT INTO berita SET sumber='$sumber', judul='$judul', judul_seo='$judul_seo', isi_berita='$isi_berita', publish='$publish', username='$username', tanggal='$tanggal' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function simpan_berita_gb($sumber, $judul, $judul_seo, $isi_berita, $publish, $username, $tanggal, $nama_gambar){
	$query = "INSERT INTO berita SET sumber='$sumber', judul='$judul', judul_seo='$judul_seo', isi_berita='$isi_berita', publish='$publish', username='$username', tanggal='$tanggal', gambar='$nama_gambar'";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function update_berita($sumber, $judul,  $isi_berita, $publish,  $tanggal, $id){
	$query = "UPDATE berita SET sumber='$sumber', judul='$judul', isi_berita='$isi_berita', publish='$publish', tanggal='$tanggal' WHERE id_berita='$id' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function update_berita_gb($sumber, $judul, $isi_berita, $publish,  $tanggal, $nama_gambar, $id){
	$query = "UPDATE berita SET sumber='$sumber', judul='$judul', isi_berita='$isi_berita', publish='$publish', tanggal='$tanggal', gambar='$nama_gambar' WHERE id_berita='$id' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

//module event
 public function tampil_event(){
	$query = "SELECT * FROM event order by id_event desc";
 $result= $this->db->query($query);
		 $num_result=$result->num_rows;
		 if($num_result>0){
		 while($rows=$result->fetch_assoc()){
		 $this->dataus[]=$rows;
		}
return $this->dataus;
 }
} 

public function detail_event($id){
	$query = "SELECT * FROM event where id_event = '$id'";
	$result = $this->db->query($query) or die($this->db->error);
	$user_data = $result->fetch_array(MYSQLI_ASSOC);
	return $user_data;
}

public function delete_event($id){
	$query = "DELETE FROM event WHERE id_event='$id'";		
	$result = $this->db->query($query) or die($this->db->error);	
} 

public function simpan_event($nama_event, $tgl_mulai, $tgl_akhir, $tempat, $deskripsi
){
	$query = "INSERT INTO event SET nama_event='$nama_event', tgl_mulai='$tgl_mulai', tgl_akhir='$tgl_akhir', tempat='$tempat', deskripsi='$deskripsi' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function simpan_event_gb($nama_event, $tgl_mulai, $tgl_akhir, $tempat, $deskripsi, $nama_gambar){
	$query = "INSERT INTO event SET nama_event='$nama_event', tgl_mulai='$tgl_mulai', tgl_akhir='$tgl_akhir', tempat='$tempat', deskripsi='$deskripsi', gambar='$nama_gambar'";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function update_event($nama_event, $tgl_mulai, $tgl_akhir, $tempat, $deskripsi, $id){
	$query = "UPDATE event SET nama_event='$nama_event', tgl_mulai='$tgl_mulai', tgl_akhir='$tgl_akhir', tempat='$tempat', deskripsi='$deskripsi' WHERE id_event='$id' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function update_event_gb($nama_event, $tgl_mulai, $tgl_akhir, $tempat, $deskripsi, $nama_gambar, $id){
	$query = "UPDATE event SET nama_event='$nama_event', tgl_mulai='$tgl_mulai', tgl_akhir='$tgl_akhir', tempat='$tempat', deskripsi='$deskripsi', gambar='$nama_gambar' WHERE id_event='$id' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}


public function potongTeks($text, $length, $mode = 2)
{
	if ($mode != 1)
	{
		$char = $text{$length - 1};
		switch($mode)
		{
			case 2: 
				while($char != ' ') {
					$char = $text{--$length};
				}
			case 3:
				while($char != ' ') {
					$char = $text{++$length};
				}
		}
	}
	return substr($text, 0, $length);
}

//module fasilitas
 public function tampil_fasilitas(){
	$query = "SELECT * FROM fasilitas order by id_fasilitas desc";
 $result= $this->db->query($query);
		 $num_result=$result->num_rows;
		 if($num_result>0){
		 while($rows=$result->fetch_assoc()){
		 $this->dataus[]=$rows;
		}
return $this->dataus;
 }
} 

public function detail_fasilitas($id){
	$query = "SELECT * FROM fasilitas where id_fasilitas = '$id'";
	$result = $this->db->query($query) or die($this->db->error);
	$user_data = $result->fetch_array(MYSQLI_ASSOC);
	return $user_data;
}

public function delete_fasilitas($id){
	$query = "DELETE FROM fasilitas WHERE id_fasilitas='$id'";		
	$result = $this->db->query($query) or die($this->db->error);	
} 

public function simpan_fasilitas($nama_fasilitas, $nama_seo, $deskripsi){
	$query = "INSERT INTO fasilitas SET nama_fasilitas='$nama_fasilitas', nama_seo='$nama_seo', deskripsi='$deskripsi' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function simpan_fasilitas_gb($nama_fasilitas, $nama_seo, $deskripsi, $nama_gambar){
	$query = "INSERT INTO fasilitas SET nama_fasilitas='$nama_fasilitas', nama_seo='$nama_seo', deskripsi='$deskripsi', gambar='$nama_gambar'";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function update_fasilitas($nama_fasilitas, $nama_seo, $deskripsi, $id){
	$query = "UPDATE fasilitas SET nama_fasilitas='$nama_fasilitas', nama_seo='$nama_seo', deskripsi='$deskripsi' WHERE id_fasilitas='$id' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function update_fasilitas_gb($nama_fasilitas, $nama_seo, $deskripsi, $nama_gambar, $id){
	$query = "UPDATE fasilitas SET nama_fasilitas='$nama_fasilitas', nama_seo='$nama_seo', deskripsi='$deskripsi', gambar='$nama_gambar' WHERE id_fasilitas='$id' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

/////////////////

//module identitas
 public function tampil_identitas(){
	$query = "SELECT * FROM identitas_web order by id_identitas asc";
 $result= $this->db->query($query);
		 $num_result=$result->num_rows;
		 if($num_result>0){
		 while($rows=$result->fetch_assoc()){
		 $this->dataus[]=$rows;
		}
return $this->dataus;
 }
} 

public function detail_identitas($id){
	$query = "SELECT * FROM identitas_web where id_identitas = '$id'";
	$result = $this->db->query($query) or die($this->db->error);
	$user_data = $result->fetch_array(MYSQLI_ASSOC);
	return $user_data;
}

public function delete_identitas($id){
	$query = "DELETE FROM identitas_web WHERE id_identitas='$id'";		
	$result = $this->db->query($query) or die($this->db->error);	
} 

public function simpan_identitas($tentang, $judul, $deskripsi){
	$query = "INSERT INTO identitas_web SET tentang='$tentang', judul='$judul', deskripsi='$deskripsi' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function simpan_identitas_gb($tentang, $judul, $deskripsi, $nama_gambar){
	$query = "INSERT INTO identitas_web SET tentang='$tentang', judul='$judul', deskripsi='$deskripsi', gambar='$nama_gambar'";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function update_identitas($tentang, $judul, $deskripsi, $id){
	$query = "UPDATE identitas_web SET tentang='$tentang', judul='$judul', deskripsi='$deskripsi' WHERE id_identitas='$id' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function update_identitas_gb($tentang, $judul, $deskripsi, $nama_gambar, $id){
	$query = "UPDATE identitas_web SET tentang='$tentang', judul='$judul', deskripsi='$deskripsi', gambar='$nama_gambar' WHERE id_identitas='$id' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}

public function tampil_statistik_home(){
	$query = "SELECT * FROM statistik order by id_statistik desc LIMIT 10";
 $result= $this->db->query($query);
		 $num_result=$result->num_rows;
		 if($num_result>0){
		 while($rows=$result->fetch_assoc()){
		 $this->dataus[]=$rows;
		}
return $this->dataus;
 }
} 

public function tampil_pengunjung(){
	$query = "SELECT * FROM statistik order by id_statistik desc";
 $result= $this->db->query($query);
		 $num_result=$result->num_rows;
		 if($num_result>0){
		 while($rows=$result->fetch_assoc()){
		 $this->dataus[]=$rows;
		}
return $this->dataus;
 }
} 

public function tampil_kontak(){
	$query = "SELECT * FROM pengunjung order by id_pengunjung desc";
 $result= $this->db->query($query);
		 $num_result=$result->num_rows;
		 if($num_result>0){
		 while($rows=$result->fetch_assoc()){
		 $this->dataus[]=$rows;
		}
return $this->dataus;
 }
} 

public function detail_kontak($id){
	$query = "SELECT * FROM pengunjung where id_pengunjung = '$id'";
	$result = $this->db->query($query) or die($this->db->error);
	$user_data = $result->fetch_array(MYSQLI_ASSOC);
	return $user_data;
}

public function tampil_setting(){
	$query = "SELECT * FROM site_info order by id_info desc";
 $result= $this->db->query($query);
		 $num_result=$result->num_rows;
		 if($num_result>0){
		 while($rows=$result->fetch_assoc()){
		 $this->dataus[]=$rows;
		}
return $this->dataus;
 }
} 

public function detail_setting($id){
	$query = "SELECT * FROM site_info where id_info = '$id'";
	$result = $this->db->query($query) or die($this->db->error);
	$user_data = $result->fetch_array(MYSQLI_ASSOC);
	return $user_data;
}

public function update_setting($url, $owner, $email, $tahun, $id){
	$query = "UPDATE site_info SET url='$url', owner='$owner', email='$email', tahun='$tahun' WHERE id_info='$id' ";		
	$result = $this->db->query($query) or die($this->db->error);	
}
/////////////////


//////////////////////
			
	 public function rupiah($nilai) {
         $nilai1=number_format($nilai,0,",",".");
         $nilai2=" ".$nilai1." ";
         return $nilai2;
    }
 	
 	public function getData($query)
	{		
		$result = $this->db->query($query);		
		if ($result == false) {
			return false;
		} 		
		$rows = array();		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
    public function kode_otomatis(){
			$query = "SELECT MAX(nik) AS kode FROM pegawai";
			$result = $this->db->query($query) or die($this->db->error);
		    $pecah = $result->fetch_array(MYSQLI_ASSOC);

			//$qry = mysql_query("SELECT MAX(kode_transaksi) AS kode FROM transaksi");
			//$pecah = mysql_fetch_array($qry);
			
			$kode = substr($pecah['kode'], 3,5);
			$jum = $kode + 1;
			if ($jum < 10) {
				$id = "LM70000".$jum;
			}
			else if($jum >= 10 && $jum < 100){
				$id = "LM7000".$jum;
			}
			else if($jum >= 100 && $jum < 1000){
				$id = "LM700".$jum;
			}
			else{
				$id = "LM70".$jum;
			}
			return $id;
		}
	

	public function ambil_admin($id){
    	$query = "SELECT * FROM admin WHERE id_admin = '$id'";
		$result = $this->db->query($query) or die($this->db->error);
		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		return $user_data;
		}
    
			
	public function escape_string($value)
	{
		return $this->db->real_escape_string($value);
	}

	public function stripslashes($value)
	{
		return $this->db->stripslashes($value);
	}

	public function check_hp($id){	
		$query = "SELECT no_hp from pelanggan WHERE no_hp='$id'";		
		$result = $this->db->query($query) or die($this->db->error);
		$count_row = $result->num_rows;		
		if ($count_row == 0) {
	            return true;
	        }
	    }

   public function ubah_tgl($tanggal) { 
        $pisah   = explode('-',$tanggal);
        $larik   = array($pisah[2],$pisah[1],$pisah[0]);
        $satukan = implode('-',$larik);
        return $satukan;
    }

    
public function bulan($bulan)
            {
            Switch ($bulan){
                case 1 : $bulan="Januari";
                    Break;
                case 2 : $bulan="Februari";
                    Break;
                case 3 : $bulan="Maret";
                    Break;
                case 4 : $bulan="April";
                    Break;
                case 5 : $bulan="Mei";
                    Break;
                case 6 : $bulan="Juni";
                    Break;
                case 7 : $bulan="Juli";
                    Break;
                case 8 : $bulan="Agustus";
                    Break;
                case 9 : $bulan="September";
                    Break;
                case 10 : $bulan="Oktober";
                    Break;
                case 11 : $bulan="November";
                    Break;
                case 12 : $bulan="Desember";
                    Break;
                }
            return $bulan;
            }
public function tgl_indo($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan   = substr($tgl,5,2); // konversi menjadi nama bulan bahasa indonesia
	$tahun   = substr($tgl,0,4);
	return $tanggal.'-'.$bulan.'-'.$tahun;		 
}	
 
}
