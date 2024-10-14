<?php 
// mengaktifkan session
session_start();

session_destroy(); // Hapus session data
 
// mengalihkan halaman sambil mengirim pesan logout

header("location:pages/sign-in.php");
echo"<script>
alert('berhasil logout');
<script>";
?>