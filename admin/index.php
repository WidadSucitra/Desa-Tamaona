<?php
include "config.php";

session_start();

error_reporting(0);

if(isset($_SESSION['username'])) {
    header("Location: dashboard/index.php");
}

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST["password"]);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: dashboard/index.php");
	} else {
		echo "<script>alert('Woops! Email Atau Password anda Salah.')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>

    <link rel="stylesheet" href="style.css">
</head>
 
<body>
    <div class="container1">
        <form action="" method="POST" class="login-email">
        <ul>
            <li style="font-size:1,8rem; font-weight:850;" class="tamaona-text">Desa Tamaona</li>
            <li style="font-size:1,8rem; font-weight:850;" class="home"><a href="welcome.php">Home</a></li>
            
        </ul>

            <p style="font-size:2rem; font-weight:850;" class="login-text">LOGIN<span>.</span></p>

            <div class="input-group"><input type="email" placeholder="Email" name="email" value="<?php echo $email;?>"required></div>
            
            <div class="input-group"><input type="password" placeholder="Password" name="password" value="<?php echo $_POST['$password'];?>"required></div>
            
            <div class="input-group"><button name="submit" class="btn">Login</button></div>

            <p class="login-register-text">Already have an account ? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>

