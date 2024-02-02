<?php
session_start();
if (isset($_POST['change'])) { // check data dari form
    include "connection_220057.php"; // panggil connection.php mysql

    //
    $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // sql query untuk update
    $query = "UPDATE user_220057 SET 
              password_220057 = '$password' 
              WHERE user_id_220057 = '$_SESSION[userid]' " ;

    // run query
    $update = mysqli_query($db_connection, $query);

    if ($update) {
        $_SESSION['password'] = $password;
        // echo "<p>change added successfully !!</p>" ; // versi html
        echo "<script>alert('Change password successfully'); window.location.replace('index.php')</script>"; // versi JS
    } else {
        // echo "<p>change add failed !!<p>" ; // versi html
        echo "<script>alert('Change password failed'); window.location.replace('change_password_220057.php')</script>" ; // versi JS
    }


}
?>

<!-- <p><a href="read.php">Back to user List</a><p> --> 
<!-- pindah lokasi -->