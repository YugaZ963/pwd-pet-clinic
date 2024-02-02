<?php
if(isset($_POST['save'])){
    include "connection_220057.php";
    $folder = 'uploads/doctors/';
    if(empty($_FILES['new_photo']['name'])){
    $query = "UPDATE doctor_220057 SET
    doctor_name_220057 = '$_POST[doctor_name_220057]',
    doctor_gender_220057 = '$_POST[doctor_gender_220057]',
    doctor_address_220057 = '$_POST[doctor_address_220057]',
    doctor_phone_220057 = '$_POST[doctor_phone_220057]'
    WHERE doctor_id_220057 = '$_POST[doctor_id_220057]'
    ";
    $upload = mysqli_query($db_connection, $query);
    if($upload){
        echo "<script>alert('Update Doctor Successed');window.location.replace('doctorRead_220057.php');</script>";
    } else {
        echo "<script>alert('Update Doctor Failed');window.location.replace('edit_doctor_220057.php?id=$_POST[doctor_id_220057]');</script>";
    }
}
}
    if(move_uploaded_file($_FILES['new_photo']['tmp_name'],$folder . $_FILES['new_photo']['name'] )){
        $photo=$_FILES['new_photo']['name'];
    $query = "UPDATE doctor_220057 set
    doctor_name_220057 = '$_POST[doctor_name_220057]',
    doctor_gender_220057 = '$_POST[doctor_gender_220057]',
    doctor_address_220057 = '$_POST[doctor_address_220057]',
    doctor_phone_220057 = '$_POST[doctor_phone_220057]',
    doctor_photo_220057 = '$photo'
    WHERE doctor_id_220057 = '$_POST[doctor_id_220057]'
    ";
    $upload = mysqli_query($db_connection, $query);
    if($upload){
        if($_POST['doctor_photo_220057'] !== 'default.png') unlink($folder . $_POST['doctor_photo_220057']);
        echo "<script>alert('Update Doctor Successed');window.location.replace('doctorRead_220057.php');</script>";
    } else {
        echo "<script>alert('Update Doctor Failed');window.location.replace('edit_doctor_220057.php?id=$_POST[doctor_id_220057]');</script>";
    }
} else {
    echo "<script>alert('Upload Photo Failed');window.location.replace('edit_doctor_220057.php?id=$_POST[doctor_id_220057]');</script>";
}

?>