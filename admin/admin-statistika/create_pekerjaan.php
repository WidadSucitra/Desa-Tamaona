<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";


if (isset($_POST['submit'])) {
  $pekerjaan = $_POST['pekerjaan'];
  $jumlah_laki2 = $_POST['jumlah_laki2'];
  $jumlah_perempuan = $_POST['jumlah_perempuan'];

  $query = "INSERT INTO pekerjaan (pekerjaan,jumlah_laki2,jumlah_perempuan) 
				        VALUES('$pekerjaan','$jumlah_laki2','$jumlah_perempuan')";

	$query_run=mysqli_query($conn, $query);

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
    <section class="create-admin-potensi">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tambahkan Data</h1>
        <?php include "message.php";?>
        <!-- FORM -->
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" autocomplete="off" required placeholder="Masukkan pekerjaan">
          </div>
          <div class="mb-3">
            <label for="jumlah_laki2" class="form-label">Jumlah Laki-Laki</label>
            <input type="text" class="form-control" id="jumlah_laki2" name="jumlah_laki2" rows="5" autocomplete="off" required placeholder="Masukkan jumlah data laki-laki">
          </div>
          <div class="mb-3">
            <label for="jumlah_perempuan" class="form-label">Jumlah Perempuan</label>
            <input type="text" class="form-control" id="jumlah_perempuan" name="jumlah_perempuan" rows="5" autocomplete="off" required placeholder="Masukkan jumlah data perempuan">
          </div>
          <button type="submit" class="btn btn-primary" name="submit" value="Upload">Submit</button>
        </form>
    </section>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php





include('../includes/scripts.php');
include('../includes/footer.php');
?>