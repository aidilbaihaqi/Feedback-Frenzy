<?php 
// Untuk mengaktifkan session pada php
session_start();
// Untuk menghapus semua session
session_destroy();
// pindah halaman ke halaman login
echo"<script>
        alert('Anda Berhasil Logout');
        document.location = 'login.php';
    </script>";
?>