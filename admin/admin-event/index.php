<?php
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <section class="index-event">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Daftar Event</h1>

            <button class="btn-index-event"><a href="create.php">Tambah Event</a></button>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Gambar</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM daftar ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['Judul']; ?></td>
                  <td width=50%><?php echo substr($row['Deskripsi'], 0, 1000); ?>...</td>
                  <td><img style="width: 120px;" src="../uploads/event/<?php echo $row['Gambar']; ?>"></td>
                  <td class="btn-index">
                  <a href="edit.php?id=<?= $row['id'] ?>"><button class="btn btn-warning">Edit</button></a>
                    <a href="proses_hapus.php<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')"><button class="btn btn-danger">Hapus</button></a>
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