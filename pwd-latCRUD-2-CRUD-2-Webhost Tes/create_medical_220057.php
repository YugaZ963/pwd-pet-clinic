<?php
if (isset($_POST)) { // check data dari form
    include "connection_220057.php"; // panggil connection.php mysql

    $query = "INSERT INTO medicals_220057 SET 
    pet_id_220057 = '$_POST[pet_id]', 
    doctor_id_220057 = '$_POST[doctor_id]',
    symptom_220057 = '$_POST[symptom]',
    diagnose_220057 = '$_POST[diagnose]', 
    treatment_220057 = '$_POST[treatment]', 
    cost_220057 = '$_POST[cost]'" ;

    // run query
    $create = mysqli_query($db_connection, $query);

    if ($create) {
        // echo "<p>Pet added successfully !!</p>" ; // versi html
        echo "<script>alert('Medical added successfully'); </script>"; // versi JS
    } else {
        // echo "<p>Pet add failed !!<p>" ; // versi html
        echo "<script>alert('Medical add failed'); </script>" ; // versi JS
    }


}
?>

<!-- <p><a href="read.php">Back to Pet List</a><p> -->
<script>window.location.replace("petRead_220057.php")</script> 
<!-- pindah lokasi -->