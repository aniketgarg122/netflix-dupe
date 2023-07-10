<?php
$username= $_POST["username"];
$password= $_POST["password"];
if (!empty($username) || !empty($password)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "aniket";
    $dbname = "netflix";
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()){
        die('connect error('. mysqli_connect_error().')'. mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT username From data where username = ? limit 1";
        $INSERT = "INSERT into data (username , password) values(?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->bind_result($username);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param('ss',$username, $password);
            $stmt->execute();
            echo "new record inserted";
        }
        else{
            echo"someone already registered";
        }
    }
}
else{
    echo "All fields are required";
    die();
}
?>