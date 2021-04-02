<?php
$servername = "localhost";
$root = "root";
$password = "";
$dbname = "cinemazing";

$newconn = mysqli_connect($servername, $root, $password, $dbname);

if(isset($_POST['update-acc'])){

        // $ufirst_name $ulast_name $uusername $ubirthday $ugender $uemail $ucontact
    if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['username'])
        && isset($_POST['birthday']) && isset($_POST['gender']) && isset($_POST['email'])
        && isset($_POST['contact']) && isset($_POST['first_name']) && isset($_POST['last_name'])
        && isset($_POST['username']) && isset($_POST['birthday']) && isset($_POST['gender'])
        && isset($_POST['email']) && isset($_POST['contact'])){
        $ufirst_name = $_POST['first_name'];
    $ulast_name  = $_POST['last_name'];
    $uusername = $_POST['username'];
    $ubirthday  = $_POST['birthday'];
    $ugender = $_POST['gender'];
    $uemail  = $_POST['email'];
    $ucontact = $_POST['contact'];
    $ufirst_name = $_POST['first_name'];
    $ulast_name  = $_POST['last_name'];
    $uusername = $_POST['username'];
    $ubirthday  = $_POST['birthday'];
    $ugender = $_POST['gender'];
    $uemail  = $_POST['email'];
    $ucontact = $_POST['contact'];

    $selectquery = "SELECT * FROM user_account WHERE user_id = 1";
    $res = mysqli_query($newconn, $selectquery);

    if (mysqli_num_rows($res)===1){
        $row = mysqli_fetch_assoc($res);
        $updateacc = "UPDATE user_account SET first_name = '$ufirst_name', last_name = '$ulast_name', username = '$uusername', birthday = '$ubirthday', gender = '$ugender', email = '$uemail', contact = '$ucontact' WHERE user_id = 1";

        $res = mysqli_query($newconn, $updateacc);
        header("location:change_email.php");
    }
} 

if (isset($_POST['upassword']) && isset($_POST['unpassword']) && isset($_POST['ucnpassword'])){
    if ($_POST['unpassword'] === $_POST['ucnpassword']) {
            $upassword = $_POST['upassword']; //current password
            $unpassword = $_POST['unpassword']; //new password

            $validatepw = "SELECT * FROM user_account WHERE password = '$upassword' AND user_id = 1";

            $res = mysqli_query($newconn, $validatepw);

            if (mysqli_num_rows($res)===1){
                $row = mysqli_fetch_assoc($res);

                $updateacc = "UPDATE user_account SET password = '$unpassword' WHERE user_id = 1";

                $res = mysqli_query($newconn, $updateacc);
                header("location:change_email.php");
            }
        }
    }
}
?>