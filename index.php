<?php
require_once('class/User.class.php');
require_once('class/Profile.class.php');
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
        }
        .profile-card {
            color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            background-color: transparent;
            display: inline-block;
        }
        .profile-img {
            width: 300px; /* szerokość */
            height: auto; /* wysokość ustawiona na auto, aby zachować proporcje */
            object-fit: cover;
            border-radius: 10px; /* zaokrąglenie krawędzi */
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="d-flex flex-column align-items-center">
    <header class="w-100 py-4" style="background-color: #000;">
        <div class="container text-center">
            <h1 class="text-white mb-0">Strona główna</h1>
            <div class="d-flex justify-content-center mt-4">
                <a href="login.php" class="btn btn-lg btn-primary me-3" style="background-color: #8a2be2;">Logowanie</a>
                <a href="register.php" class="btn btn-lg btn-primary me-3" style="background-color: #8a2be2;">Rejestracja</a>
                <a href="profile.php" class="btn btn-lg btn-primary" style="background-color: #8a2be2;">Profil</a>
            </div>
        </div>
    </header>

    <div class="col-md-8 text-center mt-4">
        <?php
        $profiles = Profile::GetAll();
        foreach ($profiles as $profile) {
            echo '<div class="row">';
            echo '<div class="col">';
            echo '<div class="profile-card mx-3">';
            echo '<img src="'.$profile->getProfilePhotoURL().'" alt="'.$profile->getFullName().'" class="profile-img">';
            echo '<h5>'.$profile->getFullName().'</h5>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>