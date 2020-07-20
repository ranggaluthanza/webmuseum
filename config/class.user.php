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

  public function tampil_site_info(){
        $query = "SELECT * FROM site_info ";
        $result = $this->db->query($query) or die($this->db->error);
        $id_data = $result->fetch_array(MYSQLI_ASSOC);
        return $id_data;
        }      
 
 public function tampil_berita_home(){
         $query="SELECT * FROM berita WHERE publish='Y'  ORDER BY id_berita DESC LIMIT 6";
         $result= $this->db->query($query);
         $num_result=$result->num_rows;
         if($num_result>0){
         while($rows=$result->fetch_assoc()){
         $this->heder[]=$rows;
        }
    return $this->heder;
     }
   }
public function tampil_populer_s(){
        $query = "SELECT * FROM berita WHERE publish='Y' ORDER BY dibaca DESC ";
        $result = $this->db->query($query) or die($this->db->error);
        $id_data = $result->fetch_array(MYSQLI_ASSOC);
        return $id_data;
        } 
   public function tampil_berita_populer(){
         $query="SELECT * FROM berita WHERE publish='Y'  ORDER BY dibaca DESC LIMIT 4";
         $result= $this->db->query($query);
         $num_result=$result->num_rows;
         if($num_result>0){
         while($rows=$result->fetch_assoc()){
         $this->heder[]=$rows;
        }
    return $this->heder;
     }
   }

public function detail_berita($id){
    $query = "SELECT * FROM berita where judul_seo = '$id'";
    $result = $this->db->query($query) or die($this->db->error);
    $user_data = $result->fetch_array(MYSQLI_ASSOC);
    return $user_data;
}

public function detail_admin($id){
        $query = "SELECT * FROM admin WHERE username='$id'";
        $result = $this->db->query($query) or die($this->db->error);
        $about_data = $result->fetch_array(MYSQLI_ASSOC);
        return $about_data;
        }  

public function detail_identitas($id){
    $query = "SELECT * FROM identitas_web where id_identitas = '$id'";
    $result = $this->db->query($query) or die($this->db->error);
    $user_data = $result->fetch_array(MYSQLI_ASSOC);
    return $user_data;
}

public function tampil_event_home(){
         $query="SELECT * FROM event  ORDER BY id_event DESC LIMIT 6";
         $result= $this->db->query($query);
         $num_result=$result->num_rows;
         if($num_result>0){
         while($rows=$result->fetch_assoc()){
         $this->heder[]=$rows;
        }
    return $this->heder;
     }
   }

public function tampil_fasilitas_home(){
         $query="SELECT * FROM fasilitas  ORDER BY id_fasilitas DESC LIMIT 6";
         $result= $this->db->query($query);
         $num_result=$result->num_rows;
         if($num_result>0){
         while($rows=$result->fetch_assoc()){
         $this->heder[]=$rows;
        }
    return $this->heder;
     }
   }

public function detail_fasilitas($id){
    $query = "SELECT * FROM fasilitas where nama_seo = '$id'";
    $result = $this->db->query($query) or die($this->db->error);
    $user_data = $result->fetch_array(MYSQLI_ASSOC);
    return $user_data;
}

public function simpan_pesan($first_name, $last_name, $email, $phone, $comments, $tanggal){
    $query = "INSERT INTO pengunjung SET nama_depan='$first_name', nama_belakang='$last_name', email='$email', telpon='$phone', pesan='$comments', tanggal='$tanggal' ";       
    $result = $this->db->query($query) or die($this->db->error);    
}

public function tambah_view($id){
        $query = "UPDATE berita SET dibaca=dibaca+1 WHERE judul_seo = '$id'";        
        $result = $this->db->query($query) or die($this->db->error);    
    }
   ///////////

   

   public function format_angka($nilai) {
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
    public function ambil_email_admin(){
        $query = "SELECT * FROM identitas WHERE id_identitas = '1'";
        $result = $this->db->query($query) or die($this->db->error);
        $user_data = $result->fetch_array(MYSQLI_ASSOC);
        return $user_data;
        }
    public function escape_string($value)
    {
        return $this->db->real_escape_string($value);
    }
     public function change_password($password, $id){
        $password = md5($password);
        $query = "UPDATE kustomer SET password='$password' WHERE username = '$id'";      
        $result = $this->db->query($query) or die($this->db->error);    
    }

 public function ubah_tgl($tanggal) { 
   $pisah   = explode('-',$tanggal);
   $larik   = array($pisah[2],$pisah[1],$pisah[0]);
   $satukan = implode('/',$larik);
   return $satukan;
  }
   
//////////////////////////////////////////////Pengunjung web
public function ip_user() 
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}

 
// Mendapatkan jenis web browser pengunjung
public function client_browser() {
    $browser = '';
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
        $browser = 'Netscape';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
        $browser = 'Firefox';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
        $browser = 'Chrome';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
        $browser = 'Opera';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
        $browser = 'Internet Explorer';
    else
        $browser = 'Other';
    return $browser;
}


////////////////////////////////////////////////////
}