<html>
    <head>
        <title>Add Medical Record</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
    <h1>Pet Clinic Yuga</h1><hr>
        <H3>Form Add Medical</H3>

        <?php 
        include "connection_220057.php";
        $queryPet = "SELECT * FROM pet_220057 WHERE pet_id_220057 = '$_GET[pet_id]'";

        // run query
        $pet = mysqli_query($db_connection,$queryPet);

        // extract data from query result
        $data1 = mysqli_fetch_assoc($pet);

        $queryDoc = "SELECT * FROM doctor_220057 ";
        $doctors = mysqli_query($db_connection,$queryDoc);

        ?>

<table>
            <tr>
                <td>Pet ID/Name</td>
                <td>: <?=$data1['pet_id_220057']?>/<?=$data1['pet_name_220057']?> </td>
            </tr>
            <tr>
                <td>Pet Type/Gender/Age</td>
                <td>: <?=$data1['pet_type_220057']?>/ <?=$data1['pet_gender_220057']?> / <?=$data1['pet_age_220057']?> </td>
            </tr>
            <tr>
                <td>Owner</td>
                <td>: <?=$data1['pet_owner_220057']?> / <?=$data1['pet_address_220057']?> / <?=$data1['pet_phone_220057']?> </td>
            </tr>
        </table><hr>

        <form method="post" action="create_medical_220057.php">
            <table>
                <tr>
                    <td>Doctor</td>
                    <td>
                        <select name="doctor_id" required>
                            <option value="">Choose</option>
                            <?php foreach($doctors as $data2) : ?>
                            <option value="<?=$data2['doctor_id_220057'] ?>"><?=$data2['doctor_name_220057'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Symptom</td>
                    <td><textarea name="symptom" id="" cols="30" rows="10" required></textarea></td>
                </tr>
                <tr>
                    <td>Diagnose</td>
                    <td><textarea name="diagnose" id="" cols="30" rows="10" required></textarea></td>
                </tr>
                <tr>
                    <td>Treatment</td>
                    <td><textarea name="treatment" id="" cols="30" rows="10" required></textarea></td>
                </tr>
                <tr>
                    <td>Cost (Rp)</td>
                    <td><input type="number" name="cost" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="save" value="SAVE">
                        <input type="reset" name="reset" value="RESET">
                        <input type="hidden" name="pet_id" value="<?=$data1['pet_id_220057'] ?>">
                    </td>
                </tr>
            </table>
        </form>
        <p><a href="medicals_220057.php?pet_id=<?=$data1['pet_id_220057'] ?>">CANCEL</a></p>
    </body>
</html>
<table>
            