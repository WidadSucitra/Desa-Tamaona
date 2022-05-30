<?php
ob_start(); 
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 

if(isset($_POST['submit_delete'])){
  $dashboard_id = $_POST['submit_delete'];

  $query = "DELETE FROM users WHERE id='$dashboard_id' LIMIT 1";
  $query_run = mysqli_query($conn,$query);


  if($query_run)
    {
      
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
            <h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>

            <button class="btn-index-event"><a href="create.php">Tambah Admin</a></button>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM users ORDER BY id ASC";
                  $result = mysqli_query($conn, $query);

                  if(!$result) {
                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
                  }
                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  
                  
                  
                  <td class="btn-index">
                  <!-- <a href="edit.php?id=<?= $row['id'] ?>"><button class="btn btn-warning">Edit</button></a> -->
                    <!--<a href="proses_hapus.php<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')"><button class="btn btn-danger">Hapus</button></a> -->
                    
                    <form method="POST">
                      <button type="submit" name="submit_delete" value="<?= $row['id'] ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')" class="btn btn-danger">Hapus</button>
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