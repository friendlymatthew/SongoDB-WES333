<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded"/>
  <link rel="stylesheet" href="php-styles.css" type="text/css" />


<title>SongoDB PHP Form</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "music-db";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error){
            die("Connection failed: ". $conn->connect_error);
        }
        $reg_value = "";
        $ret_value = "";
        
        // creating new account and passwords
        if(isset($_REQUEST["register"])){
            $s_username = $_REQUEST["username"];
            $s_password = $_REQUEST["password"];

            if(!empty($s_username) && !empty($s_password)){
                $user_check = mysqli_query($conn, "SELECT * FROM users WHERE username='$s_username'");
                $reg_value = "";
                if (mysqli_num_rows($user_check) == 0) {
                    $uppercase_check = preg_match('@[A-Z]@', $s_password);
                    $lowercase_check = preg_match('@[a-z]@', $s_password);
                    $number_check    = preg_match('@[0-9]@', $s_password);
                    $special_check = preg_match('@[^\w]@', $s_password);
                    if ($uppercase_check != 1 || $lowercase_check != 1|| $number_check != 1 || $special_check  != 1|| strlen($s_password) < 8) {
                        $reg_value = "your password is required to be at least 8 characters and have an uppercase, lowercase, and special character, as well as at least one number";
                    } else {
                        $sql_query = "INSERT INTO users(username, password) VALUES ('$s_username', '$s_password')";
                        $res = mysqli_query($conn, $sql_query);
                        $reg_value = "Registered $s_username";
                    }

                } else { $reg_value = "Username $s_username has already been taken, please try again.";}

            } else {
                $missing_fields = "";
                if (!empty($s_username)) {
                    $missing_field = $missing_fields . "username ";
                }
                if (!empty($s_password)) {
                    $missing_field = $missing_fields . ", " . "password ";
                }
                $reg_value = "Fields $missing_fields empty, please try again";
            }
        }

        // generating songs by username
        if(isset($_REQUEST["retrieve"])){
            $s_username = $_REQUEST["username"];
            
            if(!empty($s_username)) {
                $user_check = mysqli_query($conn, "SELECT * FROM users WHERE username='$s_username'");
                if (mysqli_num_rows($user_check) != 0) {
                    $ratings_check = mysqli_query($conn, "SELECT * FROM ratings WHERE username='$s_username'");
                    if (mysqli_num_rows($ratings_check) != 0) {
                        $sql_query = "SELECT * FROM ratings WHERE username = ('$s_username')";
                        $res = mysqli_query($conn, $sql_query);
                    } else { $ret_value = "User $s_username does not have any song ratings available, sorry.";}

                    while ($row = mysqli_fetch_assoc($res)){
                        $ret_value = $ret_value . "$row[song] -> $row[rating] ";
                    }
                } else { $ret_value = "User $s_username does not exist, please try again.";}
            }
            else { 
                $ret_value = "username field empty, please try again";
            }
        }
        $conn->close();
    ?>

    <!-- form for creating new account -->
    <div class="scaffold">
        <form method="GET" action="" class="card">
            <div class="form-title"> Register New Account </div>

            <div class="form-scaffold">
                <div class="form">

                    <div class="form-field-title">
                        Username:
                    </div>   
                    
                    <input type="text" name="username"  placeholder="Username" /> 
                </div>
            
                <div class="form">
                    <div class="form-field-title">
                        Password:
                    </div>  
                
                    <input type="password" name="password" placeholder="Password" />
                </div>
            </div>

                <div class="scaffold">
                    <input type="submit" name="register" class="form-submit" value="Register" />
                </div>
                <p class="form-status"><?php
                    echo $reg_value;
                ?></p>

        </form>
    </div>

    <!-- form for getting user's songs -->
    <div class="scaffold">
        <form method="GET" action="" class="card">   
            <div class="form-title">
                Retrieve Song By Username
            </div>

            <div class="form-scaffold">
                <div class="form">
                    <div class="form-field-title">
                        Username:
                    </div>   

                    <input type="text" name="username" placeholder="Username" />
                    </div>
    
                </div>

                <div class="scaffold">
                    <input type="submit" name="retrieve" value="Submit" class="form-submit"/>
                </div>

                <p class="form-status"><?php 
                    if(!empty($ret_value)){
                        echo $ret_value;
                    }
                ?></p>
        </form>
    </div>

</body>
</html>
