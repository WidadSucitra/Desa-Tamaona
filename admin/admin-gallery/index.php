<?php
ob_start(); 
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 
        		
if(isset($_POST['submit_delete'])){
  $galeri_id = $_POST['submit_delete'];

  $check_img_query = "SELECT * FROM galeri_desa WHERE id=$galeri_id' LIMIT 1";
  $img_res = mysqli_query($conn,$query);
  $res_data = mysqli_fetch_array($img_res);

  $image = $res_data['gambar'];

  $query = "DELETE FROM galeri_desa WHERE id='$galeri_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);



  if($query_run)
    {
      if(file_exists('../uploads/galeri/'.$image)){
          unlink("../uploads/galeri/'.$image");
      }
      move_uploaded_file($_FILES['Gambar']['tmp_name'], '../uploads/galeri/'.$update_filename);
     
        
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
          <section class="index-galeri">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Desa Tamaona</h1>

            <button class="btn-index-galeri"><a href="create.php">Tambah Galeri</a></button>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM galeri_desa ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['judul']; ?></td>
                  <td><img src="../uploads/galeri/<?php echo $row['gambar']; ?>"></td>
                  <td width=50%><?php echo $row['deskripsi']; ?></td>
                  <td class="btn-index">
                    <a href="edit.php?id=<?= $row['id'] ?>">
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