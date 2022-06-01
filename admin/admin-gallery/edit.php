<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";

if (isset($_POST['submit'])){
    $galeri_id = $_POST['galeri_id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    $old_filename = $_POST['old_image'];
    $gambar = $_FILES['gambar']['name'];
    $update_filename = "";
    if($gambar!=NULL){
        // rename image
        $image_extension = pathinfo($gambar, PATHINFO_EXTENSION);
        $filename =time().'.'.$image_extension;
        $update_filename = $filename;
    } else{
        $update_filename= $old_filename;
    }


    $query = "UPDATE galeri_desa SET judul='$judul',deskripsi='$deskripsi',gambar='$update_filename'
                                    WHERE id='$galeri_id'" ;

	$query_run=mysqli_query($conn, $query);

    if($query_run)
    {
        if($gambar!=NULL){
            if(file_exists('../uploads/galeri/'.$old_filename)){
                unlink("../uploads/galeri/'.$old_filename");
            }
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/galeri/'.$update_filename);
        }


        // // $_SESSION['message'] = "Update berhasil!";
        header('Location: edit.php?id='.$galeri_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: edit.php?id='.$galeri_id);
        exit(0);
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-galeri">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Galeri</h1>
        <?php include "message.php";?>
        <?php
            if(isset($_GET['id'])){
                $galeri_id = $_GET['id'];
                $galeri_query = "SELECT * FROM galeri_desa WHERE id='$galeri_id' LIMIT 1";
                $galeri_query_res = mysqli_query($conn, $galeri_query);

                if(mysqli_num_rows($galeri_query_res)>0){
                   $galeri_row = mysqli_fetch_array($galeri_query_res) ;
                   ?>
                   <form method="post" enctype="multipart/form-data">
                       <input type="hidden" name="galeri_id" value="<?= $galeri_row['id']?>">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" required placeholder="Masukkan judul" value="<?= $galeri_row['judul']?>">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" rows="5" autocomplete="off" required placeholder="Masukkan deskripsi" value="<?= $galeri_row['deskripsi']?>">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="label-foto">Foto</label>
                        <input type="hidden" name="old_image" value="<?= $galeri_row['gambar']?>"/> 
                        <input type="file" name="gambar" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="Upload">Update</button>
                    </form>
                   <?php
                }
            }
        ?>
    </section>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php





include('../includes/scripts.php');
include('../includes/footer.php');
?>