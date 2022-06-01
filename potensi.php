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
            if(($row['id'])%2 =='0'){?>
              <div class="row potensi-wilayah">
                <div class="col-md-6">
                  <h2><?php echo $row['jenis_potensi']; ?></h2>
                  <p><?php echo substr($row['ket'], 0, 1000); ?></p>
                </div>  
                <div class="col-md-6">
                  <img src="admin/uploads/jenis_potensi/<?php echo $row['image_url']; ?>">
                </div>   
              </div>
            <?php } else {?>
              <div class="row potensi-wilayah">
              <div class="col-md-6">
                <img src="admin/uploads/jenis_potensi/<?php echo $row['image_url']; ?>">
              </div>   
              <div class="col-md-6">
                <h2><?php echo $row['jenis_potensi']; ?></h2>
                <p><?php echo $row['ket'];?></p>
              </div>  
            </div>
            <?php }
          } ?>
      </div>
    </section>
  </main>

  <?php 
include "footer.php"; 
?>
