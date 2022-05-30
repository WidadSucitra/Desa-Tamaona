<?php 
include "navbar.php"; 
include "admin/config.php";
?>

  <!-- jumbotron -->
  <section class="d-flex align-items-center">
    <div class="jumbotron-potensi jumbotron">
      <h1 class="container">Event</h1>
    </div>
  </section>

  <!-- EVENT TEXT -->
  <section class="event container">
      <div class="teks">
          <h1 class="pembuka">Event di Desa Tamaona</h1>
      </div>

      <!-- isi website -->
      <?php
          $query = "SELECT * FROM daftar ORDER BY id ASC";
          $result = mysqli_query($conn, $query);

          if(!$result) {
            die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
          }
          $no = 1;

          while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="event">
            <div class="row event-kegiatan">
                <div class="col-md-3">
                  <img src="admin/uploads/event/<?php echo $row['Gambar']; ?>">
                </div>
                <div class="col-md-8">
                    <h2><?php echo $row['Judul']; ?></h2>
                    <p><?php echo substr($row['Deskripsi'], 0, 1000); ?></p>
                </div>
            </div>
            <?php
                  $no++;
                }
                ?>   

          <!-- <div class="row event-kegiatan">
            <div class="col-md-3">
              <img src="assets/img/event/event1.jpg">
            </div>
            <div class="col-md-8">
                <h2>Festival Desa 2</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
            </div>
        </div>

        <div class="row event-kegiatan">
            <div class="col-md-3">
              <img src="assets/img/event/event1.jpg">
            </div>
            <div class="col-md-8">
                <h2>Festival Desa 3</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
            </div>
        </div>

        <div class="row event-kegiatan">
            <div class="col-md-3">
              <img src="assets/img/event/event1.jpg">
            </div>
            <div class="col-md-8">
                <h2>Festival Desa 4</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
            </div>
        </div> -->
          
      </div>

  </section>
  
<?php 
include "footer.php"; 
?>
