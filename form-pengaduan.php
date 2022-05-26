<?php 
ob_start();
include "navbar.php"; 
include "admin/config.php";

if (isset($_POST['submit']) && isset($_FILES['dokumentasi'])) {
  $judul_pengaduan = $_POST['judul_pengaduan'];
  $isi_pengaduan = $_POST['isi_pengaduan'];
  $dokumentasi = $_FILES['dokumentasi']['name'];
  $image_extension = pathinfo($dokumentasi, PATHINFO_EXTENSION);
  $filename =time().'.'.$image_extension;

  $query = "INSERT INTO pengaduan (judul_pengaduan,isi_pengaduan,dokumentasi) 
                        VALUES('$judul_pengaduan','$isi_pengaduan','$filename')";

    $query_run=mysqli_query($conn, $query);

  if($query_run)
  {
      // Upload Image to uploads folder
      move_uploaded_file($_FILES['dokumentasi']['tmp_name'], 'admin/uploads/pengaduan/'.$filename);
      // $_SESSION['message'] = "Data berhasil ditambahkan!";
      header('Location: index.php');
      exit(0);
  }
  else
  {
      $_SESSION['message'] = "Something went wrong";
      header('Location: index.php');
      exit(0);
  }
}
?>

  <!-- jumbotron -->
  <section class="d-flex align-items-center">
    <div class="jumbotron-potensi jumbotron">
      <h1 class="container">Form Pengaduan</h1>
    </div>
  </section>


  <!-- ======= Isi Website ======= -->
  <section class="laporan">
      <div class="container">

        <div class="card-container">
          <form method="post" enctype="multipart/form-data">

            <table class="tbl-laporan">

                <tr>
                    <td for="judul_pengaduan" class="title">Judul Pengaduan : </td>
                    <td>
                        <input type="text" id="judul_pengaduan" name="judul_pengaduan" placeholder="Masukkan Judul Pengaduan">
                    </td>
                </tr>

                <tr>
                    <td for="isi_pengaduan" class="title">Isi Pengaduan : </td>
                    <td>
                        <textarea id="isi_pengaduan" name="isi_pengaduan" cols="30" rows="10" placeholder="Masukkan Isi Pengaduan"></textarea>
                    </td>
                </tr>

                <tr>
                    <td for="dokumentasi" class="title">Dokumentasi : </td>
                    <td>
                        <input class="nobg" type="file" id="dokumentasi" name="dokumentasi">
                    </td>
                </tr>

            </table>
            <button type="submit" name="submit" value="Upload" class="kirim">Kirim</button>
          </form>

          

        </div>

      </div>

  </section>




  <?php 
include "footer.php"; 
?>