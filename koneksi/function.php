<?php
    $conn = mysqli_connect("localhost","root","","feedbackfrenzy");
    if(mysqli_connect_errno()){
        echo" Koneksi Database Gagal! :" . mysqli_connect_error();
    }

    function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
        }
        return $rows;
    }

    function feed($feed){
        global $conn;
        mysqli_query($conn,"DELETE FROM feedback WHERE id = '$feed'");
        mysqli_affected_rows($conn);

    }
?>