<?php 
include "navbar.php"; 
include "admin/config.php";
?>

<!-- ======= Jumbotron ======= -->
<section class="d-flex align-items-center">
    <div class="jumbotron-potensi jumbotron">
      <h1 class="container">Potensi Wisata</h1>
    </div>
</section><!-- End HJumbotron -->

<main>
<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
        <div class="row potensi-wilayah-batas justify-content-center">
            <?php
               $query = "SELECT * FROM potensi_wisata ORDER BY id ASC";
               $result = mysqli_query($conn, $query);

                if(!$result) {
                   die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                 }
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <div class="card potensi-wilayah-batas">
                    <h5><?php echo $row['nama_wisata']; ?></h5>
                    <img class="card-img-top" src="admin/uploads/potensi_wisata/<?php echo $row['gambar']; ?>" alt="Card image cap">
                    <div class="card-body">
                      <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                </div>
          </div>
              <?php
                  }
              ?>
        </div>

      </div>

    </div>
  </section><!-- End Gallery Section -->
</main> 

<?php 
include "footer.php"; 
?>