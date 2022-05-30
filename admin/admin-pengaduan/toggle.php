<?php 
    include "../config.php";
    $sql = "UPDATE pengaduan set active = '".$_POST['val']."' 
                            where id='".$_POST['id']."' ";
    $query = mysqli_query($conn,$sql);
    
    if($query){
        $sql1 = "SELECT * from pengaduan where id='".$_POST['id']."' ";
        $q=mysqli_query($conn,$sql1);
        $data = mysqli_fetch_assoc($query);
        echo $data['$active'];
    }
?>