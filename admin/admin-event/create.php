<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";



if (isset($_POST['submit']) && isset($_FILES['gambar'])) {
  $Judul = $_POST['judul'];
  $Deskripsi = $_POST['deskripsi'];
  $Gambar = $_FILES['gambar']['name'];
  $image_extension = pathinfo($Gambar, PATHINFO_EXTENSION);
  $filename =time().'.'.$image_extension;

  $query = "INSERT INTO daftar (Judul,Deskripsi,Gambar) 
				        VALUES('$Judul','$Deskripsi','$filename')";

	$query_run=mysqli_query($conn, $query);

  if($query_run)
  {
      // Upload Image to uploads folder
      move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/event/'.$filename);
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
        <h1 class="h3 mb-4 text-gray-800">Tambahkan Event</h1>
        
        <!-- FORM -->
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" placeholder="Masukkan judul event">
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" rows="5" autocomplete="off" placeholder="Masukkan deskripsi event">
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