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
            }

            
            .content {
                /* padding-top: 30px; */
                /* position: relative;  */
                height: 10vh;
                max-width: 300px;
                display: flex;
                margin-left: 250px;
                /* margin: auto; */
                margin-top: 130px;
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
            <div class="add-user">
            <h1>Pet Clinic</h1>
    <h3>Add User</h3>
        <form method="post" action="userCreate_220057.php">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <!-- <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr> -->
                <tr>
                    <td>User Type</td>
                    <td>
                        <input type="radio" name="usertype" value="staff"> Staff | 
                        <input type="radio" name="usertype" value="manager"> Manager
                    </td>
                </tr>
                <tr>
                    <td>Fullname</td>
                    <td><input type="text" name="fullname"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="SAVE"></td>
                    <td><input type="reset" value="RESET"></td>
                </tr>
            </table>
        </form>
            </div>
        
            <div class="image-admin">
                <img src="img/female-admin-bg.png" alt="">
            </div>
        <!-- <p><a href="userRead_220057.php">CANCEL</a></p> -->
        </div>
    
    </body>
</html>