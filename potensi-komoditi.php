<?php 
include "navbar.php"; 
include "admin/config.php";
?>



  <!-- ======= Jumbotron ======= -->
  <section class="d-flex align-items-center">
    <div class="jumbotron-potensi jumbotron">
      <h1 class="container">Potensi Komoditi</h1>
    </div>
  </section><!-- End HJumbotron -->

  <!-- Isi Website -->
  <main>
    <section>
      <div class="container komoditi">

        <!-- <div class="row potensi-komoditi">
          <div class="col-md-6">
            <h2>Komoditi Pertanian</h2>
            <p>Komoditi unggulan utama sektor pertanian Desa Tamaona adalah pada tanaman pangan dan hortikultura, antara lain: talas bogor, nanas gati, pisang rajabulu dan manggis raya. Keempat komoditi tersebut adalah unggulan khas Desa Tamaona.</p>
          </div>  
          <div class="col-md-6">
            <img src="assets/img/potensi/komoditi/pertanian.jpg" alt="">
          </div>   
        </div> -->
        
        <?php
          $query = "SELECT * FROM potensi_komoditi ORDER BY id ASC";
          $result = mysqli_query($conn, $query);

          if(!$result) {
            die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
          }
          $no = 1;

          while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="row potensi-komoditi berwarna">
          <div class="col-md-6">
            <img src="admin/uploads/potensi_komoditi/<?php echo $row['gambar']; ?>">
          </div>   
          <div class="col-md-6">
            <h2><?php echo $row['jenis_komoditi']; ?></h2>
            <p><?php echo substr($row['deskripsi'], 0, 1000); ?></p>
          </div>  
        </div>
        <?php
          $no++;
        }
        ?>

        <!-- <div class="row potensi-komoditi">
          <div class="col-md-6">
            <a href="">
              <h2>Komoditi Perikanan</h2>
            </a>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
          </div>  
          <div class="col-md-6">
            <img src="assets/img/potensi/komoditi/perikanan.jpg" alt="">
          </div>   
        </div>

        <div class="row potensi-komoditi berwarna">
          <div class="col-md-6">
            <img src="assets/img/potensi/komoditi/peternakan.jpg" alt="">
          </div>   
          <div class="col-md-6">
            <a href="">
              <h2>Komoditi Peternakan</h2>
            </a>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
          </div>  
        </div> -->

      </div>
    </section>
  </main>


<?php 
include "footer.php"; 
?>