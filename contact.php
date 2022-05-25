<?php 
include "navbar.php"; 
include "admin/config.php";
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
                      <form action="">
                          <h2>Hubungi Kami</h2>
                          <input type="text" placeholder="Nama">
                          <input type="email" placeholder="Alamat Email">
                          <input type="text" placeholder="Perusahaan">
                          <input type="phone" placeholder="Telepone">
                          <textarea rows="10" placeholder="Pesan"></textarea>
                          <button>Kirim</button>
                      </form>
                  </div>

              </div>

          </div>

      </div>


  </section>

<?php 
include "footer.php"; 
?>