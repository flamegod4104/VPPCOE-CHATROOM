<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Database connection here
    $con = new mysqli("localhost","justtshraa","23clg14scg05","my_website_db");
    if ($con->connect_error) {
        die("Failed to connect : ". $con->connect_error);
    } else {
        $stmt = $con->prepare("SELECT * FROM student WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        IF ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            If ($data['password'] === $password) {
                echo "<H2>Login Successful! Welcome</H2>";
            } ELSE  {
                ECHO "<H2>INVALID USERNAME OR PASSWORD</H2>";
            }
        } else {
            echo "<H2> INVALID  USERNAME OR PASSWORD!!!!</H2>";
        }

    }
?>
