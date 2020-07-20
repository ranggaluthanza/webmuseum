<?php
class Seo 
{
public function seo_title($s) {
    $c = array (' ');
    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    
    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}
public function fungsi_id($o) {
    $e = array (' ');
    $q = array ('/','\\',',','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','%','$','^','&','*','=','?','+');

    $o = str_replace($q, '', $o); // Hilangkan karakter yang telah disebutkan di array $d
    
    $o = strtolower(str_replace($e,'',$o)); // Gabungkan dan ubah hurufnya menjadi kecil semua
    return $o;
}
}
?>
