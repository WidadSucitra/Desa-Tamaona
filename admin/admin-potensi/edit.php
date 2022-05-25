<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";

if (isset($_POST['submit'])){
    $potensi_id = $_POST['potensi_id'];
    $jenis_potensi = $_POST['jenis_potensi'];
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
    

    $query = "UPDATE potensi_desa SET jenis_potensi='$jenis_potensi',ket='$ket',image_url='$update_filename'
                                    WHERE id='$potensi_id'" ;

	$query_run=mysqli_query($conn, $query);

    if($query_run)
    {
        if($image_url!=NULL){
            if(file_exists('../uploads/jenis_potensi/'.$old_filename)){
                unlink("../uploads/jenis_potensi/'.$old_filename");
            }
            move_uploaded_file($_FILES['image_url']['tmp_name'], '../uploads/jenis_potensi/'.$update_filename);
        }
      
        
        $_SESSION['message'] = "Update berhasil!";
        header('Location: edit.php?id='.$potensi_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: edit.php?id='.$potensi_id);
        exit(0);
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-potensi">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Potensi</h1>
        <?php include "message.php";?>
        <?php
            if(isset($_GET['id'])){
                $potensi_id = $_GET['id'];
                $potensi_query = "SELECT * FROM potensi_desa WHERE id='$potensi_id' LIMIT 1";
                $potensi_query_res = mysqli_query($conn, $potensi_query);

                if(mysqli_num_rows($potensi_query_res)>0){
                   $potensi_row = mysqli_fetch_array($potensi_query_res) ;
                   ?>
                   <form method="post" enctype="multipart/form-data">
                       <input type="hidden" name="potensi_id" value="<?= $potensi_row['id']?>">
                    <div class="mb-3">
                        <label for="jenis_potensi" class="form-label">Jenis Potensi</label>
                        <input type="text" class="form-control" id="jenis_potensi" name="jenis_potensi" autocomplete="off" required placeholder="Masukkan jenis potensi." value="<?= $potensi_row['jenis_potensi']?>">
                    </div>
                    <div class="mb-3">
                        <label for="ket" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="ket" name="ket" rows="5" autocomplete="off" required placeholder="Masukkan keterangan jenis potensi." value="<?= $potensi_row['ket']?>">
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="label-foto">Foto</label>
                        <input type="hidden" name="old_image" value="<?= $potensi_row['image_url']?>"/> 
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