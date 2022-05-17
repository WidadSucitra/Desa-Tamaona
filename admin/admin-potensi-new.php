<?php
// include "config.php";
include('includes/header.php'); 
include('includes/navbar.php'); 

// $jenis_potensi = "";
// $ket = "";
// $sukses="";
// $error="";

// if(isset($_POST['simpan'])){
//   $jenis_potensi = $_POST['jenis_potensi'];
//   $ket = $_POST['ket'];

//   if($jenis_potensi&&$ket){
//     $sql1 = "insert into potensi_desa (jenis_potensi, ket) values ('$jenis_potensi','$ket')";
//     $q1 = mysqli_query($conn,$sql1);
//     if($q1){
//       $sukses = "Berhasil menambahkan data baru";
//     } else{
//       $error = "Gagal menambahkan data baru";
//     }
//   } else{
//     $error = "Silahkan masukkan semua data";
//   }
// }


?>

    <!-- Begin Page Content -->
    <section class="admin-potensi">

      <!-- MEMASUKKAN DATA -->
      <?php
    //   if($error){
        ?>
        <!-- <div class="alert alert-danger" role="alert">
          <?php echo $error ?>
        </div> -->
      
      <?php 
    //   }

    //   if($sukses){
        ?>
        <!-- <div class="alert alert-success" role="alert">
          <?php echo $sukses ?>
        </div> -->
      
      <?php 
    //   }
      
      ?>
      <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambahkan Potensi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
  
              <div class="modal-body">
                <div class="form-group">
                    <label for="jenis_potensi" > Jenis Potensi </label>
                    <input type="text" name="jenis_potensi" id="jenis_potensi" class="form-control" placeholder="Tambahkan Jenis Potensi">
                </div>
                <div class="form-group">
                    <label for="ket" > Keterangan </label>
                    <input type="text" name="ket" id="ket" class="form-control" placeholder="Tambahkan Jenis Potensi" >
                </div>
                <!-- <div class="form-group">
                    <label for="gambar" > Foto </label>
                    <input type="gambar" name="gambar" id="gambar" class="nobg" value="<?php echo $jenis_potensi ?>">
                </div>              -->
              </div>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="simpan" name="simpan" value= "Simpan Data" class="btn btn-primary">Save</button>
              </div>
            </form>
  
          </div>
        </div>
      </div>
  
      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Halaman Potensi 
            </h6>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Potensi 
            </button>
          </div>
  
          <div class="card-body">
  
            <div class="table-responsive">
  
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No. </th>
                    <th>Jenis Potensi </th>
                    <th>Keterangan </th>
                    <!-- <th>Foto</th> -->
                    <th>EDIT </th>
                    <th>DELETE </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    // $sql2 = "SELECT * from potensi_desa order by id desc";
                    // $q2 = mysqli_query($conn,$sql2);
                    // $urut =1;

                    // while ($r2 = mysqli_fetch_array($q2)) {
                    //   $id = $r2['id'];
                    //   $nim = $r2 ['jenis_potensi'];
                    //   $nama = $r2['ket']; 
                      ?>
                      
                      <tr>
                        <th scope="row" >1.</th>
                        <td scope="row">potensi manual</td>
                        <td scope="row">manual</td>
                        <!-- <td> *** </td> -->
                        <td>
                            <!-- <form action="" method="post"> -->
                            <!-- <form action="" >
                                <input type="hidden" name="edit_id" value=""> -->
                                <!-- <button  type="button" name="edit_btn" class="btn btn-success editbtn"> EDIT</button> -->
                            <!-- </form> -->
                          </a>
                        </td> 
                        <!-- <td>
                            <form action="" method="post">
                              <input type="hidden" name="delete_id" value="">
                              <button type="simpan" name="delete_btn" class="btn btn-danger"> DELETE</button>
                            </form>
                        </td> -->
                      </tr>                                        
                      <?php
                    // }
                  ?>                
                </tbody>
              </table>
  
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>