<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";

if (isset($_POST['submit'])){
    $wisata_id = $_POST['wisata_id'];
    $nama_wisata = $_POST['nama_wisata'];
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


    $query = "UPDATE potensi_wisata SET nama_wisata='$nama_wisata',deskripsi='$deskripsi',gambar='$update_filename'
                                    WHERE id='$wisata_id'" ;

	$query_run=mysqli_query($conn, $query);

    if($query_run)
    {
        if($gambar!=NULL){
            if(file_exists('../uploads/potensi_wisata/'.$old_filename)){
                unlink("../uploads/potensi_wisata/'.$old_filename");
            }
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/potensi_wisata/'.$update_filename);
        }


        // $_SESSION['message'] = "Update berhasil!";
        header('Location: edit.php?id='.$wisata_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: edit.php?id='.$wisata_id);
        exit(0);
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-potensi_wisata">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Potensi Wisata</h1>
        <?php include "message.php";?>
        <?php
            if(isset($_GET['id'])){
                $wisata_id = $_GET['id'];
                $potensi_wisata_query = "SELECT * FROM potensi_wisata WHERE id='$wisata_id' LIMIT 1";
                $potensi_wisata_query_res = mysqli_query($conn, $potensi_wisata_query);

                if(mysqli_num_rows($potensi_wisata_query_res)>0){
                   $potensi_wisata_row = mysqli_fetch_array($potensi_wisata_query_res) ;
                   ?>
                   <form method="post" enctype="multipart/form-data">
                       <input type="hidden" name="wisata_id" value="<?= $potensi_wisata_row['id']?>">
                    <div class="mb-3">
                        <label for="nama_wisata" class="form-label">nama_wisata</label>
                        <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" autocomplete="off" required placeholder="Masukkan nama wisata" value="<?= $potensi_wisata_row['nama_wisata']?>">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" rows="5" autocomplete="off" required placeholder="Masukkan deskripsi" value="<?= $potensi_wisata_row['deskripsi']?>">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="label-foto">Foto</label>
                        <input type="hidden" name="old_image" value="<?= $potensi_wisata_row['gambar']?>"/> 
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