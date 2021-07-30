<?php
$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobilenumber'];
$message = $_POST['comment'];

if(!empty($username) || !empty($email) || !empty($mobile) || !empty($message)) {

    $host = "localhost:3306";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "hospital";

    //create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error('.mysqli_connect_error().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email From contact Where email = ? Limit 1";
        $INSERT = "INSERT Into contact (username, email, mobile, message) values(?,?,?,?)";

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
            $stmt->bind_param("ssss",$username, $email, $mobile, $message);
            $stmt->execute();
            echo "<script>alert('Thank You for Contact Us !');</script>";
            
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