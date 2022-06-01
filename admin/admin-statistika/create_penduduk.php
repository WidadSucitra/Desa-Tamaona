<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";


if (isset($_POST['submit']) && isset($_FILES['url_gambar'])) {
  $jenis_data = $_POST['jenis_data'];
  $jumlah = $_POST['jumlah'];
  $url_gambar = $_FILES['url_gambar']['name'];
  $image_extension = pathinfo($url_gambar, PATHINFO_EXTENSION);
  $filename =time().'.'.$image_extension;

  $query = "INSERT INTO penduduk (jenis_data,jumlah,url_gambar) 
				        VALUES('$jenis_data','$jumlah','$filename')";

	$query_run=mysqli_query($conn, $query);

  if($query_run)
  {
      // Upload Image to uploads folder
      move_uploaded_file($_FILES['url_gambar']['tmp_name'], '../uploads/statistik/'.$filename);
      
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
        <h1 class="h3 mb-4 text-gray-800">Tambahkan penduduk</h1>
        <?php include "message.php";?>
        <!-- FORM -->
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="jenis_data" class="form-label">Jenis data</label>
            <input type="text" class="form-control" id="jenis_data" name="jenis_data" autocomplete="off" required placeholder="Masukkan jenis data">
          </div>
          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" rows="5" autocomplete="off" required placeholder="Masukkan jumlah penduduk">
          </div>
          <div class="mb-3">
            <label for="url_gambar" class="label-foto">Foto</label>
            <input type="file" name="url_gambar" id="image" required> 
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