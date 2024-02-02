<?php 
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login_220057.php') ; </script>";
    }

    if ($_SESSION['user_type'] != 'manager') {
        echo "<script>alert('Access Forbidden'); window.location.replace('index.php') ; </script>";
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
                    <div class="edit-user" style="margin-top: 100px;">
                    <h1>Pet Clinic</h1>
    <h3>Form Edit user</h3>
    <?php 
    // panggil koneksi
        include "connection_220057.php" ;

        // query database
        $query = "SELECT * FROM user_220057 WHERE user_id_220057 = '$_GET[id]'";
        // eksekusi query
        $user = mysqli_query($db_connection, $query);
        
        $data = mysqli_fetch_assoc($user) ;
    ?>
        <form method="post" action="userUpdate.php">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $data['username_220057'] ?>" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value="<?php echo $data['password_220057'] ?>"></td>
                </tr>
                <tr>
                    <td>User Type</td>
                    <td>
                        <input type="radio" name="usertype" value="staff" <?php echo ($data['usertype_220057'] == 'staff') ? 'checked' : '' ;?>> Staff | 
                        <input type="radio" name="usertype" value="manager" <?php echo ($data['usertype_220057'] == 'manager') ? 'checked' : '' ;?>> Manager
                    </td>
                </tr>
                <tr>
                    <td>Fullname</td>
                    <td><input type="text" name="fullname" value="<?php echo $data['fullname_220057'] ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="save"value="SAVE"></td>
                    <td><input type="reset" value="RESET"></td>
                    <td><input type="hidden" name="user_id_220057" value="<?php echo $data['user_id_220057'] ?>"></td>
                </tr>
            </table>
        </form>
            </div>

            <div class="image-user">
                <img src="img/male-admin-bg.png" alt="">
            </div>
        </div>
    
        <!-- <p><a href="userRead_220057.php">CANCEL</a></p> -->
    </body>
</html>