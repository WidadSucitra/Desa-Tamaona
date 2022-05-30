<?php 
ob_start();
include "navbar.php"; 
include "admin/config.php";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $perusahaan = $_POST['perusahaan'];
    $telepone = $_POST['telepone'];
    $pesan = $_POST['pesan'];
  
    $query = "INSERT INTO hubungi_kami (nama,email,perusahaan,telepone,pesan) 
                          VALUES('$nama','$email','$perusahaan','$telepone','$pesan')";
  
      $query_run=mysqli_query($conn, $query);
  
    if($query_run)
    {
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
      <h1 class="container">Hubungi Kami</h1>
    </div>
  </section>

  <!-- ======= Isi Website ======= -->
  <section class="hubungi-kami">
      <div class="container">

          <div class="card-container">
              <div class="left">
                  <div class="left-container">
                      <h2>Tentang Kami</h2>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe dolores tenetur iure quisquam, repellat molestias laboriosam. Molestiae nesciunt veniam animi natus illum nobis, tenetur dicta tempore? Officiis vero consequuntur delectus.</p>
                  </div>
                  
              </div>
              <div class="right">
                  <div class="right-container">
                      <form method="post" enctype="multipart/form-data">
                          <h2>Hubungi Kami</h2>
                          <input type="text" id="nama" name="nama" placeholder="Nama">
                          <input type="email" id="email" name="email" placeholder="Alamat Email">
                          <input type="text" id="perusahaan" name="perusahaan" placeholder="Perusahaan">
                          <input type="text" id="telepone" name="telepone" placeholder="Telepone">
                          <textarea rows="10" id="pesan" name="pesan" placeholder="Pesan"></textarea>
                          <button type="submit" name="submit" onclick="return alert('Pengaduan telah masuk!')" value="Upload"><a href="contact.php">Kirim</a></button>
                      </form>
                  </div>

              </div>

          </div>

      </div>


  </section>

<?php 
include "footer.php";

?>