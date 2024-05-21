<?php
//zaimportuj kod klasy
require_once('class/User.class.php');

if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
    //wysłano formularz - przechwyć i obrób dane
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    //wywołujemy metodę klasy
    //metody statyczne w PHP wywołuje się poprzez ::
    $result = User::Register($email, $password);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz rejestracji</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh; background-color: #000;">
    <div id="container" class="col-md-6" style="background-color: #000;">
        <div class="text-center mt-5 mb-5">
            <h1 class="text-white">Zarejestruj konto:</h1>
        </div>
        <div id="loginForm" class="col-8 offset-2 mt-5">
            <form action="register.php" method="post">
                <label for="emailInput" class="form-label text-white">Adres e-mail:</label>
                <input type="email" class="form-control mb-3" name="email" id="emailInput">

                <label for="passwordInput" class="form-label text-white">Hasło:</label>
                <input type="password" class="form-control mb-3" name="password" id="passwordInput">

                <button type="submit" class="btn btn-primary w-100 mt-3" style="background-color: #8A2BE2;">Zarejestruj</button>
            </form>
            <div class="text-center mt-3">
                <a href="index.php" class="text-white">Powrót</a>
            </div>
            <?php
            if (isset($result)) {
                if ($result) {
                    echo "<p class='text-success mt-3 text-center'>Udało się utworzyć konto</p>";
                } else {
                    echo "<p class='text-danger mt-3 text-center'>Nie udało się utworzyć konta</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>

