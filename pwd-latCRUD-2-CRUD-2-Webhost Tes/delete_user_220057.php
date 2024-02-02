<?php
    //echo $_POST['pet_name_220063'] . "<br>";
    //echo $_POST['pet_type_220063'] . "<br>";
    //echo $_POST['pet_gender_220063'] . "<br>";
    //echo $_POST['pet_age_220063'] . "<br>";
    //echo $_POST['pet_owner_220063'] . "<br>";
    //echo $_POST['pet_address_220063'] . "<br>";
    //echo $_POST['pet_phone_220063'] . "<br>";

if (isset($_GET['id'])) { // check variable GET from URL
    include "connection_220057.php"; //call conncection php mysql

    //sql query DELETE FROM WHERE 
    $query = "DELETE FROM user_220057 WHERE user_id_220057 = '$_GET[id]'";

    // run query
     $delete= mysqli_query($db_connection, $query);

     if($delete) { // check if query TRUE/succes
        // echo "<p>user delete successfully !</p>"; // versi html
        echo "<script> alert ('user deleted successfully !'); </script>"; // versi javascript
     }  else {
        //echo "<p>user delete failed !</p>"; //versi html
        echo "<script> alert ('user deleted failed!'); </script>"; // versi javascript
     }

    }   
?>
<!-- <p><a href="read_user_220057.php">BACK TO userS LIST</p> -->
<script>window.location.replace("userRead_220057.php"); </script>