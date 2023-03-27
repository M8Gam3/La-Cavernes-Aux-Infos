<?php 

// var_dump($_POST);

$urlXmlSport = 'https://www.letelegramme.fr/sports/rss.xml';
$urlXmlEconomie = 'https://services.lesechos.fr/rss/les-echos-economie.xml';
$urlXmlEnvironnement = 'https://www.lefigaro.fr/rss/figaro_sciences.xml';
$urlPolitique = 'https://services.lesechos.fr/rss/les-echos-politique.xml';
$urlNumerique = 'https://services.lesechos.fr/rss/les-echos-tech-medias.xml';
$urlXmlSante = 'https://services.lesechos.fr/rss/les-echos-idees.xml';
$urlAutres = 'https://www.ouest-france.fr/rss/une';

// liste xml
$xmlSport = simplexml_load_file($urlXmlSport); //sport
$xmlEconomie = simplexml_load_file($urlXmlEconomie); //economie
$xmlEnvironnement = simplexml_load_file($urlXmlEnvironnement); //Science et environnement
$xmlPolitique = simplexml_load_file($urlPolitique);
$xmlNumerique = simplexml_load_file($urlNumerique);
$xmlSanté = simplexml_load_file($urlXmlSante); //Idées : retrouvez les analyses et éditos des Échos sur l'actualité économique et financière, chroniques, tribunes, contributions d'experts...
$xmlAutres = simplexml_load_file($urlAutres);


