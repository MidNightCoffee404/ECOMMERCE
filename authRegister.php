<?php


$fullname = $_POST["fullName"];
$username = $_POST["username"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];




//received user input


if($_SERVER["REQUEST_METHOD"] == "POST"){
    //validate confirmpassword
    if(trim($password) == trim($confirmPassword)){


       
        $host = "localhost";
        $database = "ecommerce";
        $dbUsername = "root";
        $dbPassword = "";
       
        $dsn = "mysql: host=$host;dbname=$database;";
        try {
            $conn = new PDO($dsn, $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $conn->prepare('INSERT INTO users (FullName, Username, Password, Created_AI, Updated_AI) VALUES (:p_fullname, :p_username, :p_password, NOW(), NOW()) ');


            $stmt->bindParam(':p_fullname,',$fullname);
            $stmt->bindParam(':p_username,',$dbusername);
            $stmt->bindParam(':p_password,',$dbpassword);
            $stmt->execute();


            header("location: /registration.php?success=Connection Successful");
            exit;
        } catch (Exception $e){
            echo "Connection Failed: " . $e->getMessage();
        }
       


    }else{
        header("location: /registration.php?error=Passwords are not the same");
        exit;


    }
}




//connect to database
//insert data


?>