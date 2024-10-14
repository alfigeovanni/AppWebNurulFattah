<?php
require_once('../connection.php');
try {
      $sql = "DELETE FROM tb_konten_sub_materi WHERE id_konten_sub_materi=".$_GET['id'];
      $kon->query($sql);
} catch (Exception $e) {
      echo $e;
      die();
}
 
$file_pointer = "file_upload/".$_GET['file'];
  

if (!unlink($file_pointer)) {
      echo("$file_pointer cannot be deleted due to an error");
} 
else { 
    echo("$file_pointer has been deleted"); 
    echo "<script>
    alert('Data berhasil di hapus');
    window.location.href='konten_materi.php';
    </script>";
} 

   
?>