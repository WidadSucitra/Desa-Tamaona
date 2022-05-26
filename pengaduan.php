<?php 
include "navbar.php"; 
include "admin/config.php";
?>

  <!-- jumbotron -->
  <section class="d-flex align-items-center">
    <div class="jumbotron-potensi jumbotron">
      <h1 class="container">Pengaduan</h1>
    </div>
  </section>

  <!-- PENGADUAN TEXT -->
  <section class="pengaduan container">
      <div class="teks">
          <h1 class="pembuka">Pengaduan Terkait Desa Tamaona</h1>
      </div>

      <!-- fitur tambah pengaduan -->
      <div class="pengaduan-simbol">
        <a href="form-pengaduan.php">
          <p>Buat Pengaduan</p>
          <button><img src="assets/img/pengaduan/add.png"></button>
        </a>
      </div>
      

      <!-- isi website -->

      <div class="pengaduan">
          <div class="row pengaduan-kegiatan">
              <div class="col-md-3">
                <img src="assets/img/pengaduan/jembatan.jpg">
              </div>
              <div class="col-md-8">
                  <h2>Jembatan Putus</h2>
                  <!-- <p class="waktu">28/02/2021</p> -->
                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
              </div>
          </div>

          <div class="row pengaduan-kegiatan">
            <div class="col-md-3">
              <img src="assets/img/pengaduan/jembatan.jpg">
            </div>
            <div class="col-md-8">
                <h2>Pengaduan 2</h2>
                <!-- <p class="waktu">28/02/2021</p> -->
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
            </div>
        </div>

        <div class="row pengaduan-kegiatan">
            <div class="col-md-3">
              <img src="assets/img/pengaduan/jembatan.jpg">
            </div>
            <div class="col-md-8">
                <h2>Pengaduan 3</h2>
                <!-- <p class="waktu">28/02/2021</p> -->
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
            </div>
        </div>

        <div class="row pengaduan-kegiatan">
            <div class="col-md-3">
              <img src="assets/img/pengaduan/jembatan.jpg">
            </div>
            <div class="col-md-8">
                <h2>Pengaduan 4</h2>
                <!-- <p class="waktu">28/02/2021</p> -->
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
            </div>
        </div>
          
      </div>

  </section>
  
<?php 
include "footer.php"; 
?>