<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: home.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="register-email">
        <ul>
            <li style="font-size:1,8rem; font-weight:850;" class="tamaona-text">Desa Tamaona</li>
            <li style="font-size:1,8rem; font-weight:850;" class="home"><a href="welcome.php">Home</a></li>
            <li style="font-size:1,8rem; font-weight:850;" class="tamaona"><a href="logout.php">Log out</a></li>
            <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
        </ul>
    </div>

    
</body>
</html>