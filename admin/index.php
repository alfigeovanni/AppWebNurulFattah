<?php
session_start();
 
if (!isset($_SESSION['username'])) {
  echo"<script>alert('Login Dahulu')</script>";
    header("Location: pages/sign-in.php");
    
    exit(); // Terminate script execution after the redirect
}
?>
<?php include('connection.php')?>
<?php include('pages/partial/head.php'); ?>
<?php include('pages/partial/navbar.php'); ?>

<?php
$query = $kon->query("SELECT COUNT(id_sub_materi) as cs_materi FROM tb_sub_materi");
      if($query->num_rows > 0){
         $data = mysqli_fetch_object($query);
      }else{
         echo "data tidak tersedia";
         die();
      }

      $qr = $kon->query("SELECT COUNT(id_materi) as c_materi FROM tb_materi");
      if($qr->num_rows > 0){
         $dt = mysqli_fetch_object($qr);
      }else{
         echo "data tidak tersedia";
         die();
      }
      $qry = $kon->query("SELECT COUNT(id_konten_sub_materi) as c_konten FROM tb_konten_sub_materi");
      if($qry->num_rows > 0){
         $dtsql = mysqli_fetch_object($qry);
      }else{
         echo "data tidak tersedia";
         die();
      }
?>


<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
        <div class="col-md-3">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-pencil primary font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3><?= $dt->c_materi ?></h3>
                  <span>Kategori Materi</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="col-md-3 col-sm-6">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-pencil primary font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3><?= $data->cs_materi ?></h3>
                  <span>Sub Kategori Materi</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="col-md-3 col-sm-6">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-pencil primary font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3><?= $dtsql->c_konten ?></h3>
                  <span>File Materi</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
    <!-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-12">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold"></p>
                <h5 class="font-weight-bolder">
                  <?= $data->cs_materi ?> Data Materi Agama
                </h5>
                <p class="mb-0">
                  <span class="text-xl font-weight-bolder"><?= $dt->c_materi ?></span>
                  Kategori Materi Agama
                </p>
              </div>
            </div> -->
            <!-- <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div> -->
          <!-- </div>
        </div>
      </div> -->
    </div>
  </div>
<style>
  .counter{
    color: #222;
    font-family: 'Rubik', sans-serif;
    text-align: center;
    width: 210px;
    height: 210px;
    padding: 20px;    
    margin: 0 auto;
    border-radius: 100px;
    position: relative;
    z-index: 1;
}
.counter:before,
.counter:after{
    content: '';
    background: linear-gradient(to right, #3da2f4, #1a57f2);
    height: 50%;
    width: 95%;
    border-radius: 120px 120px 0 0;
    position: absolute;
    left: 0;
    top: 0;
    z-index: -1;
}
.counter:after{
    border-radius: 0 0 120px 120px;
    top: auto;
    bottom: 0;
    left: auto;
    right: 0;
}
.counter .counter-content{
    background-color: #fff;
    height: 100%;
    padding: 30px 12px;
    border-radius: 50%;
    box-shadow: 5px 5px rgba(0,0,0,0.1);
}
.counter .counter-icon{
    color: #d1d1d1;
    font-size: 35px;
    line-height: 35px;
    margin: 0 0 13px;
}
.counter .counter-value{
    color: #1a57f2;
    font-size: 30px;
    font-weight: 600;
    display: block;
}
.counter h3{
    color: #555;
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;
    margin: 0 0 8px;
}
.counter.orange:before,
.counter.orange:after{
    background: linear-gradient(to right, #EB9421, #EF6024);
}
.counter.orange .counter-value{ color: #EF6024; }
.counter.purple:before,
.counter.purple:after{
    background: linear-gradient(to right, #8475B6, #483F90);
}
.counter.purple .counter-value{ color: #483F90; }
.counter.green:before,
.counter.green:after{
    background: linear-gradient(to right, #ADCE37, #61BC47);
}
.counter.green .counter-value{ color: #61BC47; }
@media screen and (max-width:990px){
    .counter{ margin-bottom: 40px; }
}

</style>
<script>
  $(document).ready(function(){
    $('.counter-value').each(function(){
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        },{
            duration: 3500,
            easing: 'swing',
            step: function (now){
                $(this).text(Math.ceil(now));
            }
        });
    });
});
</script>
  <!-- <footer class="footer pt-3">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer> -->
</div>
</main>


<!--   Core JS Files   -->
<script src="./assets/js/core/popper.min.js"></script>
<script src="./assets/js/core/bootstrap.min.js"></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="./assets/js/plugins/chartjs.min.js"></script>
<script>
  var ctx1 = document.getElementById("chart-line").getContext("2d");

  var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

  gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
  gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
  new Chart(ctx1, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Mobile apps",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#5e72e4",
        backgroundColor: gradientStroke1,
        borderWidth: 3,
        fill: true,
        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#fbfbfb',
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#ccc',
            padding: 20,
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
</script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>