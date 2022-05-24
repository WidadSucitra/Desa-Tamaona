<?php
include "../config.php";
include "../includes/header.php"; 
include "../includes/navbar.php"; 

// $sql = "SELECT * FROM images ORDER BY id DESC";
//           $res = mysqli_query($conn,  $sql);

//           if (mysqli_num_rows($res) > 0) {
//           	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <!-- <div class="alb"> -->
             	<!-- <img src="uploads/<?=$images['image_url']?>"> -->
             <!-- </div> -->
          		
    <?php //} }

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
include('../includes/scripts.php');
include('../includes/footer.php');
?>