// Création des cookies
if(isset($_POST)){
    $preference = json_encode($_POST);
    setcookie('preference', $preference,strtotime("+1 year"));
    $_COOKIE['preference'] = $preference;
}
  
  if(isset($_COOKIE['preference'])){
    $preference = (json_decode($_COOKIE['preference']));
}
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
                <a href="#">Vos thématiques</a>
                <a href="./preferences.php">Mes Préférences</a>
                <a href="#decouvrezAussi">Découvrez aussi</a>
            </ul>
        </div>
    </header>

    <main>
                <!-- Si l'utilisateur n'a pas de favoris -->
                <?php if (empty($_POST)) { ?>
                <p id="text-pref">Vous n'avez pas de préférences</p>
                <?php } ?>
        
            <!-- Section Sport -->
            <?php
            if(isset($preference -> sport)){  //Si sport est dans le cookie : on boucle sur les items de la catégorie sport

                
                $titres = $xmlSport -> channel -> item;

                ?> <h2> Sport </h2>
                
                <div class="wrap">

                <?php
                for($i = 0; $i < 3; $i++ /*$titres as $item*/){ ?>


                <div class="thematique">   

                <!-- Image de l'article -->
                <img class="img-size" src="<?php 
                echo $titres[$i] -> enclosure['url'] ?>">

                <!-- Titre de l'article -->
                <h3 class="titleArticles"> <?php echo $titres[$i] -> title; ?> </h3>

                <!-- Description de l'article -->
                <p class="descriptionArticles">
                <?php 
                echo $titres[$i] -> description?> </p>

                <!-- Date de publication de l'article -->
                <p class="date-article">
                <?php echo $titres[$i] -> pubDate ?> </p>

                <!-- Bouton pour afficher l'article en grand pour le lire -->
                <form method="get" action="./oneArticle.php" >
                <input type="checkbox" style="display:none" value="<?php echo $urlXmlSport ?>" name="xmlurl" checked>
                <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>
                <input class="btn-readmore" value="Lire l'article" type="submit" href="<?php echo $titres[$i] -> link?>"></input>
                </div>
                </form>
                <?php }   ?>

                </div> 

                <div class="btn">
                    <form method="get" action="./oneTheme.php">
                        <input style="display:none" type="radio" value="<?= $urlXmlSport ?>" name="sante" checked>
                        <input type="submit" value="Voir les autres articles"></input>
                    </form>
                </div>

                <?php   
            }
            ?>  

            <!-- Section Economie -->
            <?php
            if(isset($preference -> economy)){  //Si sport est dans le cookie : on boucle sur les items de la catégorie economie

                $titresEco = $xmlEconomie -> channel -> item;
                ?> <h2> Economie </h2>
                
                <div class="wrap">

                    <?php
                    for($i = 0; $i < 3; $i++ /*$titres as $item*/){ ?>


                    <div class="thematique">   

                    <!-- Image de l'article -->
                    <img class="img-size" src="<?php 
                     echo $titresEco[$i] -> children( 'media', True )->content->attributes()['url']; ?>">

                    <!-- Titre de l'article -->
                    <h3 class="titleArticles"> <?php echo $titresEco[$i] -> title; ?> </h3>

                    <!-- Description de l'article -->
                    <p class="descriptionArticles">
                    <?php 
                    echo $titresEco[$i] -> description?> </p>

                    <!-- Date de publication de l'article -->
                    <p class="date-article">
                    <?php echo $titresEco[$i] -> pubDate ?> </p>

                    <!-- Bouton pour afficher l'article en grand pour le lire -->
                    <form method="get" action="./oneArticle.php" >
                        <input type="checkbox" style="display:none" value="<?php echo $urlXmlEconomie ?>" name="xmlurl" checked>
                        <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>
                        <input class="btn-readmore" value="Lire l'article" type="submit" href="<?php echo $titres[$i] -> link?>"></input>
                        </div>
                    </form> 
                    <?php }   ?>

                </div> 

                <div class="btn">
                    <form method="get" action="./oneTheme.php">
                        <input style="display:none" type="radio" value="<?= $urlXmlEconomie ?>" name="sante" checked>
                        <input type="submit" value="Voir les autres articles"></input>
                    </form>
                </div>

                <?php             
            }
            ?>  
            
            <!-- Section Environnement -->
            <?php
            if(isset($preference -> environment)){  //Si sport est dans le cookie : on boucle sur les items de la catégorie economie

                $titresEnvir = $xmlEnvironnement -> channel -> item;

                ?> <h2> Environnement </h2>
                
                <div class="wrap">

                    <?php
                    for($i = 0; $i < 3; $i++ /*$titres as $item*/){ ?>


                    <div class="thematique">   

                    <!-- Image de l'article -->
                    <img class="img-size" src="<?php 
                     echo $titresEnvir[$i] -> children( 'media', True )->content->attributes()['url']; ?>">

                    <!-- Titre de l'article -->
                    <h3 class="titleArticles"> <?php echo $titresEnvir[$i] -> title; ?> </h3>

                    <!-- Description de l'article -->
                    <p class="descriptionArticles">
                    <?php 
                    echo $titresEnvir[$i] -> description?> </p>

                    <!-- Date de publication de l'article -->
                    <p class="date-article">
                    <?php echo $titresEnvir[$i] -> pubDate ?> </p>

                    <!-- Bouton pour afficher l'article en grand pour le lire -->
                    <form method="get" action="./oneArticle.php" >
                    <input type="checkbox" style="display:none" value="<?php echo $urlXmlEnvironnement ?>" name="xmlurl" checked>
                    <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>
                    <input class="btn-readmore" value="Lire l'article" type="submit" href="<?php echo $titresEnvir[$i] -> link?>"></input>
                    </div>
                    </form>
                    <?php }   ?>

                </div> 

                <div class="btn">
                    <form method="get" action="./oneTheme.php">
                        <input style="display:none" type="radio" value="<?= $urlXmlEnvironnement ?>" name="sante" checked>
                        <input type="submit" value="Voir les autres articles"></input>
                    </form>
                </div>

                <?php             
            }
            ?>  

            <!-- Section Politique -->
            <?php
            if(isset($preference -> politics)){  //Si sport est dans le cookie : on boucle sur les items de la catégorie economie

                $titrespol = $xmlPolitique -> channel -> item;

                ?> <h2> Politique </h2>
                
                <div class="wrap">

                    <?php
                    for($i = 0; $i < 3; $i++ /*$titres as $item*/){ ?>


                    <div class="thematique">   

                    <!-- Image de l'article -->
                    <img class="img-size" src="<?php 
                     echo $titrespol[$i] -> children( 'media', True )->content->attributes()['url']; ?>">

                    <!-- Titre de l'article -->
                    <h3 class="titleArticles"> <?php echo $titrespol[$i] -> title; ?> </h3>

                    <!-- Description de l'article -->
                    <p class="descriptionArticles">
                    <?php 
                    echo $titrespol[$i] -> description?> </p>

                    <!-- Date de publication de l'article -->
                    <p class="date-article">
                    <?php echo $titrespol[$i] -> pubDate ?> </p>

                    <!-- Bouton pour afficher l'article en grand pour le lire -->
                    <form method="get" action="./oneArticle.php" >
                    <input type="checkbox" style="display:none" value="<?php echo $urlPolitique ?>" name="xmlurl" checked>
                    <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>
                    <input class="btn-readmore" value="Lire l'article" type="submit" href="<?php echo $titrespol[$i] -> link?>"></input>
                    </div>
                    </form>
                    <?php }   ?>

                </div> 

                <div class="btn">
                    <form method="get" action="./oneTheme.php">
                        <input style="display:none" type="radio" value="<?= $urlPolitique ?>" name="sante" checked>
                        <input type="submit" value="Voir les autres articles"></input>
                    </form>
                </div>

                <?php             
            }
            ?> 




            <!-- Section Numérique -->
            <?php
            if(isset($preference -> numeric)){  //Si sport est dans le cookie : on boucle sur les items de la catégorie economie

                $titresnum = $xmlNumerique -> channel -> item;

                ?> <h2> Numérique </h2>
                
                <div class="wrap">

                    <?php
                    for($i = 0; $i < 3; $i++ /*$titres as $item*/){ ?>


                    <div class="thematique">   

                    <!-- Image de l'article -->
                    <img class="img-size" src="<?php 
                     echo $titresnum[$i] -> children( 'media', True )->content->attributes()['url']; ?>">

                    <!-- Titre de l'article -->
                    <h3 class="titleArticles"> <?php echo $titresnum[$i] -> title; ?> </h3>

                    <!-- Description de l'article -->
                    <p class="descriptionArticles">
                    <?php 
                    echo $titresnum[$i] -> description?> </p>

                    <!-- Date de publication de l'article -->
                    <p class="date-article">
                    <?php echo $titresnum[$i] -> pubDate ?> </p>

                    <!-- Bouton pour afficher l'article en grand pour le lire -->
                    <form method="get" action="./oneArticle.php" >
                    <input type="checkbox" style="display:none" value="<?php echo $urlNumerique ?>" name="xmlurl" checked>
                    <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>
                    <input class="btn-readmore" value="Lire l'article" type="submit" href="<?php echo $titresnum[$i] -> link?>"></input>
                    </div>
                    </form>
                    <?php }   ?>

                </div> 
                <div class="btn">
                    <form method="get" action="./oneTheme.php">
                        <input style="display:none" type="radio" value="<?= $urlNumerique ?>" name="sante" checked>
                        <input type="submit" value="Voir les autres articles"></input>
                    </form>
                </div>

                <?php             
            }
            ?>

            <!-- Section Santé, vie quotidienne -->
            <?php
            if(isset($preference -> sante)){  //Si sport est dans le cookie : on boucle sur les items de la catégorie economie

                $titressan = $xmlSanté -> channel -> item;

                ?> <h2> Santé, vie quotidienne </h2>
                
                <div class="wrap">

                    <?php
                    for($i = 0; $i < 3; $i++ /*$titres as $item*/){ ?>


                    <div class="thematique">   

                    <!-- Image de l'article -->
                    <img class="img-size" src="<?php 
                     echo $titressan[$i] -> children( 'media', True )->content->attributes()['url']; ?>">

                    <!-- Titre de l'article -->
                    <h3 class="titleArticles"> <?php echo $titressan[$i] -> title; ?> </h3>

                    <!-- Description de l'article -->
                    <p class="descriptionArticles">
                    <?php 
                    echo $titressan[$i] -> description?> </p>

                    <!-- Date de publication de l'article -->
                    <p class="date-article">
                    <?php echo $titressan[$i] -> pubDate ?> </p>

                    <!-- Bouton pour afficher l'article en grand pour le lire -->
                    <form method="get" action="./oneArticle.php" >
                        <input type="checkbox" style="display:none" value="<?php echo $urlXmlSante ?>" name="xmlurl" checked>
                        <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>

                        <input value="Lire l'article" type="submit" href="<?php echo $titressan[$i] -> link?>"></input>

                        </div>
                    </form>
                    <?php }   ?>

                </div> 
                <div class="btn">
                    <form method="get" action="./oneTheme.php">
                        <input style="display:none" type="radio" value="<?= $urlXmlSante ?>" name="sante" checked>
                        <input class="btn-readmore" type="submit" value="Voir les autres articles"></input>
                    </form>
                </div>
                <?php             
            }
            ?> 
            
            <!-- Section découvrez aussi -->
            <div id="decouvrezAussi">
                <?php

                
                $titres = $xmlAutres -> channel -> item;

                ?> <h1> Découvrez aussi </h1>
                
                <div class="wrap">

                <?php
                for($i = 0; $i < 3; $i++ /*$titres as $item*/){ ?>


                <div class="thematique">   

                <!-- Image de l'article -->
                <img class="img-size" src="<?php 
                echo $titres[$i] -> enclosure['url'] ?>">

                <!-- Titre de l'article -->
                <h3 class="titleArticles"> <?php echo $titres[$i] -> title; ?> </h3>

                <!-- Description de l'article -->
                <p class="descriptionArticles">
                <?php 
                echo $titres[$i] -> description?> </p>

                <!-- Date de publication de l'article -->
                <p class="date-article">
                <?php echo $titres[$i] -> pubDate ?> </p>

                <!-- Bouton pour afficher l'article en grand pour le lire -->
                <form method="get" action="./oneArticle.php" >
                    <input type="checkbox" style="display:none" value="<?php echo $urlAutres ?>" name="xmlurl" checked>
                    <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>
                    <input class="btn-readmore" value="Lire l'article" type="submit" href="<?php echo $titres[$i] -> link?>"></input>
                    </div>
                </form>


                <?php }  ?>


                </div>

                                    
                <div class="btn">
                    <form method="get" action="./oneTheme.php">
                        <input style="display:none" type="radio" value="<?= $urlAutres ?>" name="sante" checked>
                        <input type="submit" value="Voir les autres articles"></input>
                    </form>
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