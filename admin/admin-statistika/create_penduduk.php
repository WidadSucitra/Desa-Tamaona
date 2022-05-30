<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";


if (isset($_POST['submit'])) {
  $jenis_data = $_POST['jenis_data'];
  $jumlah = $_POST['jumlah'];

  $query = "INSERT INTO penduduk_desa (jenis_data,jumlah) 
				        VALUES('$jenis_data','$jumlah')";

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
            <label for="jenis_data" class="form-label">Jenis Data</label>
            <input type="text" class="form-control" id="jenis_data" name="jenis_data" autocomplete="off" required placeholder="Masukkan jenis data">
          </div>
          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" rows="5" autocomplete="off" required placeholder="Masukkan jumlah data">
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