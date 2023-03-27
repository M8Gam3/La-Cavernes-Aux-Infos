<?php
$url = $_GET['xmlurl'];
$index = intval($_GET['articleSimple']);


$xmldecrypt = simplexml_load_file($url);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/mediaqueries.css">

    <title>Document</title>
</head>
<body>
<header>
        <div id="logo">
            <img src="./assets/img/logo_lcai.png" alt="">
        </div>
        <div id="navbar">
            <ul>
                <a href="./index.php">Vos thématiques</a>
                <a href="./preferences.php">Mes Préférences</a>
                <a href="./index.php#decouvrezAussi">Découvrez aussi</a>
            </ul>
        </div>
    </header>
    <main id="mainOneArticle">
        <h1><?php echo $xmldecrypt -> channel -> item[$index] -> title?></h1>
        <div id="container-article">
            <div >
                <img id="img-article" src="<?php if(!is_null($xmldecrypt -> channel -> item[$index] -> enclosure['url'])) { echo $xmldecrypt -> channel -> item[$index] -> enclosure['url'];} else{echo $xmldecrypt -> channel -> item[$index] -> children( 'media', True )->content->attributes()['url'];}?>"/>
            </div>
            <div id="desc-date-article">
                <p id="description-oneArticle"><?php echo $xmldecrypt -> channel -> item[$index] -> description?></p>
                <p id="date-oneArticle"><?php echo $xmldecrypt -> channel -> item[$index] -> pubDate?></p>
                <a href="<?php echo $xmldecrypt -> channel -> item[$index] -> link?>"><button id="btn-readarticle" class="btn-readmore">Lire l'article sur le site officiel</button></a>
            </div>    
        </div>
        
        

        
    </main>
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