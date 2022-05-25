<?php
ob_start(); 
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 
        		
if(isset($_POST['submit_delete'])){
  $home_id = $_POST['submit_delete'];

  $check_img_query = "SELECT * FROM adminhome WHERE id=$home_id' LIMIT 1";
  $img_res = mysqli_query($conn,$query);
  $res_data = mysqli_fetch_array($img_res);

  $image = $res_data['Gambar'];

  $query = "DELETE FROM adminhome WHERE id='$home_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);



  if($query_run)
    {
      if(file_exists('../uploads/home/'.$image)){
          unlink("../uploads/home/'.$image");
      }
      move_uploaded_file($_FILES['Gambar']['tmp_name'], '../uploads/home/'.$update_filename);
     
        
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
          <section class="index-home">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Desa Tamaona</h1>

            <button class="btn-index-home"><a href="create.php">Tambah Data</a></button>

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
                  $query = "SELECT * FROM adminhome ORDER BY id ASC";
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
                  <td><img src="../uploads/home/<?php echo $row['Gambar']; ?>"></td>
                  <td class="btn-index">
                    <a href="edit.php?id=<?= $row['id'] ?>"><button class="btn btn-warning">Edit</button></a>
                    <form method="POST">
                      <button type="submit" name="submit_delete" value="<?= $row['id'] ?>" class="btn btn-danger">Hapus</button>
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