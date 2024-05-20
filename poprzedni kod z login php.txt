<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="container">
        <h2>Logowanie</h2>
        
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "profile";

      
        $conn = new mysqli($servername, $username, $password, $database);

      
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $password);
            
            $sql = "SELECT * FROM `user` WHERE `email`='$email'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row["password"])) {
                    echo "Zalogowano pomyślnie.";
                } else {
                    echo "Nieprawidłowy email lub hasło.";
                }
            } else {
                echo "Nieprawidłowy email lub hasło.";
            }
        }

        
        $conn->close();
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Hasło:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <input type="submit" value="Zaloguj">
            </div>
        </form>
    </div>
</body>
</html>
