<?php 
include "navbar.php"; 
include "admin/config.php";
?>

  <!-- ======= Jumbotron ======= -->
  <section class="d-flex align-items-center">
    <div class="jumbotron-potensi jumbotron">
      <h1 class="container">Potensi Wilayah dan Batas-Batas Wilayah</h1>
    </div>
  </section><!-- End HJumbotron -->

  <main>
    <section>
      <div class="container potensi">

        <div class="row potensi-wilayah-batas">
            <div class="col mt-5">
                <h1>Batas-Batas Wilayah</h1>
            </div> 
        </div>

        <div class="row potensi-wilayah-batas justify-content-center">
                <?php
                  $query = "SELECT * FROM batas_wilayah ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <div class="card potensi-wilayah-batas" style=" background-color: #609773; color:white;">
                <h5><?php echo $row['batas']; ?></h5>
                <img class="card-img-top" src="admin/uploads/batas/<?php echo $row['image_url']; ?>"  alt="Card image cap">
                <div class="card-body">
                  <p class="card-text" style="color:white;"><?php echo substr($row['ket'], 0, 1000); ?></p>
                </div>
            </div>
            <?php
                  $no++;
                }
                ?>
            <!-- <div class="card potensi-wilayah-batas">
                <h5>Batas Timur</h5>
                <img class="card-img-top" src="assets/img/potensi/batas/batas1.jpg" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="row potensi-wilayah-batas justify-content-center">
            <div class="card potensi-wilayah-batas">
                <h5>Batas Utara</h5>
                <img class="card-img-top" src="assets/img/potensi/batas/batas1.jpg" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="card potensi-wilayah-batas">
                <h5>Batas Timur</h5>
                <img class="card-img-top" src="assets/img/potensi/batas/batas1.jpg" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div> -->
            </div> 
        </div>

      </div>
    </section>
  </main>

  <?php 
include "footer.php"; 
?>