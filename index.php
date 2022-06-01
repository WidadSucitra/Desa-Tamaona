<?php 
include "navbar.php"; 
include "admin/config.php";
?>


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Selamat Datang di <br> Desa Tamaona</h1>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus quia dolorum pariatur, <br> nam velit expedita voluptas asperiores quis modi praesentium est sit ducimus</p>
    </div>
  </section><!-- End Hero -->

<main id="main">
  <!-- PANEL -->
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-10 info-panel">
        <div class="row">
          <div class="col-lg">
            <a href="index.html#profile">
            <img src="assets/img/home.png" float-left" alt="">
            <h4>Profil Desa</h4> </a> 
          </div>
          <div class="col-lg">
            <a href="index.html#sisper">
            <img src="assets/img/group.png"float-left" alt="">
          <h4>Struktur Pemerintahan</h4> </a>
          </div>
          <div class="col-lg">
            <a href="index.html#vismis">
            <img src="assets/img/target.png"float-left" alt="">
            <h4>Visi Misi</h4> </a>
          </div>
          <div class="col-lg">
            <a href="index.html#pin">
            <img src="assets/img/map.png"float-left" alt="">
            <h4>Lokasi</h4> </a>
          </div>
        </div>
      </div>
    </div>
  </div>

 <!-- ======= profile Section ======= -->
 <section id="profile" class="profile">
  <div>
  <div class="row container justify-content-center">
      <?php
          $query = "SELECT * FROM profil_desa ORDER BY id ASC";
          $result = mysqli_query($conn, $query);

          if(!$result) {
            die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
          }
          $no = 1;

          while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
        <h3><?php echo $row['judul']; ?></h3>
        <p><?php echo $row['deskripsi']; ?>
        <img src="admin/uploads/home/<?php echo $row['gambar']; ?>" alt="" class="img-fluid">
      </div>

      <!-- <div class="col-xl-5 col-lg-4 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-3 px-lg-2">
        <h3>Potensi dan Kebudayaan</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus quia dolorum pariatur, nam velit expedita voluptas asperiores quis modi praesentium est sit ducimus. Vvelit expedita voluptas asperiores quis modi praesentium est sit ducimus </p> 
        <a href="potensi.html" class="btn-get-started scrollto">Kunjungi Kami</a>
        <img src="assets/img/ilya-zoria-5pGT32puBKo-unsplash.jpg" alt="" class="img-fluid">
      </div>
    </div>
  </div> -->
    <?php
        }
    ?>
 </section>

  <!-- ======= Sisper Section ======= -->
  <section id="sisper" class="sisper">
    <div class="container-fluid">
      <div class="row container justify-content-center">
      <?php
          $query = "SELECT * FROM struktur ORDER BY id ASC";
          $result = mysqli_query($conn, $query);

          if(!$result) {
            die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
          }
          $no = 1;

          while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="col-md-10">
        <div class="section-title">
          <h2 class="word">Sistem Pemerintahan</h2>
        </div>
        <img src="admin/uploads/home/<?php echo $row['gambar']; ?>" alt="" class="img-fluid">
      </div>
    </div>
    </div>
      <?php
          }
      ?>
  </section>

  <!-- ======= Visi Misi Section ======= -->
  <section id="vismis" class="vismis">
    <div class="container">
    <?php
          $query = "SELECT * FROM visimisi ORDER BY id ASC";
          $result = mysqli_query($conn, $query);

          if(!$result) {
            die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
          }
          $no = 1;

          while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="section-title">
        <h2>Visi Misi</h2>
      </div>

      <div class="row visi-misi potensi-wilayah-batas justify-content-center">
        <div class="card potensi-wilayah-batas" style="width: 25rem;">
            <h5><?php echo $row['judul']; ?></h5>
            <img class="card-img-top" src="admin/uploads/home/<?php echo $row['gambar']; ?>" alt="Card image cap">
            <div class="card-body">
              <p class="card-text"><?php echo $row['deskripsi']; ?></p>
            </div>
        </div>
        <!-- <div class="card potensi-wilayah-batas" style="width: 25rem;">
            <h5>Misi</h5>
            <img class="card-img-top" src="assets/img/misi.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipi sicing elit. Minus quia dolorum pariatur, nam velit expedita voptas asperiores quis modi praesentium est sit ducimus. Velit expedita voluptas asperiores quis modi praesentium est sit ducimus.</p>
            </div>
        </div> -->
      </div>
    </div>
      <?php
          }
      ?>
  </section><!-- End vismis Section -->

  <!-- ======= Loc Section ======= -->
  <section id="pin" class="pin">
    <div class="container">
      <h2>Lokasi</h2>
      <div class="section-title">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31778.040102627572!2d120.0605284082321!3d-5.378035522280226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbea66e29d7cd4f%3A0x78f9ad0866279115!2sTamaona%2C%20Kec.%20Kindang%2C%20Kabupaten%20Bulukumba%2C%20Sulawesi%20Selatan!5e0!3m2!1sid!2sid!4v1649605483529!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </section><!-- End Loc Section -->

</main><!-- End #main -->

<?php 
include "footer.php"; 
?>