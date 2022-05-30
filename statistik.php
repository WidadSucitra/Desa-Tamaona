<?php 
include "navbar.php"; 
include "admin/config.php";
$pekerjaan = mysqli_query($conn, "SELECT * FROM pekerjaan order by ID asc");
$jumlah_laki2 = mysqli_query($conn, "SELECT jumlah_laki2 FROM pekerjaan order by ID asc");
$jumlah_perempuan = mysqli_query($conn, "SELECT jumlah_perempuan FROM pekerjaan order by ID asc");
?>


<!-- jumbotron -->
  <section class="d-flex align-items-center">
    <div class="jumbotron-potensi jumbotron">
      <h1 class="container">Statistika Penduduk</h1>
    </div>
  </section>

  <main>
      <section class="statistik">
            <div class="statistik-penduduk">
                <div class="row justify-content-center">

                        <div class="col-md-3">
                            <div class="nilai">
                                <div class="row">
                                    <h5>Statistik Penduduk Pria</h5>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <img src="assets/img/statistik/pria.png" alt="">
                                    </div>
                                    <div class="col">
                                        <p>76</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="nilai">
                                <div class="row">
                                    <h5>Statistik Penduduk Wanita</h5>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <img src="assets/img/statistik/wanita.png" alt="">
                                    </div>
                                    <div class="col">
                                        <p>76</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="nilai">
                                <div class="row">
                                    <h5>Statistik Penduduk</h5>
                                </div>
                                <div class="row justify-content-center">
                                        <div class="col">
                                            <img src="assets/img/statistik/orang.png" alt="">
                                        </div>
                                        <div class="col">
                                            <p>76</p>
                                        </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>

            <div class="status-perkawinan">
                <div class="container">
                    <div class="row">
                        <h3>Statistik Pekerjaan Penduduk</h3>
                        <p><?php while ($p = mysqli_fetch_array($pekerjaan)) { echo '"' . $p['pekerjaan'] . '",';}?></p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 mt-5">
                            <canvas id="cookieChart" width="250" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                var canvasElement = document.getElementById("cookieChart");
  
                var config = {
                    type: "bar",
                    data:{
                        labels: [<?php while ($p = mysqli_fetch_array($pekerjaan)) { echo '"'.$p['pekerjaan'].'",';}?>],
                        datasets:[ 
                            {
                                label: "Laki-Laki",
                                data: [<?php while ($p = mysqli_fetch_array($jumlah_laki2)) { echo '"' .$p['jumlah_laki2']. '",';}?>],
                                backgroundColor: "#609773"
                            },
                            {
                                label: "Perempuan",
                                data: [<?php while ($p = mysqli_fetch_array($jumlah_perempuan)) { echo '"' . $p['jumlah_perempuan'] . '",';}?>],
                                backgroundColor: "yellow"
                            },
                        ],
                    },
                };

                var cookieChart = new Chart(canvasElement,conn);
            </script>

            <!-- <div class="status-pendidikan">
                <div class="container">
                    <div class="row">
                        <h3>Statistik Pendidikan Penduduk</h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 mt-5">
                        <canvas id="cookieChart2" width="250" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="daftar-dusun">
                <div class="container">
                    <div class="row">
                        <h3>Daftar Dusun</h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <table>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Dusun</th>
                                    <th>Jumlah Penduduk</th>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>Dusun Galong Lohe</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Dusun Galong Lohe</td>
                                    <td>35</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Dusun Galong Lohe</td>
                                    <td>33</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
      </section>
  </main>

  <?php 
include "footer.php"; 
?>