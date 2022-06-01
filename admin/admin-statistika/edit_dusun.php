<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";

if (isset($_POST['submit'])){
    $penduduk_id = $_POST['penduduk_id'];
    $nama_dusun = $_POST['nama_dusun'];
    $jumlah_penduduk = $_POST['jumlah_penduduk'];
   
    $query = "UPDATE dusun_desa SET nama_dusun='$nama_dusun',jumlah_penduduk='$jumlah_penduduk'
                                    WHERE id='$penduduk_id'" ;

	$query_run=mysqli_query($conn, $query);

    if($query_run)
    {        
        // $_SESSION['message'] = "Update berhasil!";
        header('Location: edit_dusun.php?id='.$penduduk_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: edit_dusun.php?id='.$penduduk_id);
        exit(0);
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-potensi">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Dusun</h1>
        <?php include "message.php";?>
        <?php
            if(isset($_GET['id'])){
                $penduduk_id = $_GET['id'];
                $penduduk_query = "SELECT * FROM dusun_desa WHERE id='$penduduk_id' LIMIT 1";
                $penduduk_query_res = mysqli_query($conn, $penduduk_query);

                if(mysqli_num_rows($penduduk_query_res)>0){
                   $penduduk_row = mysqli_fetch_array($penduduk_query_res) ;
                   ?>
                   <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="penduduk_id" value="<?= $penduduk_row['id']?>">
                        <div class="mb-3">
                            <label for="nama_dusun" class="form-label">Nama Dusun</label>
                            <input type="text" class="form-control" id="nama_dusun" name="nama_dusun" autocomplete="off" required placeholder="Masukkan nama dusun" value="<?= $penduduk_row['nama_dusun']?>">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_penduduk" class="form-label">Jumlah Penduduk</label>
                            <input type="text" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk" rows="5" autocomplete="off" required placeholder="Masukkan Jumlah Penduduk" value="<?= $penduduk_row['jumlah_penduduk']?>">
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