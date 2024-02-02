<?php

if (isset($_GET['id'])) { // check data dari form
    include "connection_220057.php"; // panggil connection.php mysql

    //
    $password = password_hash($_GET['type'], PASSWORD_DEFAULT);

    // sql query untuk update
    $query = "UPDATE user_220057 SET 
              password_220057 = '$password' 
              WHERE user_id_220057 = '$_GET[id]' " ;

    // run query
    $update = mysqli_query($db_connection, $query);

    if ($update) {
        // echo "<p>user added successfully !!</p>" ; // versi html
        echo "<script>alert('Reset password successfully'); </script>"; // versi JS
    } else {
        // echo "<p>user add failed !!<p>" ; // versi html
        echo "<script>alert('Reset password failed'); </script>" ; // versi JS
    }


}
?>

<!-- <p><a href="read.php">Back to user List</a><p> -->
<script>window.location.replace("userRead_220057.php")</script> 
<!-- pindah lokasi -->