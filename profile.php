<?php
require_once('class/User.class.php');
require_once('class/Profile.class.php');
session_start();

if(isset($_REQUEST['profileID'])) {
    $profileID = $_REQUEST['profileID'];
    $p = Profile::Get($profileID);
} else {
    if(isset($_SESSION['user'])) {
        //jest zalogowany użytkownik - pokaż jego profil
        //załaduj profil zalogowanego użytkownika
        $p = Profile::GetUserProfile($_SESSION['user']->GetID());
    } else {
        //pokaż domyślny profil
        $p = Profile::Get(3);
    }
    
}
    


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil użytkownika</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
            padding: 20px;
        }
        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        .profile-img {
            width: 300px;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 20px;
        }
        .profile-name {
            font-size: 24px;
            margin-top: 20px;
        }
        .btn-primary {
            font-size: 20px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Profil użytkownika</h1>
        <?php
        // Sprawdzenie, czy zmienna $p została ustawiona
        if(isset($p)) {
            echo '<img src="' . $p->getProfilePhotoURL() . '" alt="Zdjęcie profilowe" class="profile-img">';
            echo '<p class="profile-name">' . $p->getFullName() . '</p>';
        } else {
            echo '<p>Brak danych profilowych</p>';
        }
        ?>
        <a href="index.php" class="btn btn-primary mt-3" style="background-color: #8a2be2;">Strona główna</a>
    </div>
</body>
</html>