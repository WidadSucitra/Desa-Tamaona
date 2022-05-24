<?php

include "../includes/header.php"; 
include "../includes/navbar.php"; 


// if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
// 	include "../config.php";

// 	echo "<pre>";
// 	print_r($_FILES['my_image']);
// 	echo "</pre>";

// 	$img_name = $_FILES['my_image']['name'];
// 	$img_size = $_FILES['my_image']['size'];
// 	$tmp_name = $_FILES['my_image']['tmp_name'];
// 	$error = $_FILES['my_image']['error'];

// 	if ($error === 0) {
// 		if ($img_size > 125000) {
// 			$em = "Sorry, your file is too large.";
// 		    header("Location: create.php?error=$em");
// 		}else {
// 			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
// 			$img_ex_lc = strtolower($img_ex);

// 			$allowed_exs = array("jpg", "jpeg", "png"); 

// 			if (in_array($img_ex_lc, $allowed_exs)) {
// 				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
// 				$img_upload_path = 'uploads/'.$new_img_name;
// 				move_uploaded_file($tmp_name, $img_upload_path);

// 				// Insert into Database
// 				$sql = "INSERT INTO potensi_desa (image_url) 
// 				        VALUES('$new_img_name')";
// 				mysqli_query($conn, $sql);
// 				header("Location: view.php");
// 			}else {
// 				$em = "You can't upload files of this type";
// 		        header("Location: create.php?error=$em");
// 			}
// 		}
// 	}else {
// 		$em = "unknown error occurred!";
// 		header("Location: create.php?error=$em");
// 	}

// }else {
// 	header("Location: create.php");
// }

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-potensi">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tambahkan Potensi</h1>
        
        <!-- FORM -->
        <form method="post" enctype="multipart/fotm-data">
          <div class="mb-3">
            <label for="jenis_potensi" class="form-label">Jenis Potensi</label>
            <input type="text" class="form-control" id="jenis_potensi" name="jenis_potensi" autocomplete="off" placeholder="Masukkan jenis potensi.">
          </div>
          <div class="mb-3">
            <label for="ket" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="ket" name="ket" rows="5" autocomplete="off" placeholder="Masukkan keterangan jenis potensi.">
          </div>
          <div class="mb-3">
            <label for="my_image" class="label-foto">Foto</label>
            <input type="file" name="my_image" id="image">
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