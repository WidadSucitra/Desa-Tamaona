<?php
ob_start(); 
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 

if(isset($_POST['submit_delete'])){
  $pengaduan_id = $_POST['submit_delete'];

  $check_img_query = "SELECT * FROM pengaduan WHERE id=$pengaduan_id' LIMIT 1";
  $img_res = mysqli_query($conn,$query);
  $res_data = mysqli_fetch_array($img_res);

  $dokumentasi = $res_data['dokumentasi'];
  

  $query = "DELETE FROM pengaduan WHERE id='$pengaduan_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);

  if($query_run)
    {
      if(file_exists('../uploads/pengaduan/'.$dokumentasi)){
          unlink("../uploads/pengaduan/'.$dokumentasi");
      }
      move_uploaded_file($_FILES['dokumentasi']['tmp_name'], '../uploads/pengaduan/'.$update_filename);
     
        
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

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <section class="index-event">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Daftar Pengaduan</h1>

            <!-- <button class="btn-index-event"><a href="create.php">Tambah Event</a></button> -->

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Judul Pengaduan</th>
                  <th scope="col">Isi Pengaduan</th>
                  <th scope="col">Dokumentasi</th>
                  <th scope="col">Status</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM pengaduan ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['judul_pengaduan']; ?></td>
                  <td width=50%><?php echo $row['isi_pengaduan']; ?></td>
                  <td><img style="width: 120px;" src="../uploads/pengaduan/<?php echo $row['dokumentasi']; ?>"></td>
                  
                  <td>
                    <?php 
                    if($row['active']==0){
                      echo "<p id=str".$row['id'].">Disactive</p>";
                    } else{
                      echo "<p id=str".$row['id'].">Active</p>";
                    }
                    ?>
                  </td>
                  
                  <td>
                    <select onchange="active_disactive(this.value,<?php echo $row['id'];?>)">
                    <option value=""></option>
                      <option value="0">Disactive</option>
                      <option value="1">Active</option>
                    </select>
                  </td>
                  
                  <td class="btn-index">
                
                
                    <form method="POST">
                      <button class="ikon1" type="submit" name="submit_delete" value="<?= $row['id'] ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')">
                      <img class="ikon1"  src="../img/trash.png" alt="">
                      </button>
                    </form>
                  </td>
                </tr>
                <?php
                  $no++;
                }
                ?>

              </tbody>
              </table>

           


          </section>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
include('../includes/scripts.php');
include('../includes/footer.php');
?>