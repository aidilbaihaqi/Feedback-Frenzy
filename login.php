<?php
  session_start();
  include "koneksi/function.php";
  if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
  
    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
  
    // cek username
    if(mysqli_num_rows($result) === 1) {
      // cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password,$row["password"])){
        // set session
        $_SESSION["login"] = true;
        echo"<script>
              alert('Selamat Anda Berhasil Login');
              document.location = 'dashboard.php';
            </script>";
        exit;
      }
  
    }
    $error = true;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"/>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"/>
    <title>FeedBackFrenzy</title>
  </head>
<body>
  <div class="container vh-100">
    <div class="d-flex justify-content-center flex-column py-5 ">
            <h1 class="text-uppercase text-center fw-bold">FeedBackFrenzy</h1>
            <div class="d-flex justify-content-center">
            <img src="asset/logo-angkatan.png" alt="" width="200">
          </div>
            <div class="d-flex justify-content-center flex-column mt-3">
              <span class="fw-medium text-center">Welcome to feedback forum INFINI-TI 2023</span>
              <span class="fw-medium text-center">Send your criticism and suggestion!</span>

          </div>
    </div>
    <div class="pt-2 d-flex justify-content-center">
      <div class="w-50">
        <form action="" method="post">
          <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required autocomplete="off">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="password" required name="password">
            <label for="floatingPassword">Password</label>
          </div>      
          <button type="submit" class="btn btn-dark rounded-5 px-4 float-end mt-2 text-uppercase" name="login">Login</button>
        </form>
      </div>
      </div>
    </div>
    
  </div>
  <footer>
    <div class="d-flex flex-column justify-content-center align-items-center py-3">
        <span class="fw-light">made by Enthusiastech</span>
    <div class="pt-2 gap-2 d-flex">
        <a href="https://enthusiastech.vercel.app" target="_blank"><img src="asset/logo-enthusiastech.png" width="20" alt=""></a>
    <a href="https://instagram.com/enthusiastech.id" target="_blank"><img src="asset/logo-ig.png" height="22" alt=""></a>
    </div>
</div>
</footer>

<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    login
  </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body text-center bg-info text-white rounded-4">
          Anda Berhasil Logout!
        </div>
    </div>
  </div> -->

  <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
      integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
      crossorigin="anonymous"
    ></script>
</body>
</html>