<?php
require_once('../connection.php');
try {
      $sql = "DELETE FROM tb_materi WHERE id_materi=".$_GET['id'];
      
      $kon->query($sql);
} catch (Exception $e) {
      echo $e;
      die();
}
     echo "<script>
     alert('Data berhasil di hapus');
     window.location.href='materi.php';
     </script>";
?>