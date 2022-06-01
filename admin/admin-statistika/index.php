<?php
ob_start(); 
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 

// PENDUDUK DESA
if(isset($_POST['submit_delete'])){
  $penduduk_id = $_POST['submit_delete'];

  $check_img_query = "SELECT * FROM penduduk WHERE id=$penduduk_id' LIMIT 1";
  $img_res = mysqli_query($conn,$query);
  $res_data = mysqli_fetch_array($img_res);

  $image = $res_data['url_gambar'];

  $query = "DELETE FROM penduduk WHERE id='$penduduk_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);

  if($query_run)
    {
      if(file_exists('../uploads/statistik/'.$image)){
          unlink("../uploads/statistik/'.$image");
      }
      move_uploaded_file($_FILES['url_gambar']['tmp_name'], '../uploads/statistik/'.$update_filename);
     
        
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

// PEKERJAAN
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

// DUSUN DESA
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
        <!-- PENDUDUK DESA -->
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
                  <th scope="col">Gambar</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $query = "SELECT * FROM penduduk ORDER BY id ASC";
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
                  <td><img src="../uploads/statistik/<?php echo $row['url_gambar']; ?>"></td>
                  <td>
                  <a href="edit_penduduk.php?id=<?= $row['id'] ?>">
                    <button  class="ikon2">
                      <img class="ikon2" src="../img/edit.png" alt="">
                    </button></a>
                    <form method="POST">
                      <button class="ikon1" type="submit" name="submit_delete" value="<?= $row['id'] ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')">
                      <img class="ikon1"  src="../img/trash.png" alt="">
                      </button>
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

        <!-- PEKERJAAN-->
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
                  <a href="edit_pekerjaan.php?id=<?= $row['id'] ?>">
                    <button  class="ikon2">
                      <img class="ikon2" src="../img/edit.png" alt="">
                    </button></a>
                    <form method="POST">
                      <button class="ikon1" type="submit" name="tombol_delete" value="<?= $row['id'] ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')">
                      <img class="ikon1"  src="../img/trash.png" alt="">
                      </button>
                    </form>
                  </td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
              </table>

          </section>


        </div>

        <!-- DUSUN DESA -->
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
                    <a href="edit_dusun.php?id=<?= $row['id'] ?>">
                    <button  class="ikon2">
                      <img class="ikon2" src="../img/edit.png" alt="">
                    </button></a>
                    <form method="POST">
                      <button class="ikon1" type="submit" name="klik_delete" value="<?= $row['id'] ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')">
                      <img class="ikon1"  src="../img/trash.png" alt="">
                      </button>
                    </form>
                  </td>
                </tr>
                <?php
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