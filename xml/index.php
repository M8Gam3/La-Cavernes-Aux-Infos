<?php 

// var_dump($_POST);

$urlXmlSport = 'https://www.letelegramme.fr/sports/rss.xml';
$urlXmlEconomie = 'https://services.lesechos.fr/rss/les-echos-economie.xml';
$urlXmlEnvironnement = 'https://www.lefigaro.fr/rss/figaro_sciences.xml';
$urlPolitique = 'https://services.lesechos.fr/rss/les-echos-politique.xml';
$urlNumerique = 'https://services.lesechos.fr/rss/les-echos-tech-medias.xml';
$urlXmlSante = 'https://services.lesechos.fr/rss/les-echos-idees.xml';
$urlAutres = 'https://www.lepoint.fr/24h-infos/rss.xml';

// liste xml
$xmlSport = simplexml_load_file($urlXmlSport); //sport
$xmlEconomie = simplexml_load_file($urlXmlEconomie); //economie
$xmlEnvironnement = simplexml_load_file($urlXmlEnvironnement); //Science et environnement
$xmlPolitique = simplexml_load_file($urlPolitique);
$xmlNumerique = simplexml_load_file($urlNumerique);
$xmlSanté = simplexml_load_file($urlXmlSante); //Idées : retrouvez les analyses et éditos des Échos sur l'actualité économique et financière, chroniques, tribunes, contributions d'experts...
$xmlAutres = simplexml_load_file($urlAutres);


// Création des cookies  
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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/mediaqueries.css">
    <title>Document</title>
