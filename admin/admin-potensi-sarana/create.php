<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";


if (isset($_POST['submit']) && isset($_FILES['image_url'])) {
  $fasilitas = $_POST['fasilitas'];
  $ket = $_POST['ket'];
  $image_url = $_FILES['image_url']['name'];
  $image_extension = pathinfo($image_url, PATHINFO_EXTENSION);
  $filename =time().'.'.$image_extension;

  $query = "INSERT INTO fasilitas_desa (fasilitas,ket,image_url) 
				        VALUES('$fasilitas','$ket','$filename')";

	$query_run=mysqli_query($conn, $query);

  if($query_run)
  {
      // Upload Image to uploads folder
      move_uploaded_file($_FILES['image_url']['tmp_name'], '../uploads/fasilitas/'.$filename);
      
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
        <h1 class="h3 mb-4 text-gray-800">Tambahkan Fasilitas</h1>
        <?php include "message.php";?>
        <!-- FORM -->
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="fasilitas" class="form-label">Jenis Fasilitas</label>
            <input type="text" class="form-control" id="fasilitas" name="fasilitas" autocomplete="off" required placeholder="Masukkan fasilitas.">
          </div>
          <div class="mb-3">
            <label for="ket" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="ket" name="ket" rows="5" autocomplete="off" required placeholder="Masukkan keterangan fasilitas.">
          </div>
          <div class="mb-3">
            <label for="image_url" class="label-foto">Foto</label>
            <input type="file" name="image_url" id="image" required> 
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