<?php
$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$time = $_POST['time'];
$message = $_POST['message'];

if(!empty($username) || !empty($email) || !empty($mobile) || !empty($time) || !empty($message)) {

    $host = "localhost:3306";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "hospital";

    //create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error('.mysqli_connect_error().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email From appointment1 Where email = ? Limit 1";
        $INSERT = "INSERT Into appointment1 (username, email, mobile, time, message) values(?,?,?,?,?)";

        //Prepare Statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssss",$username, $email, $mobile, $time, $message);
            $stmt->execute();
            echo "<script>alert('Your Appointment has been done!');</script>";
            
           

        } else {
            echo "<script>alert('Someone already register using this email!');</script>";
            
        }
        $stmt->close();
        $conn->close();
    }

} else {
    echo "All field are required";
    die();
}


?>