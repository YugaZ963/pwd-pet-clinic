<?php

// echo $_POST['nama'] . "<br>";
// echo $_POST['type'] . "<br>";
// echo $_POST['gender'] . "<br>";
// echo $_POST['age'] . "<br>";
// echo $_POST['owner'] . "<br>";
// echo $_POST['adress'] . "<br>";
// echo $_POST['phone'] . "<br>";

if (isset($_POST['save'])) { // check data dari form
    include "connection_220057.php"; // panggil connection.php mysql

    // sql query untuk update
    $query = "UPDATE user_220057 SET 
              username_220057 = '$_POST[username]', 
              password_220057 = '$_POST[password]', 
              usertype_220057 = '$_POST[usertype]', 
              fullname_220057 = '$_POST[fullname]' 
              WHERE user_id_220057 = '$_POST[user_id_220057]'; " ;

    // run query
    $update = mysqli_query($db_connection, $query);

    if ($update) {
        // echo "<p>user added successfully !!</p>" ; // versi html
        echo "<script>alert('user updated successfully'); </script>"; // versi JS
    } else {
        // echo "<p>user add failed !!<p>" ; // versi html
        echo "<script>alert('user update failed'); </script>" ; // versi JS
    }


}
?>

<!-- <p><a href="read.php">Back to user List</a><p> -->
<script>window.location.replace("userRead_220057.php")</script> 
<!-- pindah lokasi -->