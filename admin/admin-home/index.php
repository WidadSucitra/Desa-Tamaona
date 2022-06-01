<?php
ob_start(); 
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 
        		
// Profil Desa
if(isset($_POST['submit_delete'])){
  $profil_id = $_POST['submit_delete'];

  $check_img_query = "SELECT * FROM profil_desa WHERE id=$profil_id' LIMIT 1";
  $img_res = mysqli_query($conn,$query);
  $res_data = mysqli_fetch_array($img_res);

  $image = $res_data['gambar'];

  $query = "DELETE FROM profil_desa WHERE id='$profil_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);

  if($query_run)
    {
      if(file_exists('../uploads/home/'.$image)){
          unlink("../uploads/home/'.$image");
      }
      move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/home/'.$update_filename);
            
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

// Struktur Pemerintahan
if(isset($_POST['tombol_delete'])){
  $struktur_id = $_POST['tombol_delete'];

  $check_img_query = "SELECT * FROM struktur WHERE id=$struktur_id' LIMIT 1";
  $img_res = mysqli_query($conn,$query);
  $res_data = mysqli_fetch_array($img_res);

  $image = $res_data['gambar'];

  $query = "DELETE FROM struktur WHERE id='$struktur_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);

  if($query_run)
    {
      if(file_exists('../uploads/home/'.$image)){
          unlink("../uploads/home/'.$image");
      }
      move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/home/'.$update_filename);
            
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

// Visi Misi
if(isset($_POST['klik_delete'])){
  $visimisi_id = $_POST['klik_delete'];

  // $check_img_query = "SELECT * FROM visimisi WHERE id=$visimisi_id' LIMIT 1";
  // $img_res = mysqli_query($conn,$query);
  // $res_data = mysqli_fetch_array($img_res);

  // $image = $res_data['gambar'];

  $query = "DELETE FROM visimisi WHERE id='$visimisi_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);

  if($query_run)
    {
      // if(file_exists('../uploads/home/'.$image)){
      //     unlink("../uploads/home/'.$image");
      // }
      // move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/home/'.$update_filename);
            
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
        <!-- Profil Desa -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <section class="index-home">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Profil Desa</h1>

            <button class="btn-index-home"><a href="create_profildesa.php">Tambah Data</a></button>

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
                  $query = "SELECT * FROM profil_desa ORDER BY id ASC";
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
                  <td width=50%><?php echo $row['deskripsi']; ?></td>
                  <td><img src="../uploads/home/<?php echo $row['gambar']; ?>"></td>
                  <td class="btn-index">
                    <a href="edit_profildesa.php?id=<?= $row['id'] ?>">
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
        
        <!-- Struktur Pemerintahan  -->
        <div class="container-fluid">
          <section class="index-home">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Struktur Pemerintahan</h1>

            <button class="btn-index-home"><a href="create_struktur.php">Tambah Data</a></button>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Gambar</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM struktur ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><img src="../uploads/home/<?php echo $row['gambar']; ?>"></td>
                  <td class="btn-index">
                    <a href="edit_struktur.php?id=<?= $row['id'] ?>">
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
        <!-- /.container-fluid -->

        <!-- Visi Misi -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <section class="index-home">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Visi Misi</h1>

            <button class="btn-index-home"><a href="create_visimisi.php">Tambah Data</a></button>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Deskripsi</th>
                  <!-- <th scope="col">Gambar</th> -->
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM visimisi ORDER BY id ASC";
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
                  <td width=50%><?php echo $row['deskripsi']; ?></td>
                  <td class="btn-index">
                    <a href="edit_visimisi.php?id=<?= $row['id'] ?>">
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