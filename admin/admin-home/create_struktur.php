<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";


if (isset($_POST['submit']) && isset($_FILES['gambar'])) {
  $gambar = $_FILES['gambar']['name'];
  $image_extension = pathinfo($gambar, PATHINFO_EXTENSION);
  $filename =time().'.'.$image_extension;

  $query = "INSERT INTO struktur (gambar) 
				        VALUES('$filename')";

	$query_run=mysqli_query($conn, $query);

  if($query_run)
  {
      // Upload Image to uploads folder
      move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/home/'.$filename);
      
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
    <section class="create-admin-home">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tambahkan Data</h1>
        <?php include "message.php";?>
        <!-- FORM -->
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="gambar" class="label-foto">Foto</label>
            <input type="file" name="gambar" id="image" required> 
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