<?php
ob_start(); 
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 

if(isset($_POST['submit_delete'])){
  $contact_id = $_POST['submit_delete'];

  $query = "DELETE FROM hubungi_kami WHERE id='$contact_id' LIMIT 1";
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
          <section class="index-event">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Daftar Contact Us</h1>

            <!-- <button class="btn-index-event"><a href="create.php">Tambah Event</a></button> -->

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Perusahaan</th>
                  <th scope="col">Telepone</th>
                  <th scope="col">Pesan</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM hubungi_kami ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['perusahaan']; ?></td>
                  <td><?php echo $row['telepone']; ?></td>
                  <td width=50%><?php echo $row['pesan']; ?></td>
                  
                  <td class="btn-index">
                  <!-- <a href="edit.php?id=<?= $row['id'] ?>"><button class="btn btn-warning">Edit</button></a>
                    <a href="proses_hapus.php<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')"><button class="btn btn-danger">Hapus</button></a> -->
                    
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