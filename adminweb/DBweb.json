<?php
	$conn = mysqli_connect("localhost","root","","db_web_museum");
	$rslt= mysqli_query($conn,"SELECT * FROM tbl_pweb");

	$c = array ("caption"=>"Jumlah Pengunjung Web",
				"subCaption"=>"Museum Tanah Bogor",
				"xAxisname"=>"Bulan",
				"yAxisname"=>"Jumlah Pengunjung");

	$d = array();
	while ($r = mysqli_fetch_assoc($rslt)){
		array_push($d, array("label"=>$r["bulanPengunjung"],"value"=>$r["jumlahPWeb"]));
	}

	$gab = array("chart"=>$c,"data"=>$d);
	$hasil = json_encode($gab);
	echo $hasil;
?>