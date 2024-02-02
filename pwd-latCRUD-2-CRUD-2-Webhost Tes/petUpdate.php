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
    $query = "UPDATE pet_220057 SET 
              pet_name_220057 = '$_POST[nama]', 
              pet_type_220057 = '$_POST[type]', 
              pet_gender_220057 = '$_POST[gender]', 
              pet_age_220057 = '$_POST[age]', 
              pet_owner_220057 = '$_POST[owner]', 
              pet_address_220057 = '$_POST[address]', 
              pet_phone_220057 = '$_POST[phone]' WHERE pet_id_220057 = '$_POST[pet_id_220057]'; " ;

    // run query
    $update = mysqli_query($db_connection, $query);

    if ($update) {
        // echo "<p>Pet added successfully !!</p>" ; // versi html
        echo "<script>alert('Pet updated successfully'); </script>"; // versi JS
    } else {
        // echo "<p>Pet add failed !!<p>" ; // versi html
        echo "<script>alert('Pet update failed'); </script>" ; // versi JS
    }


}
?>

<!-- <p><a href="read.php">Back to Pet List</a><p> -->
<script>window.location.replace("petRead_220057.php")</script> 
<!-- pindah lokasi -->