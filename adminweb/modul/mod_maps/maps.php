<?
//include 'config/class.admin.php';
$user=new User();
$sampai = date('m');
$mulai= date('m')-5; //

$query="SELECT MONTH(date_create) as bulan, COUNT(ip) as pengunjung FROM statistik WHERE
       (MONTH(date_create) BETWEEN '$mulai' AND '$sampai') GROUP BY MONTH(date_create) "; 
$result7 = $mysqli->query( $query );
$result9 = $mysqli->query( $query );   

$query="SELECT * FROM statistik  "; 
$result1 = $mysqli->query( $query );
$p = $result1->num_rows;
$pengunjung=$user->rupiah($p);

$query="SELECT * FROM event  "; 
$result2 = $mysqli->query( $query );
$ec = $result2->num_rows;
$event=$user->rupiah($ec);

$query="SELECT * FROM pengunjung  "; 
$result2 = $mysqli->query( $query );
$k = $result2->num_rows;
$pesan=$user->rupiah($k);
?>
<!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pengunjung Web </h5>
                      <span class="h2 font-weight-bold mb-0"><?=$pengunjung?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Event </h5>
                      <span class="h2 font-weight-bold mb-0"><?=$event?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pesan </h5>
                      <span class="h2 font-weight-bold mb-0"><?=$pesan?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card shadow border-0">
            <!--<div id="map-canvas" class="map-canvas" data-lat="-6.603639" data-lng="106.797713" style="height: 600px;"></div>-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15853.769405458964!2d106.8119497!3d-6.5918122!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1557406328061!5m2!1sid!2sid" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <!-- Footer -->