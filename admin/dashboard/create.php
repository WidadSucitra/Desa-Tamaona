<?php
ob_start(); 
include "../includes/header.php"; 
include "../includes/navbar.php"; 
include "../config.php";



if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $_cppassword = md5($_POST["cppassword"]);

  if($password == $_cppassword){
    $sql="SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO users (username, email, password)
                VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Wow! User Registration Completed.')</script>";
            $username = "";
            $email = "";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    } else {
        echo "<script>alert('Woops! Email Already Exists.')</script>";
    }

} else {
    echo "<script>alert('Password Not Matched.')</script>";
}

//   $query = "INSERT INTO users (username,email,password) 
// 				        VALUES('$username','$email','$password')";

// 	$query_run=mysqli_query($conn, $query);

}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="create-admin-event">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tambahkan Admin</h1>
        
        <!-- FORM -->
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="username" class="form-label">username</label>
            <input type="text" class="form-control" id="username" name="username" autocomplete="off" placeholder="Masukkan username">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control" id="email" name="email" rows="5" autocomplete="off" placeholder="Masukkan email">
          </div>
          <div class="mb-3">
            <label for="password" class="label-foto">password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
          </div>
          <div class="mb-3">
            <label for="cppassword" class="label-foto">confirm password</label>
            <input type="password" name="cppassword" placeholder="Konfirmasi password" required>
          </div>

          <button type="submit" class="btn btn-primary" name="submit" value="Upload">Submit</button>
        </form>
    </section>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php





include('../includes/scripts.php');
include('../includes/footer.php');
?>