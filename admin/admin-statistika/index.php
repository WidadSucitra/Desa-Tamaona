<?php
ob_start(); 
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 
        		
if(isset($_POST['submit_delete'])){
  $penduduk_id = $_POST['submit_delete'];

  $query = "DELETE FROM penduduk_desa WHERE id='$penduduk_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);

  if($query_run)
    {
      // $_SESSION['message'] = "Data berhasil ditambahkan!";
      header('Location: index.php');
      exit(0);
  }
  else
  {
    $_SESSION['message'] = "Something went wrong";
    header('Location: index.php');
      exit(0);
    }
}

if(isset($_POST['tombol_delete'])){
  $pekerjaan_id = $_POST['tombol_delete'];

  $query = "DELETE FROM pekerjaan WHERE id='$pekerjaan_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);

  if($query_run)
    {
      // $_SESSION['message'] = "Data berhasil ditambahkan!";
      header('Location: index.php');
      exit(0);
  }
  else
  {
    $_SESSION['message'] = "Something went wrong";
    header('Location: index.php');
      exit(0);
    }
}

if(isset($_POST['klik_delete'])){
  $dusun_id = $_POST['klik_delete'];

  $query = "DELETE FROM dusun_desa WHERE id='$dusun_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);

  if($query_run)
    {
      // $_SESSION['message'] = "Data berhasil ditambahkan!";
      header('Location: index.php');
      exit(0);
  }
  else
  {
    $_SESSION['message'] = "Something went wrong";
    header('Location: index.php');
      exit(0);
    }
}

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <section class="index-potensi">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Penduduk Desa Tamaona</h1>
            <a href="create_penduduk.php"><button class="btn-index-potensi">Tambah Penduduk</button></a>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Jenis Data</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $query = "SELECT * FROM penduduk_desa ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['jenis_data']; ?></td>
                  <td><?php echo $row['jumlah']; ?></td>
                  <td>
                    <a href="edit_penduduk.php?id=<?= $row['id'] ?>"><button class="btn btn-warning">Edit</button></a>
                    <form method="POST">
                      <button type="submit" name="submit_delete" value="<?= $row['id'] ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')" class="btn btn-danger">Hapus</button>
                    </form>
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

        <div class="container-fluid">
          <section class="index-potensi">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Pekerjaan Penduduk Desa Tamaona</h1>
            <a href="create_pekerjaan.php"><button class="btn-index-potensi">Tambah Pekerjaan</button></a>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Pekerjaan</th>
                  <th scope="col">Jumlah laki-laki</th>
                  <th scope="col">Jumlah Perempuan</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $query = "SELECT * FROM pekerjaan ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['pekerjaan']; ?></td>
                  <td><?php echo $row['jumlah_laki2']; ?></td>
                  <td><?php echo $row['jumlah_perempuan']; ?></td>
                  <td>
                    <a href="edit_pekerjaan.php?id=<?= $row['id'] ?>"><button class="btn btn-warning">Edit</button></a>
                    <form method="POST">
                      <button type="submit" name="tombol_delete" value="<?= $row['id'] ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')" class="btn btn-danger">Hapus</button>
                    </form>
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

        <div class="container-fluid">
          <section class="index-potensi">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Dusun Desa Tamaona</h1>
            <a href="create_dusun.php"><button class="btn-index-potensi">Tambah Dusun</button></a>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Dusun</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $query = "SELECT * FROM dusun_desa ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['nama_dusun']; ?></td>
                  <td><?php echo $row['jumlah_penduduk']; ?></td>
                  <td>
                    <a href="edit_dusun.php?id=<?= $row['id'] ?>"><button class="btn btn-warning">Edit</button></a>
                    <form method="POST">
                      <button type="submit" name="klik_delete" value="<?= $row['id'] ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')" class="btn btn-danger">Hapus</button>
                    </form>
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