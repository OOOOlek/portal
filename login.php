<?php
//zaimportuj kod klasy
require_once('class/User.class.php');
//inicjalizacja sesji
session_start();


if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
    //wysłano formularz - przechwyć i obrób dane
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    //wywołujemy metodę klasy
    //metody statyczne w PHP wywołuje się poprzez ::
    $result = User::Login($email, $password);
    //$result zawiera true jeśli udało się zalogować lub 
    //fasle w innym wypadku
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz logowania</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh; background-color: #000;">
    <div id="container" class="col-md-6" style="background-color: #000;">
        <div class="text-center mb-5">
            <h1 class="text-white">Zaloguj się</h1>
        </div>
        <div id="loginForm" class="mt-5">
            <form action="login.php" method="post">
                <div class="mb-3 d-flex justify-content-center">
                    <input type="email" class="form-control w-50" name="email" placeholder="Adres e-mail">
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <input type="password" class="form-control w-50" name="password" placeholder="Hasło">
                </div>
                <button type="submit" class="btn btn-primary w-50 d-block mx-auto" style="background-color: #8A2BE2;">Zaloguj</button>
            </form>
            <div class="text-center mt-3">
                <a href="index.php" class="text-white">Powrót</a>
            </div>
            <?php
            if (isset($result)) {
                if ($result) {
                    echo "<p class='text-success mt-3 text-center'>Użytkownik zalogowany</p>";
                    echo '<p class="text-center"><a href="index.php" class="text-white">Przejdź do głównej strony</a></p>';
                } else {
                    echo "<p class='text-danger mt-3 text-center'>Błąd logowania: Nieprawidłowy adres e-mail lub hasło</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>

