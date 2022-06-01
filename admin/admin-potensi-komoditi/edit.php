<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";

if (isset($_POST['submit'])){
    $komoditi_id = $_POST['komoditi_id'];
    $jenis_komoditi = $_POST['jenis_komoditi'];
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
    

    $query = "UPDATE potensi_komoditi SET jenis_komoditi='$jenis_komoditi',deskripsi='$deskripsi',gambar='$update_filename'
                                    WHERE id='$komoditi_id'" ;

	$query_run=mysqli_query($conn, $query);

    if($query_run)
    {
        if($gambar!=NULL){
            if(file_exists('../uploads/potensi_komoditi/'.$old_filename)){
                unlink("../uploads/potensi_komoditi/'.$old_filename");
            }
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/potensi_komoditi/'.$update_filename);
        }
      
        
        // $_SESSION['message'] = "Update berhasil!";
        header('Location: index.php?id='.$komoditi_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: edit.php?id='.$komoditi_id);
        exit(0);
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-potensi">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Jenis Potensi</h1>
        <?php include "message.php";?>
        <?php
            if(isset($_GET['id'])){
                $komoditi_id = $_GET['id'];
                $event_query = "SELECT * FROM potensi_komoditi WHERE id='$komoditi_id' LIMIT 1";
                $event_query_res = mysqli_query($conn, $event_query);

                if(mysqli_num_rows($event_query_res)>0){
                   $event_row = mysqli_fetch_array($event_query_res) ;
                   ?>
                   <form method="post" enctype="multipart/form-data">
                       <input type="hidden" name="komoditi_id" value="<?= $event_row['id']?>">
                    <div class="mb-3">
                        <label for="jenis_komoditi" class="form-label">jenis_komoditi</label>
                        <input type="text" class="form-control" id="jenis_komoditi" name="jenis_komoditi" autocomplete="off" required placeholder="Masukkan jenis_komoditi event." value="<?= $event_row['jenis_komoditi']?>">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" rows="5" autocomplete="off" required placeholder="Masukkan deskripsi event" value="<?= $event_row['deskripsi']?>">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="label-foto">gambar</label>
                        <input type="hidden" name="old_image" value="<?= $event_row['gambar']?>"/> 
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