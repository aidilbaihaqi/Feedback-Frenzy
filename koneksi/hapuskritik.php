<?php 
    $id = $_GET['id'];
    include "function.php";
    if(feed($id)>0){
        echo"<script>
                alert('Kritik Berhasil Dihapus')
                document.location = '../dashboard.php';
            </script>";
    }else{
        echo"<script>
                alert('Kritik Berhasil Dihapus')
                document.location = '../dashboard.php';
            </script>";
    }
?>