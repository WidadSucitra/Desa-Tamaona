<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";


if (isset($_POST['submit'])) {
  $nama_dusun = $_POST['nama_dusun'];
  $jumlah_penduduk = $_POST['jumlah_penduduk'];

  $query = "INSERT INTO dusun_desa (nama_dusun,jumlah_penduduk) 
				        VALUES('$nama_dusun','$jumlah_penduduk')";

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
        <h1 class="h3 mb-4 text-gray-800">Tambahkan Dusun</h1>
        <?php include "message.php";?>
        <!-- FORM -->
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nama_dusun" class="form-label">Nama Dusun</label>
            <input type="text" class="form-control" id="nama_dusun" name="nama_dusun" autocomplete="off" required placeholder="Masukkan Nama Dusun">
          </div>
          <div class="mb-3">
            <label for="jumlah_penduduk" class="form-label">Jumlah Penduduk</label>
            <input type="text" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk" rows="5" autocomplete="off" required placeholder="Masukkan jumlah data">
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