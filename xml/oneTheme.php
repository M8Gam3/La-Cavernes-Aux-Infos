<?php
// var_dump($_GET['sante']);
$listeXML = simplexml_load_file($_GET['sante']); 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Document</title>
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

    <main>
        

        <?php
             //Si sport est dans le cookie : on boucle sur les items de la catégorie economie

                $listeXMLitem = $listeXML -> channel -> item;

                ?> <h2 id="title-otherArticle"> D'autre articles du même thème </h2>
                
                <div class="articleContainer">

                    <?php
                    for($i = 0; $i < sizeof($listeXMLitem); $i++ /*$titres as $item*/){ ?>


                    <div class="thematique">   

                    <!-- Image de l'article -->
                        <img src="<?php if(!is_null($listeXML -> channel -> item[$i] -> enclosure['url'])) { echo $listeXML -> channel -> item[$i] -> enclosure['url'];} else{echo $listeXML -> channel -> item[$i] -> children( 'media', True )->content->attributes()['url'];}?>"/>

                        <!-- Titre de l'article -->
                        <h3 class="titleArticles"> <?php echo $listeXMLitem[$i] -> title; ?> </h3>

                        <!-- Description de l'article -->
                        <p class="descriptionArticles">
                        <?php 
                        echo $listeXMLitem[$i] -> description?> </p>

                        <!-- Date de publication de l'article -->
                        <p>
                        <?php echo $listeXMLitem[$i] -> pubDate ?> </p>

                    <!-- Bouton pour afficher l'article en grand pour le lire -->
                        <form method="get" action="./oneArticle.php" >
                            <input type="checkbox" style="display:none" value="<?php echo $_GET['sante'] ?>" name="xmlurl" checked>
                            <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>

                            <input class="btn-readmore" value="Lire l'article" type="submit" href="<?php echo $listeXMLitem[$i] -> link?>"></input>
                        </form>
                    </div>
                    
                    <?php }   ?>

                </div> 

                <?php             
            
            ?> 


    </main>
    <footer >
            <div class="box1">
                <p>Aide FAQ</p>
                <p>Mentions légales</p>
                <p>Confidentialité</p>
            </div>
            <div class="box2">
                <div class="logo">
                    <img src="./assets/img/logo_blanc" alt="">
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