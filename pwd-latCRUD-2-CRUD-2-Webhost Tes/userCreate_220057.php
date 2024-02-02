<?php 
if (isset($_POST)) { // check data dari form
    include "connection_220057.php"; // panggil connection.php mysql

    // create default password
    $password = password_hash($_POST['usertype'], PASSWORD_DEFAULT);

    $query = "INSERT INTO user_220057 (username_220057, password_220057, usertype_220057, fullname_220057) VALUES ('$_POST[username]', '$password', '$_POST[usertype]' , '$_POST[fullname]')" ;

    // run query
    $create = mysqli_query($db_connection, $query);

    if ($create) {
        // echo "<p>user added successfully !!</p>" ; // versi html
        echo "<script>alert('user added successfully'); </script>"; // versi JS
    } else {
        // echo "<p>user add failed !!<p>" ; // versi html
        echo "<script>alert('user add failed'); </script>" ; // versi JS
    }


}
?>

<!-- <p><a href="read.php">Back to user List</a><p> -->
<script>window.location.replace("userRead_220057.php")</script> 
<!-- pindah lokasi -->
