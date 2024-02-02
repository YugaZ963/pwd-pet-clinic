<?php
session_start();
if(!isset($_SESSION['login'])) {
    echo "<script>alert('Please login first !');window.location.replace('form_login_220057.php');</script>";
}
if($_SESSION['user_type'] != 'manager') {
    echo "<script>alert('Access forbidden !');window.location.replace('index.php');</script>";
}
?>
<!DOCTYPE html>
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
                display: flex;
                flex-direction: column;
                /* padding-top: 30px; */
                /* position: relative;  */
                height: 10vh;
            }

            .content table{
                font-family: tahoma; 
                background-color: #efefef;
                justify-content: center;
                align-items: center;
                border-collapse: collapse;
                width: 100%;
            }

            .content th{
                font-family: tahoma; 
                background-color: #CFC5BC;
                justify-content: center;
            }
            .content td{
                justify-content: center;
            }

            .title-content{
                position: absolute;
                top: 400px
            }

            .monthly-report {
                display: flex;
                flex-direction: column;
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
        <h1>Monthly Report</h1>
        
        <?php 
        $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
        $year = date('Y');
        ?>
        <div class="monthly-report">
        <form>
            <p>Select
                <select name="month" required>
                    <option value="">Month</option>
                    <?php for($m=1;$m<=12;$m++) {?>
                    <option value="<?=$m?>"><?=$months[$m-1]?></option>
                    <?php } ?>
                </select>
                <select name="year" required>
                    <option value="">Year</option>
                    <?php for($y=0;$y<=2;$y++) {?>
                    <option value="<?=$year-$y?>"><?=$year-$y?></option>
                    <?php } ?>
                </select>
                    <input type="submit" value="View Report">
            </p>
        </form>
        <?php
        if(isset($_GET['year'])) { 
            include 'connection_220057.php';
            // $query="SELECT * FROM medicals_220057";
            $query="SELECT m.mr_date_220057, d.doctor_name_220057, p.pet_name_220057, p.pet_owner_220057, m.cost_220057 FROM medicals_220057 AS m, doctor_220057 AS d, pet_220057 AS p WHERE m.doctor_id_220057=d.doctor_id_220057 AND m.pet_id_220057=p.pet_id_220057 AND MONTH(m.mr_date_220057)='$_GET[month]' AND YEAR(m.mr_date_220057)='$_GET[year]'";
            $report=mysqli_query($db_connection,$query);
        ?>
        <h4>Report periode <?=$months[$_GET['month']-1]?> - <?=$_GET['year']?></h4>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Doctor</th>
                <th>Pet</th>
                <th>Owner</th>
                <th>Pay ($)</th>
            </tr>
            <?php
            if(mysqli_num_rows($report) > 0) {
                $i=1; $total=0;
                foreach($report as $data) :
                $total=$total+$data['cost_220057'];
            ?>
            <tr>
                <td align="center"><?=$i++?></td>
                <td align="center"><?=date('D, d M Y H:i:s' ,strtotime($data['mr_date_220057']));?></td>
                <td align="center"><?=$data['doctor_name_220057']?></td>
                <td align="center"><?=$data['pet_name_220057']?></td>
                <td align="center"><?=$data['pet_owner_220057']?></td>
                <td align="right"><?=$data['cost_220057']?></td>
            </tr>
            <?php endforeach; ?>
            <tr><th colspan="7" align="right">Total : $ <?=$total?></th></tr>
            <?php } else { ?>
            <tr><th colspan="7" align="center">No record !</th></tr>
            <?php } ?>
        </table>
        <?php } ?>
        </div>
        <div class="diagram-monthly-report">
            <!-- Diagram Monthly Report -->
            <img src="img/diagram-monthly-report.jpeg" alt="">
            <img src="img/diagram-monthly-report-2.png" alt="">
        </div>
        
        <!-- <p><a href="index.php">Back to Home</a></p> -->
        </div>
        
        <script></script>
    </body>
</html>
