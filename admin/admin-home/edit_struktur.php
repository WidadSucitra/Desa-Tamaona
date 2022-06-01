<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";

if (isset($_POST['submit'])){
    $struktur_id = $_POST['struktur_id'];

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


    $query = "UPDATE struktur SET gambar='$update_filename'
                                    WHERE id='$struktur_id'" ;

	$query_run=mysqli_query($conn, $query);

    if($query_run)
    {
        if($gambar!=NULL){
            if(file_exists('../uploads/home/'.$old_filename)){
                unlink("../uploads/home/'.$old_filename");
            }
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/home/'.$update_filename);
        }


        // $_SESSION['message'] = "Update berhasil!";
        header('Location: index.php?id='.$struktur_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: edit_struktur.php?id='.$struktur_id);
        exit(0);
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-home">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Struktur Pemerintahan</h1>
        <?php include "message.php";?>
        <?php
            if(isset($_GET['id'])){
                $struktur_id = $_GET['id'];
                $struktur_query = "SELECT * FROM struktur WHERE id='$struktur_id' LIMIT 1";
                $struktur_query_res = mysqli_query($conn, $struktur_query);

                if(mysqli_num_rows($struktur_query_res)>0){
                   $struktur_row = mysqli_fetch_array($struktur_query_res) ;
                   ?>
                   <form method="post" enctype="multipart/form-data">
                       <input type="hidden" name="struktur_id" value="<?= $struktur_row['id']?>">
                    <div class="mb-3">
                        <label for="gambar" class="label-foto">Foto</label>
                        <input type="hidden" name="old_image" value="<?= $struktur_row['gambar']?>"/> 
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