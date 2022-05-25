<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";



if (isset($_POST['submit']) && isset($_FILES['gambar'])) {
  $jenis_komoditi = $_POST['jenis_komoditi'];
  $deskripsi = $_POST['deskripsi'];
  $gambar = $_FILES['gambar']['name'];
  $image_extension = pathinfo($gambar, PATHINFO_EXTENSION);
  $filename =time().'.'.$image_extension;

  $query = "INSERT INTO potensi_komoditi (jenis_komoditi,deskripsi,gambar) 
				        VALUES('$jenis_komoditi','$deskripsi','$filename')";

	$query_run=mysqli_query($conn, $query);

  if($query_run)
  {
      // Upload Image to uploads folder
      move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/potensi_komoditi/'.$filename);
      $_SESSION['message'] = "Data berhasil ditambahkan!";
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
    <section class="create-admin-event">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tambahkan Jenis Komoditi</h1>
        
        <!-- FORM -->
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="jenis_komoditi" class="form-label">Jenis Komoditi</label>
            <input type="text" class="form-control" id="jenis_komoditi" name="jenis_komoditi" autocomplete="off" placeholder="Masukkan jenis komoditi">
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" rows="5" autocomplete="off" placeholder="Masukkan deskripsi">
          </div>
          <div class="mb-3">
            <label for="gambar" class="label-foto">Gambar</label>
            <input type="file" name="gambar" id="image">
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