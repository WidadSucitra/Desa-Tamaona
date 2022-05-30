<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";

if (isset($_POST['submit'])){
    $profil_id = $_POST['profil_id'];
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


    $query = "UPDATE profil_desa SET judul='$judul',deskripsi='$deskripsi',gambar='$update_filename'
                                    WHERE id='$profil_id'" ;

	$query_run=mysqli_query($conn, $query);

    if($query_run)
    {
        if($gambar!=NULL){
            if(file_exists('../uploads/home/'.$old_filename)){
                unlink("../uploads/home/'.$old_filename");
            }
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/home/'.$update_filename);
        }


        $_SESSION['message'] = "Update berhasil!";
        header('Location: edit_profildesa.php?id='.$profil_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: edit_profildesa.php?id='.$profil_id);
        exit(0);
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-home">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Profil Desa</h1>
        <?php include "message.php";?>
        <?php
            if(isset($_GET['id'])){
                $profil_id = $_GET['id'];
                $profil_query = "SELECT * FROM profil_desa WHERE id='$profil_id' LIMIT 1";
                $profil_query_res = mysqli_query($conn, $profil_query);

                if(mysqli_num_rows($profil_query_res)>0){
                   $profil_row = mysqli_fetch_array($profil_query_res) ;
                   ?>
                   <form method="post" enctype="multipart/form-data">
                       <input type="hidden" name="profil_id" value="<?= $profil_row['id']?>">
                    <div class="mb-3">
                        <label for="judul" class="form-label">judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" required placeholder="Masukkan judul" value="<?= $profil_row['judul']?>">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" rows="5" autocomplete="off" required placeholder="Masukkan deskripsi" value="<?= $profil_row['deskripsi']?>">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="label-foto">Foto</label>
                        <input type="hidden" name="old_image" value="<?= $profil_row['gambar']?>"/> 
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