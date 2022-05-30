<?php
ob_start(); 
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 
        		
if(isset($_POST['tombol_delete'])){
  $fasilitas_id = $_POST['tombol_delete'];

  $check_img_query = "SELECT * FROM fasilitas_desa WHERE id=$fasilitas_id' LIMIT 1";
  $img_res = mysqli_query($conn,$query);
  $res_data = mysqli_fetch_array($img_res);

  $image = $res_data['image_url'];

  $query = "DELETE FROM fasilitas_desa WHERE id='$fasilitas_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);



  if($query_run)
    {
      if(file_exists('../uploads/fasilitas/'.$image)){
          unlink("../uploads/fasilitas/'.$image");
      }
      move_uploaded_file($_FILES['image_url']['tmp_name'], '../uploads/fasilitas/'.$update_filename);
     
        
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

if(isset($_POST['submit_delete'])){
  $layanan_id = $_POST['submit_delete'];

  $check_img_query = "SELECT * FROM layanan_desa WHERE id=$layanan_id' LIMIT 1";
  $img_res = mysqli_query($conn,$query);
  $res_data = mysqli_fetch_array($img_res);

  $image = $res_data['image_url'];

  $query = "DELETE FROM layanan_desa WHERE id='$layanan_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);



  if($query_run)
    {
      if(file_exists('../uploads/layanan/'.$image)){
          unlink("../uploads/layanan/'.$image");
      }
      move_uploaded_file($_FILES['image_url']['tmp_name'], '../uploads/layanan/'.$update_filename);
     
        
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
            <h1 class="h3 mb-4 text-gray-800">Fasilitas Desa Tamaona</h1>
            <a href="create.php"><button class="btn-index-potensi">Tambah Fasilitas</button></a>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Fasilitas</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Gambar</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $query = "SELECT * FROM fasilitas_desa ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['fasilitas']; ?></td>
                  <td><?php echo substr($row['ket'], 0, 1000); ?></td>
                  <td><img src="../uploads/fasilitas/<?php echo $row['image_url']; ?>"></td>
                  <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">
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
            <h1 class="h3 mb-4 text-gray-800">Pelayanan di Desa Tamaona</h1>
            <a href="create_layanan.php"><button class="btn-index-potensi">Tambah Layanan</button></a>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Layanan</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Gambar</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $query = "SELECT * FROM layanan_desa ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['layanan']; ?></td>
                  <td><?php echo substr($row['ket'], 0, 1000); ?></td>
                  <td><img src="../uploads/layanan/<?php echo $row['image_url']; ?>"></td>
                  <td>
                    <a href="edit_layanan.php?id=<?= $row['id'] ?>">
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
        <!-- /.container-fluid -->



      </div>
      <!-- End of Main Content -->

<?php
include('../includes/scripts.php');
include('../includes/footer.php');
?>