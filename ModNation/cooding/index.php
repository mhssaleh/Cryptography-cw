<?php

$connect = mysqli_connect("localhost", "root", "", "modnation", 3306);


    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit_form1"])) {
        $uname = $_POST["uname"];
        $passw = $_POST["passw"];
        $email = $_POST["email"];

        $stmt = mysqli_prepare($connect, "INSERT INTO userdata_register (uname, passw, email) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $uname, $passw, $email);

        if(mysqli_stmt_execute($stmt)){
            echo "Data inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute the statement. " . mysqli_error($connect);
        }

        mysqli_stmt_close($stmt);
        header("Location: home.html");
        exit();
    }
    else if (isset($_POST["submit_form2"])) {
        $username = $_POST["usrname"];
        $password = $_POST["psw"];
      
        
        $query = "SELECT * FROM userdata_register WHERE uname='$username' AND passw='$password'";
        
        
        $result = mysqli_query($connect, $query);

        
        if (mysqli_num_rows($result) == 1) {
          header("Location: home.html");
          exit();
        } else {
          echo "Invalid Password or Username";
      }
      }
    }



mysqli_close($connect);

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login & Registration</title>
   <!-- Link to CSS -->
    <link rel="stylesheet" href="index.css"
</head>

<body>



    <div class="wrapper">
        
       <!-- Login Page -->
        <div class="form-box login">
            <h2>Login</h2>

            <form  method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="accessibility-outline"></ion-icon>
                    </span>
                    <input type="username" name="usrname" required>
                    <label>Username</label>
                </div>
                
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name="psw" required>
                    <label>Password</label>
                </div>
               
                <button type="submit" class="btn" name="submit_form2">Login </button>
                
                <div class="login-register">
                    <p>Don't Have An Account?<a href="#" class="register-link">Register Now!</a></p>
                </div>

            </form>
        </div>

        <!-- Refister Form -->
        <div class="form-box register">
            <h2>Registration</h2>
            <form  method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="accessibility-outline"></ion-icon>
                    </span>
                    <input type="text" name="uname" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name="passw" required>
                    <label>Password</label>
                </div>
                <div class="remeber-forgot">
                    <label><input type="checkbox">I Agree To The Terms & Conditions</label>
                </div>
               
                <button type="submit" class="btn" name="submit_form1">Register</button>
                
                <div class="login-register">
                    <p>Already Have An Account?<a href="#" class="login-link">Login</a></p>
                </div>

            </form>
        </div>
    </div>






    <script src="java.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 
</body>

</html>