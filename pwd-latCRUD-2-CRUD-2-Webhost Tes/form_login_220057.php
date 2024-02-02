<html>
    <head>
        <title>Pet Clinic Yuga</title>
        <link rel="stylesheet" href="css/styles.css">
        <style>
            * {
                box-sizing: border-box;

            }
            html,
            body,
            .wrapper{
                height: 100%;
            }

            body {
                display: grid;
                place-items: center;
                margin: 0;
                padding: 0 24px;
                background-image: url(img/background-form-login.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                color: rgb(0,0,0);
                /* animation: rotate 6s infinite alternate;  */
                font-family: Arial, Helvetica, sans-serif;
            }

            .login-card {
                position: relative;
                z-index: 3;
                width: 100%;
                margin: 0 20px;
                padding: 70px 30px 44px;
                border-radius: 1.25rem;
                background: white;
                text-align: center;

            }

            .login-card h1 {
                font-size: 36px;
                font-weight: 600;
                margin: 0 0 12px;
            }

            .login-card h3 {
                color: rgb(198, 198, 198);
                margin: 0 0 30px;
                font-weight: 500;
                font-size: 1rem;
            }

            .login-form {
                width: 100%;
                margin: 0;
                display: grid;
                gap: 16px;
            }

            .login-form input,
            .login-form button {
                width: 100%;
                height: 50%;
            }

            .login-form input {
                height: 25px;
                border: 2px solid #ebebeb;
                font-family: inherit;
                font-size: 20px;
                padding: 0 25px;
                border-radius: 14px;
                transition: all 0.375s;
            }

            .login-form input:hover {
                border: 2px solid #03cb89;
            }

            .login-form button {
                cursor: pointer;
                width: 100%;
                padding: 16px;
                border-radius: 25px;
                background-color: #03cb89;
                color: white;
                border: 0;
                font-family: inherit;
                font-size: 1rem;
                font-weight: 600;
                text-align: center;
                letter-spacing: 2px;
                transition: all 0.3s;
            }

            .login-form button:hover {
                background: #019e6a;
            }

            @media (width >= 500px){
                body {
                    .login-card {
                        margin: 0;
                        width: 400px;
                    }
                    .login-form input {
                        height: 25px;

                    }

                }
            }

        </style>
    </head>

    <body>
        <div class="login-card">
        <h1>Pet Clinic Yuga</h1><hr>
        <h3>Login Page</h3>
        <form class="login-form" method="post" action="login_220057.php">

        <input type="text" name="username" placeholder="Username" required>
        
        <input type="password" name="password" placeholder="Password" id="pass" required>&nbsp;
        
        Show Password
        <input type="checkbox" onclick="show()"><hr>

        <input type="submit" name="login" value="LOGIN">
        <input type="submit" name="reset" value="RESET">

        </form>
        </div>
        <script>
            function show() {
                var x = document.getElementById("pass");
                if (x.type === "password") {
                    x.type = "text";
                }else {
                    x.type = "password";
                }
            }
        </script>
    </body>
</html>