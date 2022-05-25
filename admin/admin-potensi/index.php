<?php
ob_start(); 
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 
        		
if(isset($_POST['submit_delete'])){
  $potensi_id = $_POST['submit_delete'];

  $check_img_query = "SELECT * FROM potensi_desa WHERE id=$potensi_id' LIMIT 1";
  $img_res = mysqli_query($conn,$query);
  $res_data = mysqli_fetch_array($img_res);

  $image = $res_data['image_url'];

  $query = "DELETE FROM potensi_desa WHERE id='$potensi_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);



  if($query_run)
    {
      if(file_exists('../uploads/jenis_potensi/'.$image)){
          unlink("../uploads/jenis_potensi/'.$image");
      }
      move_uploaded_file($_FILES['image_url']['tmp_name'], '../uploads/jenis_potensi/'.$update_filename);
     
        
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
include('../includes/scripts.php');
include('../includes/footer.php');
?>