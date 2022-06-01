<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";

if (isset($_POST['submit'])){
    $penduduk_id = $_POST['penduduk_id'];
    $jenis_data = $_POST['jenis_data'];
    $jumlah = $_POST['jumlah'];

    $old_filename = $_POST['old_image'];
    $url_gambar = $_FILES['url_gambar']['name'];
    $update_filename = "";
    if($url_gambar!=NULL){
        // rename image
        $image_extension = pathinfo($url_gambar, PATHINFO_EXTENSION);
        $filename =time().'.'.$image_extension;
        $update_filename = $filename;
    } else{
        $update_filename= $old_filename;
    }
    
    $query = "UPDATE penduduk SET jenis_data='$jenis_data',jumlah='$jumlah',url_gambar='$update_filename'
                                    WHERE id='$penduduk_id'" ;

	$query_run=mysqli_query($conn, $query);

    if($query_run)
    {
        if($url_gambar!=NULL){
            if(file_exists('../uploads/statistik/'.$old_filename)){
                unlink("../uploads/statistik/'.$old_filename");
            }
            move_uploaded_file($_FILES['url_gambar']['tmp_name'], '../uploads/statistik/'.$update_filename);
        }
              
        // $_SESSION['message'] = "Update berhasil!";
        header('Location: index.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: edit_penduduk.php?id='.$penduduk_id);
        exit(0);
    }
}

?>

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-potensi">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Penduduk Desa</h1>
        <?php include "message.php";?>
        <?php
            if(isset($_GET['id'])){
                $penduduk_id = $_GET['id'];
                $penduduk_query = "SELECT * FROM penduduk WHERE id='$penduduk_id' LIMIT 1";
                $penduduk_query_res = mysqli_query($conn, $penduduk_query);

                if(mysqli_num_rows($penduduk_query_res)>0){
                   $penduduk_row = mysqli_fetch_array($penduduk_query_res) ;
                   ?>
                   <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="penduduk_id" value="<?= $penduduk_row['id']?>">
                        <div class="mb-3">
                            <label for="jenis_data" class="form-label">Jenis Data</label>
                            <input type="text" class="form-control" id="jenis_data" name="jenis_data" autocomplete="off" required placeholder="Masukkan jenis data" value="<?= $penduduk_row['jenis_data']?>">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" rows="5" autocomplete="off" required placeholder="Masukkan jumlah data" value="<?= $penduduk_row['jumlah']?>">
                        </div>
                        <div class="mb-3">
                            <label for="url_gambar" class="label-foto">Foto</label>
                            <input type="hidden" name="old_image" value="<?= $penduduk_row['url_gambar']?>"/> 
                            <input type="file" name="url_gambar" id="image">
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