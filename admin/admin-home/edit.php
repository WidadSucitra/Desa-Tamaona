<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";

if (isset($_POST['submit'])){
    $home_id = $_POST['home_id'];
    $Judul = $_POST['Judul'];
    $Deskripsi = $_POST['Deskripsi'];

    $old_filename = $_POST['old_image'];
    $Gambar = $_FILES['Gambar']['name'];
    $update_filename = "";
    if($Gambar!=NULL){
        // rename image
        $image_extension = pathinfo($Gambar, PATHINFO_EXTENSION);
        $filename =time().'.'.$image_extension;
        $update_filename = $filename;
    } else{
        $update_filename= $old_filename;
    }


    $query = "UPDATE adminhome SET Judul='$Judul',Deskripsi='$Deskripsi',Gambar='$update_filename'
                                    WHERE id='$home_id'" ;

	$query_run=mysqli_query($conn, $query);

    if($query_run)
    {
        if($Gambar!=NULL){
            if(file_exists('../uploads/home/'.$old_filename)){
                unlink("../uploads/home/'.$old_filename");
            }
            move_uploaded_file($_FILES['Gambar']['tmp_name'], '../uploads/home/'.$update_filename);
        }


        $_SESSION['message'] = "Update berhasil!";
        header('Location: edit.php?id='.$home_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: edit.php?id='.$home_id);
        exit(0);
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-home">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Home</h1>
        <?php include "message.php";?>
        <?php
            if(isset($_GET['id'])){
                $home_id = $_GET['id'];
                $home_query = "SELECT * FROM adminhome WHERE id='$home_id' LIMIT 1";
                $home_query_res = mysqli_query($conn, $home_query);

                if(mysqli_num_rows($home_query_res)>0){
                   $home_row = mysqli_fetch_array($home_query_res) ;
                   ?>
                   <form method="post" enctype="multipart/form-data">
                       <input type="hidden" name="home_id" value="<?= $home_row['id']?>">
                    <div class="mb-3">
                        <label for="Judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="Judul" name="Judul" autocomplete="off" required placeholder="Masukkan judul" value="<?= $home_row['Judul']?>">
                    </div>
                    <div class="mb-3">
                        <label for="Deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="Deskripsi" name="Deskripsi" rows="5" autocomplete="off" required placeholder="Masukkan deskripsi" value="<?= $home_row['Deskripsi']?>">
                    </div>
                    <div class="mb-3">
                        <label for="Gambar" class="label-foto">Foto</label>
                        <input type="hidden" name="old_image" value="<?= $home_row['Gambar']?>"/> 
                        <input type="file" name="Gambar" id="image">
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