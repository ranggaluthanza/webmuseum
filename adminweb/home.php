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
        <div class="col-xl-12 mb-6 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  <h2 class="text-white mb-0">Banyaknya Pengunjung Museum 6 Bulan Terakhir</h2>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
           <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!--<canvas id="chart-orders" class="chart-canvas"></canvas>-->
                <canvas id="myChart" width="100" height="50"></canvas>
              </div>
          </div>
          <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
        </div>
        </div>
      </div>


      <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">10 Pengunjung Terbaru</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">IP</th>
                    <th scope="col">Browser</th>
                    <th scope="col">Jam</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $user=new User();
                  $news=$user->tampil_statistik_home();  
                  $no = 1;
                  if(is_array($news) || is_object($news)){
                  foreach ($news as $key => $r) {
                    $jam=date('H:i:s', strtotime($r['date_create']));
                  echo"
                  <tr>
                    <td>$no</td>
                    <td>
                      $r[ip]
                    </td>
                    <td>
                      $r[browser]
                    </td>
                    <td>
                      $jam
                    </td>
                  </tr>";
                  $no++;}}?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>

      </div>
    </div>
<script src="chartjs/Chart.bundle.js"></script>
<style type="text/css">
    .container {
        width: 50%;
        margin: 15px auto;
    }
</style>
    <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($m = $result7->fetch_array()) { $mod=$user->bulan($m['bulan']); echo '"' . $mod . '",';}?>],
                    datasets: [{
                            label: 'Pengunjung',
                            data: [<?php while ($rs = $result9->fetch_array()) { echo '"' . $rs['pengunjung'] . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>