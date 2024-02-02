<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        echo "<script>alert('Please Login First !');window.location.replace('form_login_220057.php');</script>";
    }
?>
<html>
    <head>
        <title>Pet Clinic Yuga</title>
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
                margin-top: 130px;
                /* padding-top: 30px; */
                /* position: relative;  */
                height: 10vh;
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
        <h1>Pet Clinic Yuga</h1><hr>
        <h3>Change Password</h3>
        <form method="post" action="update_password_220057.php">
            <table>
                <tr>
                    <td>New Password</td>
                    <td>: <input type="password" name="new_password" id="new" required /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; <input type="checkbox" onclick="show()">Show Password</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;
                        <input type="submit" name="change" value="CHANGE">
                        <input type="submit" name="reset" value="RESET">
                    </td>
                </tr>
            </table>
            <a href="index.php">Cancel</a>
        </form>
        </div>
        
        <script>
            function show() {
                var x = document.getElementById("new");
                if (x.type === "password") {
                    x.type = "text";
                }else {
                    x.type = "password";
                }
            }
        </script>
    </body>
</html>