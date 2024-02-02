<?php 
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login_220057.php') ; </script>";
    }
?>
<html>
    <head>
    <title>Pet Clinic</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .header {
            display: flex;
            position: fixed;
            left: 0;
            top: 0;
            height: 45px;
            width: 100%;
            background-color: #5976b8;
            color: #333;
            padding: 10px;
            display: flex;
            align-items: center;
            right: 0;
            z-index: 9999;
            }
            

            .logo {
            margin-right: -5px; /* Atur margin agar logo dan judul tidak saling menumpuk */
            }

            .logo img {
            max-width: 100%;
            height: auto;
            }

            .header .logo-txt a{
            margin: 0; /* Hapus margin default dari h1 */
            font-size: 40px;
            text-decoration: none;
            color: #121212;
            }

            .header a {
                margin-left: 900px;
            }

            
            .navbar {
                position: fixed;
                top: 60px;
                left: 0;
                width: 100%;
                background: #121212;
                display: flex;
                align-items: center;
                /* justify-content: space-between; */
                padding: 10px 0px;
                color: white;
                height: 30px;
                z-index: 9999;
            }
            
            .navbar h3 {
                font-size: 25px;
                margin-left: 25px;
                
            }
            .navbar ul {
                display: flex;
                gap: 1rem;
            }

            .navbar ul li {
                list-style: none;
            }

            .navbar a {
                text-decoration: none; 
                color: white;
                margin-right: 10px;
                justify-content: space-between;
                margin-left: 200px;
                transition: 0.3s ease;
            }

            .navbar a:hover {
                background-color: azure;
                color: black;
                border-radius: 4px;
                padding: 2px;
            }
            
            .content {
                margin-top: 130px;
                /* padding-top: 30px; */
                /* position: relative;  */
                display: flex;
                margin-left: 250px;
                height: 10vh;
            }

            .content a{
                color: black;
                transition: 0.3s ease;
            }

            .content a:hover {
                background-color: #5976b8;
                border-radius: 4px;
                padding: 2px;
            }

            .title-content{
                position: absolute;
                top: 400px
            }
    </style>
    </head>
    <body>
    <header class="header">
        <div class="logo">
        <img src="img/logo-petclinic.png" alt="logo" height="100" width="100">
        </div>
        <h1 class="logo-txt"><a href="index.php">Pet Clinic</a></h1>
        <!-- <a id="account-button" href="">Account</a> -->

        

        </header>

        <div>
            <nav class="navbar">
                <h3>Home</h3>
                <a href="petRead_220057.php">Pet List</a></li>
                <a href="doctorRead_220057.php">Doctor List</a></li>
                <?php if ($_SESSION['user_type'] == "manager") : ?>
                <a href="userRead_220057.php">User List</a></li>
                <a href="report.php"> Monthly Report </a></li>
                <?php endif; ?>
                
            </nav>
        </div>
        <div class="content">
            <div class="edit-animal">
            <h1>Pet Clinic</h1>
    <h3>Form Edit Pet</h3>
    <?php 
    // panggil koneksi
        include "connection_220057.php" ;

        // query database
        $query = "SELECT * FROM pet_220057 WHERE pet_id_220057 = '$_GET[id]'";
        // eksekusi query
        $pet = mysqli_query($db_connection, $query);
        
        $data = mysqli_fetch_assoc($pet) ;
    ?>
        <form method="post" action="petUpdate.php">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?php echo $data['pet_name_220057'] ?>" required></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>
                        <select name="type" id="type" >
                            <option value="">- Choose -</option>
                            <option value="cat" <?php echo ($data['pet_type_220057'] == 'cat') ? 'selected' : '' ;?>>Cat</option>
                            <option value="dog" <?php echo ($data['pet_type_220057'] == 'dog') ? 'selected' : '' ;?>>Dog</option>
                            <option value="reptil" <?php echo ($data['pet_type_220057'] == 'reptil') ? 'selected' : '' ;?>>Reptil</option>
                            <option value="bird" <?php echo ($data['pet_type_220057'] == 'bird') ? 'selected' : '' ;?>>Bird</option>
                            <option value="rodent" <?php echo ($data['pet_type_220057'] == 'rodent') ? 'selected' : '' ;?>>Rodent</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="radio" name="gender" value="male" <?php echo ($data['pet_gender_220057'] == 'male') ? 'checked' : '' ;?>> Male | 
                        <input type="radio" name="gender" value="female" <?php echo ($data['pet_gender_220057'] == 'female') ? 'checked' : '' ;?>> Female
                    </td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td><input type="number" name="age" value="<?php echo $data['pet_age_220057'] ?>"></td>
                </tr>
                <tr>
                    <td>Food</td>
                <td>
                        <input type="radio" name="food" value="<?php echo ($data['pet_food_220057'] == 'dry') ? 'checked' : '' ; ?>"> Dry |
                        <input type="radio" name="food" value="<?php echo ($data['pet_food_220057'] == 'wet') ? 'checked' : '' ; ?>"> Wet
                </td>
                </tr>
                <tr>
                    <td>Owner</td>
                    <td><input type="text" name="owner" value="<?php echo $data['pet_owner_220057'] ?>"></td>
                </tr>
                <tr>
                    <td>Adress</td>
                    <td><textarea name="address" id="" cols="30" rows="10"><?php echo $data['pet_address_220057'] ?></textarea></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value="<?php echo $data['pet_phone_220057'] ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="save"value="SAVE"></td>
                    <td><input type="reset" value="RESET"></td>
                    <td><input type="hidden" name="pet_id_220057" value="<?php echo $data['pet_id_220057'] ?>"></td>
                </tr>
            </table>
        </form>
            </div>
        
            <div class="image-animal">
                <img src="img/bird-3-bg.png" alt="">
            </div>
        <!-- <p><a href="petRead_220057.php">CANCEL</a></p> -->
        </div>
    
    </body>
</html>