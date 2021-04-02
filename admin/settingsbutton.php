<?php
if(isset($_POST['save-profile']) && isset($_FILES['profile'])){
    $aid = $_SESSION['admin_id'];
    $ausername = $_SESSION['admin_username'];

    $profile_name = $_FILES['profile']['name'];
    $profile_size = $_FILES['profile']['size'];
    $tmp_name = $_FILES['profile']['tmp_name'];
    $error = $_FILES['profile']['error'];

    if($error === 0){
        if($profile_size > 1250000) {
            echo '<h1 align="center">Sorry, the image is too large.</h1>';
        }else{
            $img_extension = pathinfo($profile_name, PATHINFO_EXTENSION);
            $img_extension_lowercase = strtolower($img_extension);

            $allowed_extension = array("jpg", "jpeg", "png", );

            if(in_array($img_extension_lowercase, $allowed_extension)){
                $new_image_name = uniqid("IMG-",true).'.'.$img_extension_lowercase;
                $img_upload_path =  'assets/images/profile/'.$new_image_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                    //INSERT INTO DATABASE
                    //Create Connection
                $servername = "localhost";
                $root = "root";
                $password = "";
                $dbname = "cinemazing";

                $newconn = mysqli_connect($servername, $root, $password, $dbname);

                $uploadimage = "UPDATE admin_account SET admin_profile = '$new_image_name' WHERE admin_id = '$aid'";
                $res = mysqli_query($newconn, $uploadimage);
            }
        }
    }
}else if(isset($_POST['update-username']) && isset($_POST['username'])){
    $ausername = $_POST['username'];
        $aid = $_SESSION['admin_id']; //user id for change password

        //Create Connection
        $servername = "localhost";
        $root = "root";
        $password = "";
        $dbname = "cinemazing";

        $newconn = mysqli_connect($servername, $root, $password, $dbname);

        $updateusername = "UPDATE admin_account SET admin_username = '$ausername' WHERE admin_id = '$aid'";
        $res = mysqli_query($newconn, $updateusername);
        header("location: logout.php");


    }else if(isset($_POST['update-password']) && isset($_POST['cupassword']) && isset($_POST['nupassword']) && isset($_POST['cnupassword'])) {
        if ($_POST['nupassword'] === $_POST['cnupassword']) {
        $cupassword = $_POST['cupassword']; //current password
        $nupassword = $_POST['nupassword']; //new password
        $ausername = $_SESSION['admin_username']; //username
        $aid = $_SESSION['admin_id']; //user id for change password

        //Create Connection
        $servername = "localhost";
        $root = "root";
        $password = "";
        $dbname = "cinemazing";

        $newconn = mysqli_connect($servername, $root, $password, $dbname);

        $validatepw = "SELECT * FROM admin_account WHERE admin_username = '$ausername' AND admin_password = '$cupassword'";

        $res = mysqli_query($newconn, $validatepw);

        if (mysqli_num_rows($res)===1){
            $row = mysqli_fetch_assoc($res);

            $updatepword = "UPDATE admin_account SET admin_password = '$nupassword' WHERE admin_id = '$aid'";

            $res = mysqli_query($newconn, $updatepword);

            echo '<h1 align="center">PASSWORD UPDATED</h1>';
            header("location: logout.php");
        }
    } else {
        echo '<h1 align="center">PASSWORD DOESN\'T MATCH</h1>';
    }
} 
?>