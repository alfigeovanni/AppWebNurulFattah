<?php
session_start();
 
if (!isset($_SESSION['username'])) {
  echo"<script>alert('Login Dahulu')</script>";
    header("Location: sign-in.php");
    
    exit(); // Terminate script execution after the redirect
}
?>
<?php include('../connection.php')?>
<?php include("partial/head.php")?>
<?php include("partial/navbar.php") ?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header">
              <h6>Edit Data Sub Materi</h6>
              <a class="btn btn-info" href="sub_materi.php"> Kembali </a>
              <!-- <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Materi</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Materi">
              </div> -->
            </div>
            <div class="card-body mx-1">
            <?php
            
      if (isset($_POST['edit'])) {
        $id=$_GET['id'];
      $sub_materi = $_POST['sub_materi'];
      $konten_materi = $_POST['konten_materi'];
      $filename = $_FILES['file_materi']['name'];
      $ukuran = $_FILES['file_materi']['size'];
      
      if($ukuran>5120000){
        echo"<script>
        alert('Data gagal upload!');
        window.location.href='edit_konten_materi.php?id=$id';
      </script>";
      }else{
      if($filename != "") {
      $rand = rand();
      $ekstensi =  array('pdf');
      
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
       
      if(!in_array($ext,$ekstensi) ) {
        echo"<script>
        alert('Tidak Sesuai Ketentuan!');
        window.location.href='edit_konten_materi.php?id=$id';
      </script>";
      }else{
        
          $xx = $rand.'_'.date('m').date('d').date('s').rand(10,9999).date('Y').'.pdf';
          $query = $kon->query("SELECT file_konten_materi FROM tb_konten_sub_materi WHERE id_konten_sub_materi=".$id);
           $dt = mysqli_fetch_object($query);
          $file_pointer = "file_upload/".$dt->file_konten_materi;
          unlink($file_pointer);
          move_uploaded_file($_FILES['file_materi']['tmp_name'], 'file_upload/'.$xx);
          $gas=mysqli_query($kon, "UPDATE tb_konten_sub_materi SET id_sub_materi='$sub_materi',
          nama_konten_materi='$konten_materi', file_konten_materi='$xx' 
          WHERE id_konten_sub_materi='".$id."'");
          if($gas){
            
            echo"<script>
            alert('Berhasil!');
              window.location.href='konten_materi.php';
            </script>";
          }else{
            echo"<script>
              alert('Data gagal ditambahkan!');
              window.location.href='edit_konten_materi.php?id=$id';
            </script>";
          }
          
        
      }
      }else{
        $id=$_GET['id'];
        $gas="UPDATE tb_konten_sub_materi SET id_sub_materi='$sub_materi',
          nama_konten_materi='$konten_materi' WHERE id_konten_sub_materi='".$id."'";
         
          if($kon->query($gas) === TRUE){
            echo"<script>
              window.location.href='konten_materi.php';
            </script>";
          }else{
            echo"<script>
              alert('Data gagal ditambahkan!');
              window.location.href='edit_konten_materi.php?id=$id';
            </script>";
          }
      }
    }
    }else{
      $query = $kon->query("SELECT b.* FROM tb_sub_materi as a inner join tb_konten_sub_materi as b
      on a.id_sub_materi = b.id_sub_materi WHERE b.id_konten_sub_materi=".$_GET['id']);
           $dt = mysqli_fetch_object($query);
        
    }
      ?>
      
      <form action="edit_konten_materi.php?id=<?=$dt->id_konten_sub_materi?>"  method="POST" enctype="multipart/form-data">
        <div class="row my-2">
          <div class="col-md-2">
            <label for="exampleFormControlInput1">Sub Materi</label>
          </div>
          <div class="col-md-5">
            <select class="form-control" name="sub_materi" id="">
              <option value="">- Sub Materi -</option>
              <?php 
                $sql=mysqli_query($kon,"SELECT * FROM tb_sub_materi");
                while ($data=mysqli_fetch_array($sql)) {
              ?>
              <?php
              if($dt->id_sub_materi==$data['id_sub_materi']){
              ?>
              <option value="<?= $data['id_sub_materi'] ?>"  selected><?= $data['nama_sub_materi'] ?></option>
              
              <?php
              continue;
              }
              ?>
              <option value="<?= $data['id_sub_materi'] ?>"  ><?= $data['nama_sub_materi'] ?></option>

              <?php
                }
              ?>
            </select>
          </div>
        </div>
        <div class="row my-2">
          <div class="col-md-2">
            <label for="exampleFormControlInput2">Nama Konten Materi</label>
          </div>
          <div class="col-md-5">
            <input name="konten_materi" type="text" class="form-control" id="exampleFormControlInput2" value="<?= $dt->nama_konten_materi ?>">   
          </div>
        </div>
        <div class="row my-2">
          <div class="col-md-2">
            <label for="exampleFormControlInput4">Upload File Materi</label>
          </div>
          <div class="col-md-5">
            <a href="file_upload/<?= $dt->file_konten_materi ?>">Lihat File</a>
            <input name="file_materi" type="file" class="form-control" id="exampleFormControlInput4" >
            <span style="font-size: 10px;" class="text-danger">PDF max 5mb</span>
          </div>
        </div>
        <button type="submit" name="edit" class="btn btn-primary mb-3">Edit</button>
        
      </form>
      
            </div>
          </div>
        </div>
      </div>
      
      
    </div>
  </main>
  <div class="fixed-plugin">
    <!-- <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a> -->
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="http://localhost/appnurulfattah/admin/assets/js/plugins/jquery37.js"></script>
  <script src="http://localhost/appnurulfattah/admin/assets/js/plugins/jquery37.min.js"></script>
  
  <script src="http://localhost/appnurulfattah/admin/assets/js/plugins/dataTables.min.js"></script>
  

  <script>
    new DataTable('#example');
    
  </script>
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