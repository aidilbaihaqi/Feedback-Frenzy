<?php 

  include "koneksi/function.php";
  if(isset($_POST['submit'])){
    $kritik = htmlspecialchars($_POST['kritik']);
    $kepada = htmlspecialchars($_POST['kepada']);
    $penerima = htmlspecialchars($_POST['penerima']);
    $qry = mysqli_query($conn,"INSERT INTO feedback VALUES ('','$kritik','$kepada','$penerima')");
    if(isset($qry)){
      echo"<script>
              alert('Kritik dan Saran Anda Telah Ditambahkan!');
              document.location = 'terimakasih.php';
           </script>";
    }else{
      echo"<script>
              alert('Kritik dan Saran Anda Telah Gagal Ditambahkan!');
              document.location = 'index.php';
           </script>";
    }
  }
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
    <div class="bg-dark min-vh-100">
      <div class="container">
        <div class=" py-5 d-flex justify-content-center align-items-center">
          <div class="card bg-white px-lg-5 py-5">
            <div class="card-body px-5">
              <div class="d-flex row justify-content-center">
                <img src="asset/logo1.png" style="width: 300px;" alt="" />
                <div class="text-center">
                  <h3>Form Penyampaian Kritik & Saran</h3>
                </div>
                <form action="" method="post">
                  <!-- Tambahkan kelas "overflow-y-auto" pada div ini -->
                  <div class="">
                    <div class="form-floating mb-3">
                      <textarea
                        class="form-control h-auto"
                        placeholder="Beri Kritik dan Saran" name="kritik"
                        id="floatingTextarea"
                        rows="6"
                        required ></textarea>
                      <label for="floatingTextarea">Beri Kritik dan Saran</label>
                    </div>
                    <div class="form-floating mb-3">
                      <select
                        class="form-select"
                        id="floatingSelect"
                        aria-label="Floating label select example" name="kepada"
                        required >
                        <option selected disabled value="">Pilih dituju</option>
                        <option value="1">Perorangan</option>
                        <option value="2">Pengurus Inti</option>
                        <option value="3">Keanggotaan</option>
                      </select>
                      <label for="floatingSelect">Dituju Kepada</label>
                    </div>
                    <div class="form-floating mb-3" id="penerimaSpesifikInput" style="display: none;">
                      <input
                        type="text"
                        class="form-control"
                        id="floatingInput"
                        placeholder="name@example.com" name="penerima" autocomplete="off"
                      />
                      <label for="floatingInput">Penerima Spesifik</label>
                    </div>
                    <button type="submit" class="btn btn-lg btn-dark rounded-5 text-uppercase float-end" name="submit">
                      Send Now!
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="">
        <div class="d-flex flex-column justify-content-center align-items-center bg-dark py-3 ">
            <span class="fw-light text-white">made by Enthusiastech</span>
        <div class="pt-2 gap-2 d-flex">
            <a href="https://enthusiastech.vercel.app" target="_blank"><img src="asset/logo-enthusiastech-putih.png" width="20" alt=""></a>
        <a href="https://instagram.com/enthusiastech.id" target="_blank"><img src="asset/logo-ig-putih.png" height="22" alt=""></a>
        </div>
    </div>
    </footer>
    <script>
        const ditujuSelect = document.getElementById('floatingSelect');
        const penerimaSpesifikInput = document.getElementById('penerimaSpesifikInput');
        ditujuSelect.addEventListener('change', function() {
          if (ditujuSelect.value === '1') {
            penerimaSpesifikInput.style.display = 'block';
          } else {
            penerimaSpesifikInput.style.display = 'none';
          }
        });
      </script>
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
