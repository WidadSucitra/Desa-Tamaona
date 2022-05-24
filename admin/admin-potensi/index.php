<?php
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 

// $sql = "SELECT * FROM images ORDER BY id DESC";
//           $res = mysqli_query($conn,  $sql);

//           if (mysqli_num_rows($res) > 0) {
//           	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <!-- <div class="alb"> -->
             	<!-- <img src="uploads/<?=$images['image_url']?>"> -->
             <!-- </div> -->
          		
    <?php //} }

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <section class="index-potensi">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Potensi Desa Tamaona</h1>
            <a href="create.php"><button class="btn-index-potensi">Tambah Potensi</button></a>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Jenis Potensi</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Gambar</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $query = "SELECT * FROM potensi_desa ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['jenis_potensi']; ?></td>
                  <td><?php echo substr($row['ket'], 0, 1000); ?></td>
                  <td><img src="../uploads/jenis_potensi/<?php echo $row['image_url']; ?>"></td>
                  <td>
                    <a href="edit.php?id=<?= $row['id'] ?>"><button class="btn btn-warning">Edit</button></a>
                    <a href="hapus.php<?php echo $row ?>"><button class="btn btn-danger">Hapus</button></a>
                  </td>
                </tr>
                <?php
                  $no++;
                }
                ?>
              </tbody>
              </table>

          </section>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
include('../includes/scripts.php');
include('../includes/footer.php');
?>