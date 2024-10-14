<?php
session_start();
 
if (!isset($_SESSION['username'])) {
  echo"<script>alert('Login Dahulu')</script>";
    header("Location: sign-in.php");
    
    exit(); // Terminate script execution after the redirect
}
?>
<?php include('../connection.php')?>
<?php include('partial/head.php'); ?>
<?php include('partial/navbar.php'); ?>
    <!-- End Navbar -->
    <?php
    if (isset($_POST['edit'])) {
    $username = $_POST['username'];
    $id = $_POST['id_user'];
    $fullname = $_POST['fullname'];
    $password = md5($_POST['password']);
        $gas=mysqli_query($kon, "UPDATE tb_user SET username='$username', fullname='$fullname', 
        password='$password' 
        WHERE id_user='".$id."'");
        if($gas){
          echo"<script>
          alert('Berhasil!');
            window.location.href='profile.php';
          </script>";
        }else{
          echo"<script>
            alert('Data gagal diedit!');
            window.location.href='profile.php';
          </script>";
        }
        
      
    }else{
    $query = $kon->query("SELECT * FROM tb_user");
    $dt = mysqli_fetch_array($query);
    }
    ?>
    <div class="container-fluid py-4">
      <div class="row">
      <div class="col-md-8">
      <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../assets/img/users.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?= $dt['fullname'] ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                Admin Pesantren Nurul Fattah
              </p>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
        <form method="POST" action="profile.php" method="POST" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <button type="submit" name="edit" class="btn btn-primary btn-sm ms-auto">Update</button>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">User Information</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Username</label>
                    <input class="form-control" name="username" type="text" value="<?= $dt['username'] ?>">
                    <input class="form-control" name="id_user" type="hidden" value="<?= $dt['id_user'] ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Full Name</label>
                    <input class="form-control" type="text" name="fullname" value="<?= $dt['fullname'] ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Password</label>
                    <input class="form-control" name="password" type="password" value="<?= $dt['password'] ?>">
                  </div>
                </div>
              </div>              
            </div>
          </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>