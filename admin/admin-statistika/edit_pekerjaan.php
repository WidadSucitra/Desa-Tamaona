<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";

if (isset($_POST['submit'])){
    $penduduk_id = $_POST['penduduk_id'];
    $pekerjaan = $_POST['pekerjaan'];
    $jumlah_laki2 = $_POST['jumlah_laki2'];
    $jumlah_perempuan = $_POST['jumlah_perempuan'];
   
    $query = "UPDATE pekerjaan SET pekerjaan='$pekerjaan',jumlah_laki2='$jumlah_laki2',jumlah_perempuan='$jumlah_perempuan'
                                    WHERE id='$penduduk_id'" ;

	$query_run=mysqli_query($conn, $query);

    if($query_run)
    {        
        // $_SESSION['message'] = "Update berhasil!";
        header('Location: edit_pekerjaan.php?id='.$penduduk_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header('Location: edit_pekerjaan.php?id='.$penduduk_id);
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
                $penduduk_query = "SELECT * FROM pekerjaan WHERE id='$penduduk_id' LIMIT 1";
                $penduduk_query_res = mysqli_query($conn, $penduduk_query);

                if(mysqli_num_rows($penduduk_query_res)>0){
                   $penduduk_row = mysqli_fetch_array($penduduk_query_res) ;
                   ?>
                   <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="penduduk_id" value="<?= $penduduk_row['id']?>">
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" autocomplete="off" required placeholder="Masukkan nama pekerjaan" value="<?= $penduduk_row['pekerjaan']?>">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_laki2" class="form-label">Jumlah Laki-Laki</label>
                            <input type="text" class="form-control" id="jumlah_laki2" name="jumlah_laki2" rows="5" autocomplete="off" required placeholder="Masukkan jumlah laki-laki" value="<?= $penduduk_row['jumlah_laki2']?>">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_perempuan" class="form-label">Jumlah Perempuan</label>
                            <input type="text" class="form-control" id="jumlah_perempuan" name="jumlah_perempuan" rows="5" autocomplete="off" required placeholder="Masukkan jumlah perempuan" value="<?= $penduduk_row['jumlah_perempuan']?>">
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