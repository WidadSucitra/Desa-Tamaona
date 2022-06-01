<?php 
include "navbar.php"; 
include "admin/config.php";
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
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 mt-5">
                            <canvas id="cookieChart" width="250" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $.getJSON( "http://localhost/desa-tamaona/data.php", function( data ) {

                    var isi_labels = [];
                    var isi_data1=[];
                    var isi_data2=[];

                    $(data).each(function(i){         
                        isi_labels.push(data[i].pekerjaan); 
                        isi_data1.push(data[i].jumlah_laki2);
                        isi_data2.push(data[i].jumlah_perempuan);
                    });    
                    
                    // console.log(isi_labels);
                    // console.log(isi_data1);
                    // console.log(isi_data2);
                    
                    var canvasElement = document.getElementById("cookieChart").getContext('2d');
    
                    var myChart = new Chart(canvasElement,{
                        type: "bar",
                        data: {
                            labels: isi_labels,
                            datasets:[
                                {
                                    label: "Laki-Laki",
                                    data: isi_data1,
                                    backgroundColor: ["#609773"]
                                },
                                {
                                    label: "Perempuan",
                                    data: isi_data2,
                                    backgroundColor: ["yellow"]
                                },
                            ],
                        },
                    });
                });

            </script>

            <div class="daftar-dusun">
                <div class="container">
                    <?php
                    $query = "SELECT * FROM dusun_desa ORDER BY id ASC";
                    $result = mysqli_query($conn, $query);

                    if(!$result) {
                        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                    }
                    $no = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
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
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nama_dusun']; ?></td>
                                    <td><?php echo $row['jumlah_penduduk']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
      </section>
  </main>

  <?php 
include "footer.php"; 
?>