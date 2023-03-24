<?php
$preference = (json_decode($_COOKIE['preference']));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Préférences</title>
</head>
<body>

    <header>
        <div id="logo">
            <img src="./assets/img/logo_lcai.png" alt="">
        </div>
        <div id="navbar">
            <ul>
                <a href="./accueilClean.php">Vos thématiques</a>
                <a href="./preferences.php">Mes Préférences</a>
                <a href="">Découvrez aussi</a>
            </ul>
        </div>
    </header>

    <h1>Vos préférences</h1>

        <form id="preference" name="preference" method="post" action="./accueilClean.php">
            <div id="formContainer">
                <div class="three">
                    <div>
                        <input class="hidenInput" type="checkbox" id="sport" name="sport" <?= isset($preference -> sport) ? 'checked' : ""  ?>>
                        <label for="sport">
                            <img src="./assets/img/sport.png">
                        </label>
                    </div>
                    <div>
                        <input class="hidenInput" type="checkbox" id="economy" name="economy" <?= isset($preference -> economy) ? 'checked' : ""  ?>>
                        <label for="economy">
                            <img src="./assets/img/economie.png">
                        </label>
                    </div>

                    <div>
                        <input class="hidenInput" type="checkbox" id="environment" name="environment" <?= isset($preference -> environment) ? 'checked' : ""  ?>>
                        <label for="environment"><img src="./assets/img/environnement.png"></label>
                    </div>
                </div>
                <div class="three">
                    <div>
                        <input class="hidenInput" type="checkbox" id="politics" name="politics" <?= isset($preference -> politics) ? 'checked' : ""  ?>>
                        <label for="politics"><img src="./assets/img/politique.png"></label>
                    </div>

                    <div>
                        <input class="hidenInput" type="checkbox" id="numeric" name="numeric" <?= isset($preference -> numeric) ? 'checked' : ""  ?>> 
                        <label for="numeric"><img src="./assets/img/numerique.png"></label>
                    </div>

                    <div>
                        <input class="hidenInput" type="checkbox" id="sante" name="sante" <?= isset($preference -> sante) ? 'checked' : ""  ?>>
                        <label for="sante"><img src="./assets/img/sante.png"></label>
                    </div>
                </div>
            </div>
            <input type="submit" value="confirmer">
        </form>
        <footer >
            <div class="box1">
                <p>Aide FAQ</p>
                <p>Mentions légales</p>
                <p>Confidentialité</p>
            </div>
            <div class="box2">
                <div class="logo">
                    <img src="./assets/img/logo_lcai.png" alt="">
                </div>
                <div class="reseaux">
                    <img src="./assets/img/discord.png" alt="">
                    <img src="./assets/img/instagram.png" alt="">
                </div>
            </div>
            <div class="box3">
                <p>Conditions d'utilisations</p>
                <p>Nos journalistes</p>
                <p>Gestion des cookies</p>
            </div>
        </footer>
</body>
</html>