<?php 
include "navbar.php"; 
include "admin/config.php";
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
          <form action="">

            <table class="tbl-laporan">

                <tr>
                    <td class="title">Judul Pengaduan : </td>
                    <td>
                        <input type="text" name="title" placeholder="Masukkan Judul Pengaduan">
                    </td>
                </tr>

                <tr>
                    <td class="title">Waktu : </td>
                    <td>
                        <input type="date" name="tanggal">
                    </td>
                </tr>

                <tr>
                    <td class="title">Isi Pengaduan : </td>
                    <td>
                        <textarea name="isi-pengaduan" cols="30" rows="10" placeholder="Masukkan Isi Pengaduan"></textarea>
                    </td>
                </tr>

                <tr>
                    <td class="title">Dokumentasi : </td>
                    <td>
                        <input class="nobg" type="file" name="foto">
                    </td>
                </tr>

            </table>
          </form>

          <button class="kirim">Kirim</button>

        </div>

      </div>

  </section>




  <?php 
include "footer.php"; 
?>