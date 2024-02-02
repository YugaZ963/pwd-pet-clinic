<?php

// echo $_POST['nama'] . "<br>";
// echo $_POST['type'] . "<br>";
// echo $_POST['gender'] . "<br>";
// echo $_POST['age'] . "<br>";
// echo $_POST['owner'] . "<br>";
// echo $_POST['adress'] . "<br>";
// echo $_POST['phone'] . "<br>";

if (isset($_POST)) { // check data dari form
    include "connection_220057.php"; // panggil connection.php mysql

    $query = "INSERT INTO pet_220057 (pet_name_220057, pet_type_220057, pet_gender_220057, pet_age_220057, pet_food_220057, pet_owner_220057, pet_address_220057, pet_phone_220057 ) VALUES ('$_POST[nama]', '$_POST[type]', '$_POST[gender]' , '$_POST[age]', '$_POST[food]', '$_POST[owner]', '$_POST[address]', '$_POST[phone]')" ;

    // run query
    $create = mysqli_query($db_connection, $query);

    if ($create) {
        // echo "<p>Pet added successfully !!</p>" ; // versi html
        echo "<script>alert('Pet added successfully'); </script>"; // versi JS
    } else {
        // echo "<p>Pet add failed !!<p>" ; // versi html
        echo "<script>alert('Pet add failed'); </script>" ; // versi JS
    }


}
?>

<!-- <p><a href="read.php">Back to Pet List</a><p> -->
<script>window.location.replace("petRead_220057.php")</script> 
<!-- pindah lokasi -->