</head>
<body>

    <header>
        <div id="logo">
            <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 566.93 425.2">
                <defs>
                <style>
                .cls-1 {
                    fill: #fff;
                }

                .cls-2 {
                    font-family: BernardMT-Condensed, 'Bernard MT Condensed';
                    font-size: 40px;
                }

                .cls-2, .cls-3 {
                    fill: #1d1d1b;
                }
                </style>
                </defs>
                <path class="cls-3" d="m194.78,250.41c-.86-.49-2.77-.74-5.74-.74-2.71,0-4.62.35-5.74,1.04-1.12.69-2.08,2.66-2.87,5.89-2.24,8.38-4.06,13.72-5.44,16.03-1.39,2.31-3.53,3.46-6.43,3.46h-5.64v-60.49l-16.1-17.3,16.1-14.99v-34.9c0-3.23,1.65-5.41,4.95-6.53,1.78-.59,2.89-1.27,3.32-2.03.43-.76.64-2.23.64-4.4,0-3.63-.31-5.85-.94-6.68-.63-.82-1.8-1.24-3.51-1.24h-7.02l-16.23,16.23-16.23-16.23h-6.15c-1.72,0-2.77.35-3.17,1.04-.4.69-.59,2.49-.59,5.39,0,2.44.23,4.19.69,5.25.46,1.06,1.72,2.01,3.76,2.87,2.38,1.06,3.56,2.81,3.56,5.25v117.58c0,5.74-1.88,9.2-5.64,10.39-1.19.4-1.96.97-2.33,1.73-.36.76-.54,2.46-.54,5.1,0,3.43,1.39,5.15,4.16,5.15h21.58l7.56-7.56,7.56,7.56h28.44c1.91,0,3.18-.4,3.81-1.19.63-.79,1.14-2.41,1.53-4.85l3.46-23.66c.33-2.04.49-3.53.49-4.45,0-1.32-.43-2.23-1.29-2.72Z"/>
                <path class="cls-3" d="m269.29,174.51c2.36,0,3.93-.46,4.71-1.37.79-.92,1.18-2.52,1.18-4.81,0-.59-.04-1.21-.1-1.86l-.88-12.32-7.46-6.73,6.46-7.16-.39-5.39c-.26-3.86-.69-6.23-1.28-7.12-.59-.88-1.47-1.32-2.65-1.32h-5.1c-1.05,0-2.19.82-3.43,2.45-1.44,1.83-2.55,2.75-3.34,2.75-.65,0-1.64-.46-2.94-1.37-3.47-2.55-7.56-3.83-12.27-3.83-7.79.02-14.61,3.06-20.46,9.14-5.86,6.08-10.66,14.69-14.43,25.85-3.76,11.16-5.64,26.06-5.64,44.7,0,19.76,2.24,35.97,6.72,48.63,4.48,12.66,9.8,21.58,15.95,26.74,6.15,5.17,13.28,7.75,21.4,7.75s15.37-3.09,21-9.27c5.63-6.18,8.44-13.95,8.44-23.31,0-2.94-.54-4.92-1.62-5.94-1.08-1.01-2.99-1.52-5.74-1.52-3.67,0-6.08.69-7.26,2.06s-1.86,3.83-2.06,7.36c-.65,12.23-3.73,18.35-9.23,18.35-4.32,0-6.48-3.66-6.48-10.99v-45.82l-.45.5-20.6-18.6,20.91-23.15.14.13v-23.46c0-10.27,2.06-15.41,6.18-15.41,4.97,0,8.8,7.13,11.48,21.39,1.04,5.63,2.12,9.19,3.24,10.7,1.11,1.51,3.1,2.26,5.99,2.26Z"/>
                <path class="cls-3" d="m373.46,273.71c-3.16-2.82-5.14-6.92-5.95-12.29l-6.24-41.75-20.24-18.28,15.02-16.64-5.09-34.08c-.41-2.82-.81-5.68-1.21-8.57-.94-7.46-1.88-12.29-2.82-14.51s-2.59-3.33-4.93-3.33h-38.48c-1.75,0-2.82.44-3.22,1.31-.4.87-.6,3.16-.6,6.85,0,2.76.67,4.54,2.02,5.34,2.9,1.61,4.35,3.46,4.35,5.54,0,1.35-.17,2.92-.5,4.74l-18.66,118.6c-.34,2.35-1.61,4.57-3.83,6.65-2.35,2.28-3.53,5.28-3.53,8.97,0,3.09.74,4.64,2.21,4.64h5.66l6.29-6.96,7.71,6.96h6.86c1.14,0,1.86-.29,2.16-.86.3-.57.45-2.23.45-4.99,0-2.15-.2-3.69-.6-4.64-.4-.94-1.44-1.85-3.11-2.72-3.14-1.68-4.71-3.73-4.71-6.15,0-1.55.28-3.29.85-5.24.14-.4.21-.71.21-.91l1.17-9.27h25.12c1.46,8.59,2.19,14.06,2.19,16.41s-1.17,4.18-3.51,5.66c-1.6,1.07-2.57,2.02-2.9,2.82-.34.81-.5,2.82-.5,6.05,0,2.55.67,3.83,2.01,3.83h44.76c1.54,0,2.55-.39,3.02-1.16.47-.77.71-2.87.71-6.3,0-2.22-.14-3.54-.4-3.98-.27-.44-.84-1.02-1.71-1.76Zm-67.1-33.15l11.38-78.76,11.02,78.76h-22.41Z"/>
                <path class="cls-3" d="m436.34,271.87c-3.02-1.48-4.53-3.49-4.53-6.04v-47.9l-17.75-16.03,17.75-19.66v-37.49c0-4.57,2.08-7.22,6.25-7.96,1.27-.2,2.1-.74,2.47-1.61.37-.87.56-3.09.56-6.65,0-2.35-.27-3.76-.81-4.23-.54-.47-1.71-.71-3.53-.71h-29.56l-4.88,5.4-5.98-5.4h-7.83c-2.22,0-3.32,1.04-3.32,3.12v5.34c0,1.61.18,2.7.55,3.27.37.57,1.39,1.23,3.07,1.96,2.28.94,3.76,2.13,4.43,3.58.67,1.45,1.01,3.58,1.01,6.4v119.57c0,2.82-1.81,4.73-5.44,5.74-2.01.6-3.19,1.45-3.53,2.52-.34,1.07-.5,4.03-.5,8.86,0,1.48.94,2.22,2.82,2.22h49.16c1.68,0,2.72-.13,3.12-.4.4-.27.6-1.48.6-3.63v-3.93c0-1.81-.2-3.09-.6-3.83-.4-.74-1.58-1.58-3.53-2.52Z"/>
                <text class="cls-2" transform="translate(124 323.14)"><tspan x="0" y="0">La caverne aux infos </tspan></text>
            </svg>
        </div>
        <div id="navbar">
            <ul>
                <a href="#">Vos thématiques</a>
                <a href="./preferences.php">Mes Préférences</a>
                <a href="./index.php#decouvrezAussi">Découvrez aussi</a>
            </ul>
        </div>
    </header>

    <main>
            <!-- Si l'utilisateur n'a pas de favoris -->
            <?php if (empty($preference)) { ?>
            <p>Vous n'avez pas de préférences</p>
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
                <div class="transition"><span></span></div>
                <!-- Description de l'article -->
                <p class="descriptionArticles">
                <?php 
                echo $titres[$i] -> description?> </p>

                <!-- Date de publication de l'article -->
                <p>
                <?php echo $titres[$i] -> pubDate ?> </p>

                <!-- Bouton pour afficher l'article en grand pour le lire -->
                <form method="get" action="./oneArticle.php" >
                <input type="checkbox" style="display:none" value="<?php echo $urlXmlSport ?>" name="xmlurl" checked>
                <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>
                <input class="readArticle" value="Lire l'article" type="submit" href="<?php echo $titres[$i] -> link?>"></input>
                </form>
                </div>

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
                    <div class="transition"><span></span></div>

                    <!-- Description de l'article -->
                    <p class="descriptionArticles">
                    <?php 
                    echo $titresEco[$i] -> description?> </p>

                    <!-- Date de publication de l'article -->
                    <p>
                    <?php echo $titresEco[$i] -> pubDate ?> </p>

                    <!-- Bouton pour afficher l'article en grand pour le lire -->
                    <form method="get" action="./oneArticle.php" >
                        <input type="checkbox" style="display:none" value="<?php echo $urlXmlEconomie ?>" name="xmlurl" checked>
                        <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>
                        <input class="readArticle" value="Lire l'article" type="submit" href="<?php echo $titresEco[$i] -> link?>"></input>
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
                    <div class="transition"><span></span></div>

                    <!-- Description de l'article -->
                    <p class="descriptionArticles">
                    <?php 
                    echo $titresEnvir[$i] -> description?> </p>

                    <!-- Date de publication de l'article -->
                    <p>
                    <?php echo $titresEnvir[$i] -> pubDate ?> </p>

                    <!-- Bouton pour afficher l'article en grand pour le lire -->
                    <form method="get" action="./oneArticle.php" >
                    <input type="checkbox" style="display:none" value="<?php echo $urlXmlEnvironnement ?>" name="xmlurl" checked>
                    <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>
                    <input class="readArticle" value="Lire l'article" type="submit" href="<?php echo $titresEnvir[$i] -> link?>"></input>
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
                    <div class="transition"><span></span></div>

                    <!-- Description de l'article -->
                    <p class="descriptionArticles">
                    <?php 
                    echo $titrespol[$i] -> description?> </p>

                    <!-- Date de publication de l'article -->
                    <p>
                    <?php echo $titrespol[$i] -> pubDate ?> </p>

                    <!-- Bouton pour afficher l'article en grand pour le lire -->
                    <form method="get" action="./oneArticle.php" >
                    <input type="checkbox" style="display:none" value="<?php echo $urlPolitique ?>" name="xmlurl" checked>
                    <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>
                    <input class="readArticle" value="Lire l'article" type="submit" href="<?php echo $titrespol[$i] -> link?>"></input>
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
                    <div class="transition"><span></span></div>

                    <!-- Description de l'article -->
                    <p class="descriptionArticles">
                    <?php 
                    echo $titresnum[$i] -> description?> </p>

                    <!-- Date de publication de l'article -->
                    <p>
                    <?php echo $titresnum[$i] -> pubDate ?> </p>

                    <!-- Bouton pour afficher l'article en grand pour le lire -->
                    <form method="get" action="./oneArticle.php" >
                    <input type="checkbox" style="display:none" value="<?php echo $urlNumerique ?>" name="xmlurl" checked>
                    <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>
                    <input class="readArticle" value="Lire l'article" type="submit" href="<?php echo $titresnum[$i] -> link?>"></input>
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
                    <div class="transition"><span></span></div>

                    <!-- Description de l'article -->
                    <p class="descriptionArticles">
                    <?php 
                    echo $titressan[$i] -> description?> </p>

                    <!-- Date de publication de l'article -->
                    <p>
                    <?php echo $titressan[$i] -> pubDate ?> </p>

                    <!-- Bouton pour afficher l'article en grand pour le lire -->
                    <form method="get" action="./oneArticle.php" >
                        <input type="checkbox" style="display:none" value="<?php echo $urlXmlSante ?>" name="xmlurl" checked>
                        <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>

                        <input class="readArticle"  value="Lire l'article..." type="submit" href="<?php echo $titressan[$i] -> link?>"></input>

                        </div>
                    </form>
                    <?php }   ?>

                </div> 
                <div class="btn">
                    <form method="get" action="./oneTheme.php">
                        <input style="display:none" type="radio" value="<?= $urlXmlSante ?>" name="sante" checked>
                        <input type="submit" value="Voir les autres articles"></input>
                    </form>
                </div>
                <?php             
            }
            ?> 
            
            <!-- Section découvrez aussi -->
            <div id="decouvrezAussi">
                <?php

                
                $titres = $xmlAutres -> channel -> item;

                ?> <h2> Découvrez aussi </h2>
                
                <div class="wrap">

                <?php
                for($i = 0; $i < 3; $i++ /*$titres as $item*/){ ?>


                <div class="thematique">   

                <!-- Image de l'article -->
                <img class="img-size" src="<?php 
                echo $titres[$i] -> enclosure['url'] ?>">

                <!-- Titre de l'article -->
                <h3 class="titleArticles"> <?php echo $titres[$i] -> title; ?> </h3>
                <div class="transition"><span></span></div>

                <!-- Description de l'article -->
                <p class="descriptionArticles">
                <?php 
                echo $titres[$i] -> description?> </p>

                <!-- Date de publication de l'article -->
                <p>
                <?php echo $titres[$i] -> pubDate ?> </p>

                <!-- Bouton pour afficher l'article en grand pour le lire -->
                <form method="get" action="./oneArticle.php" >
                    <input type="checkbox" style="display:none" value="<?php echo $urlAutres ?>" name="xmlurl" checked>
                    <input type="checkbox" style="display:none" value="<?php echo $i ?>" name="articleSimple" checked>
                    <input class="readArticle" value="Lire l'article" type="submit" href="<?php echo $titres[$i] -> link?>"></input>
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
                    <img src="./assets/img/logo_blanc.png" alt="">
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