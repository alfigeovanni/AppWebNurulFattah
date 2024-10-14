<?php
require_once('../connection.php');
try {
      $sql = "DELETE FROM tb_sub_materi WHERE id_sub_materi=".$_GET['id'];
      $run=$kon->query($sql);
      if($run){
            echo "<script>
            alert('Data berhasil di hapus');
            window.location.href='sub_materi.php';
            </script>";
      }
} catch (Exception $e) {
      echo $e;
      die();
}
 

    

   
?>