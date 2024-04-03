<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <div class="container">
        <h2>Rejestracja</h2>
        
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
            $password_again = $_POST["password_again"];
            
            
            if ($password != $password_again) {
                echo "Hasła nie są takie same.";
            } else {
                
                $email = mysqli_real_escape_string($conn, $email);
                $password = mysqli_real_escape_string($conn, $password);
                
              
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Haszowanie hasła
                $sql = "INSERT INTO `user` (`email`, `password`) VALUES ('$email', '$hashed_password')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "Pomyślnie utworzono uzytkownika.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
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
                <label for="password_again">Hasło ponownie:</label>
                <input type="password" id="password_again" name="password_again" required>
            </div>
            <div>
                <input type="submit" value="Stwórz">
            </div>
        </form>
    </div>
</body>
</html>
