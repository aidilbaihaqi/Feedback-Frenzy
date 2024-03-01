<?php 
  session_start();
  
  if(!isset($_SESSION["login"])){
    echo"<script>
          alert('Anda Harus Login Terlebih Dahulu');
          document.location = 'login.php';
        </script>";
    exit;
  }
  include "koneksi/function.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1.0"
        />
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
          crossorigin="anonymous"
        />
        <title>FeedBackFrenzy</title>
      </head>
<body>
   
    <div class="bg-dark h-100">
        <nav class="navbar sticky-top bg-white shadow-sm">
            <div class="container-fluid">
              <a class="navbar-brand d-flex justify-content-center align-items-center" href="#">
                <img src="asset/logo-angkatan.png" alt="Logo" width="100" class="d-inline-block align-text-top  text-center">
                FeedBackFrenzy
              </a>
                  <a class="btn btn-sm btn-outline-danger " href="logout.php" onclick="return confirm('yakin ingin logout?')">
                <img src="asset/logout.png" style="width: 20px;" alt=""></a>
            </div>
          </nav>
    <div class="container">
        <div class="card mt-4 overflow-x-scroll">
            <div class="card-body">
            <?php 
            $mhs = mysqli_query($conn,"SELECT * FROM feedback");
            ?>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kritik & Saran</th>
                        <th scope="col">Dituju Kepada</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <?php
                     $no = 1;
                     foreach($mhs as $f) :
                    ?>
                    <tbody>
                      <tr>
                        <th scope="row"><?= $no++;?></th>
                        <td style="width : 700px;"><?= $f['kritik'];?></td>
                        <td><?= $f['kepada'];?></td>
                        <td>
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $f['id'];?>">
                                Detail
                            </button>
                            <div class="modal fade" id="staticBackdrop<?= $f['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" >
                                <div class="modal-content">
                                  <div class="modal-header" id="">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <h3>Kritik & Saran</h3>
                                    <p><?= $f['kritik'];?></p>
                                    <span class="fw-semibold">Kepada:<?= $f['kepada'];?> </span><br>
                                    <span class="fw-semibold">Penerima Spesifik: <?= $f['penerima'];?></span>
                                  </div>
                                  <div class="modal-footer">
                                    <a type="button" class="btn btn-danger" name ="delete" onclick="return confirm('Yakin hapus ini?')" href="koneksi/hapuskritik.php?id=<?= $f['id'];?>">Hapus</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                      </tr>
                      
                     <?php endforeach;?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="d-flex flex-column justify-content-center align-items-center bg-dark py-3">
        <span class="fw-light text-white">made by Enthusiastech</span>
    <div class="pt-2 gap-2 d-flex">
        <a href="https://enthusiastech.vercel.app" target="_blank"><img src="asset/logo-enthusiastech-putih.png" width="20" alt=""></a>
    <a href="https://instagram.com/enthusiastech.id" target="_blank"><img src="asset/logo-ig-putih.png" height="22" alt=""></a>
    </div>
</div>
</footer>


<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    login
  </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body text-center bg-info text-white rounded-4">
          Anda Berhasil Login!
        </div>
    </div>
  </div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalhapus">
    hapus
  </button>  
  <div class="modal fade" id="exampleModalhapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body text-center bg-success text-white rounded-4">
          Anda Berhasil Hapus!
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