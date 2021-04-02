<?php
if(isset($_POST['login'])){
    if(!empty($_POST['username']) && !empty($_POST['apassword'])) {
        $username = $_POST['username'];
        $apassword = $_POST['apassword'];

        //Create Connection
        $servername = "localhost";
        $root = "root";
        $password = "";
        $dbname = "cinemazing";

        $newconn = mysqli_connect($servername, $root, $password, $dbname);

        $validatepw = "SELECT * FROM admin_account WHERE admin_username = '$username' AND admin_password = '$apassword'";

        $res = mysqli_query($newconn, $validatepw);

        if (mysqli_num_rows($res)===1){
            $row = mysqli_fetch_assoc($res);
            if ($row['admin_username'] == $username && $row['admin_password'] == $apassword){
                session_start();
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['admin_username'] = $row['admin_username'];
                header("location: index.php");
            }
        } else {
            $error_message = "The Username or Password does not exist.";
                // header("Location: login.php?error=$error_message");
            echo "<script>if(confirm('Incorrect admin credentials, please try again.')){document.location.href='login.php'}
            ;</script>";
        }

        if(isset($_POST['remember-me'])){
            setcookie("username",$username,time()+3600*24*365);
            setcookie("password",$password,time()+3600*24*365);
        }else{
            setcookie("username", $username, 30);
            setcookie("password", $password, 30);
        }
    }
}

$username_cookie = '';
$password_cookie = '';
$checked = '';
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $username_cookie = $_COOKIE['username'];
    $password_cookie = $_COOKIE['password'];
    $checked = "checked='checked'";
}

?>