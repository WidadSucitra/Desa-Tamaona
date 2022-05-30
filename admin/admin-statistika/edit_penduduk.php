<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";

if (isset($_POST['submit'])){
    $penduduk_id = $_POST['penduduk_id'];
    $jenis_data = $_POST['jenis_data'];
    $jumlah = $_POST['jumlah'];
   
    $query = "UPDATE penduduk_desa SET jenis_data='$jenis_data',jumlah='$jumlah'
                                    WHERE id='$penduduk_id'" ;

	$query_run=mysqli_query($conn, $query);

    if($query_run)
    {        
        $_SESSION['message'] = "Update berhasil!";
        header('Location: edit_penduduk.php?id='.$penduduk_id);
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

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-potensi">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Penduduk Desa</h1>
        <?php include "message.php";?>
        <?php
            if(isset($_GET['id'])){
                $penduduk_id = $_GET['id'];
                $penduduk_query = "SELECT * FROM penduduk_desa WHERE id='$penduduk_id' LIMIT 1";
                $penduduk_query_res = mysqli_query($conn, $penduduk_query);

                if(mysqli_num_rows($penduduk_query_res)>0){
                   $penduduk_row = mysqli_fetch_array($penduduk_query_res) ;
                   ?>
                   <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="penduduk_id" value="<?= $penduduk_row['id']?>">
                        <div class="mb-3">
                            <label for="jenis_data" class="form-label">Jenis Data</label>
                            <input type="text" class="form-control" id="jenis_data" name="jenis_data" autocomplete="off" required placeholder="Masukkan data" value="<?= $penduduk_row['jenis_data']?>">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" rows="5" autocomplete="off" required placeholder="Masukkan jumlah data" value="<?= $penduduk_row['jumlah']?>">
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