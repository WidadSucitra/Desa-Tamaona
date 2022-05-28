<?php 
include "navbar.php"; 
include "admin/config.php";
?>

  <!-- jumbotron -->
  <section class="d-flex align-items-center">
    <div class="jumbotron-potensi jumbotron">
      <h1 class="container">Potensi Desa Tamaona</h1>
    </div>
  </section>

  <!-- Isi Website -->
  <main>
    <section>
      <div class="container potensi">
        <?php
          $query = "SELECT * FROM potensi_desa ORDER BY id ASC";
          $result = mysqli_query($conn, $query);

          if(!$result) {
            die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
          }
          $no = 1;

          while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <div class="row potensi-wilayah">
          <div class="col-md-6">
            <h2><?php echo $row['jenis_potensi']; ?></h2>
            <p><?php echo substr($row['ket'], 0, 1000); ?></p>
          </div>  
          <div class="col-md-6">
            <img src="admin/uploads/jenis_potensi/<?php echo $row['image_url']; ?>">
          </div>   
        </div>

        <!-- <div class="row potensi-wilayah berwarna">
          <div class="col-md-6">
            <img src="assets/img/potensi/jumbotron-potensi.jpg" alt="">
          </div>   
          <div class="col-md-6">
            <a href="">
              <h2>Sarana dan Prasarana</h2>
            </a>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
          </div>  
        </div>

        <div class="row potensi-wilayah">
          <div class="col-md-6">
            <a href="">
              <h2>Potensi Sumber Daya Air</h2>
            </a>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
          </div>  
          <div class="col-md-6">
            <img src="assets/img/potensi/jumbotron-potensi.jpg" alt="">
          </div>   
        </div>

        <div class="row potensi-wilayah berwarna">
          <div class="col-md-6">
            <img src="assets/img/potensi/jumbotron-potensi.jpg" alt="">
          </div>   
          <div class="col-md-6">
            <a href="">
              <h2>Potensi Wisata</h2>
            </a>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
          </div>  
        </div>

        <div class="row potensi-wilayah">
          <div class="col-md-6">
            <a href="">
              <h2>Komoditi Pertanian, Perkebunan, Perikanan, dan Peternakan</h2>
            </a>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
          </div>  
          <div class="col-md-6">
            <img src="assets/img/potensi/jumbotron-potensi.jpg" alt="">
          </div>   
        </div> -->
        <?php } ?>
      </div>
    </section>
  </main>

  <?php 
include "footer.php"; 
?>
