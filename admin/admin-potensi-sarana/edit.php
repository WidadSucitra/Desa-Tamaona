<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";

if (isset($_POST['submit'])){
    $fasilitas_id = $_POST['fasilitas_id'];
    $fasilitas = $_POST['fasilitas'];
    $ket = $_POST['ket'];

    $old_filename = $_POST['old_image'];
    $image_url = $_FILES['image_url']['name'];
    $update_filename = "";
    if($image_url!=NULL){
        // rename image
        $image_extension = pathinfo($image_url, PATHINFO_EXTENSION);
        $filename =time().'.'.$image_extension;
        $update_filename = $filename;
    } else{
        $update_filename= $old_filename;
    }
    

    $query = "UPDATE fasilitas_desa SET fasilitas='$fasilitas',ket='$ket',image_url='$update_filename'
                                    WHERE id='$fasilitas_id'" ;

	$query_run=mysqli_query($conn, $query);

    if($query_run)
    {
        if($image_url!=NULL){
            if(file_exists('../uploads/fasilitas/'.$old_filename)){
                unlink("../uploads/fasilitas/'.$old_filename");
            }
            move_uploaded_file($_FILES['image_url']['tmp_name'], '../uploads/fasilitas/'.$update_filename);
        }
      
        
        // $_SESSION['message'] = "Update berhasil!";
        header('Location: index.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: edit.php?id='.$fasilitas_id);
        exit(0);
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-potensi">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Fasilitas Desa</h1>
        <?php include "message.php";?>
        <?php
            if(isset($_GET['id'])){
                $fasilitas_id = $_GET['id'];
                $fasilitas_query = "SELECT * FROM fasilitas_desa WHERE id='$fasilitas_id' LIMIT 1";
                $fasilitas_query_res = mysqli_query($conn, $fasilitas_query);

                if(mysqli_num_rows($fasilitas_query_res)>0){
                   $fasilitas_row = mysqli_fetch_array($fasilitas_query_res) ;
                   ?>
                   <form method="post" enctype="multipart/form-data">
                       <input type="hidden" name="fasilitas_id" value="<?= $fasilitas_row['id']?>">
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <input type="text" class="form-control" id="fasilitas" name="fasilitas" autocomplete="off" required placeholder="Masukkan jenis potensi." value="<?= $fasilitas_row['fasilitas']?>">
                    </div>
                    <div class="mb-3">
                        <label for="ket" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="ket" name="ket" rows="5" autocomplete="off" required placeholder="Masukkan keterangan jenis potensi." value="<?= $fasilitas_row['ket']?>">
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="label-foto">Foto</label>
                        <input type="hidden" name="old_image" value="<?= $fasilitas_row['image_url']?>"/> 
                        <input type="file" name="image_url" id="image">
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