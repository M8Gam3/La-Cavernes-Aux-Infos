<?php 

var_dump($_POST);

if(isset($_POST)){
  $preference = json_encode($_POST);
  setcookie('preference', $preference,strtotime("+1 year"));
  $_COOKIE['preference'] = $preference;
}

if(isset($_COOKIE['preference'])){
  $preference = (json_decode($_COOKIE['preference']));
  var_dump($preference);
}




$cookie = [
    'sport' => true,
    'economie' => false,
    'environnement' => false,
    'politique' => false,
    'numerique' => true,
    'sante' => false,
];

$xml = simplexml_load_file('https://www.ouest-france.fr/rss/une'); //général

$xmlSport = simplexml_load_file("https://www.letelegramme.fr/sports/rss.xml"); //sport

$xmlEconomie = simplexml_load_file('https://services.lesechos.fr/rss/les-echos-economie.xml'); //economie

$xmlEnvironnement = simplexml_load_file('https://www.lefigaro.fr/rss/figaro_sciences.xml'); //Science et environnement

$xmlPolitique = simplexml_load_file('https://services.lesechos.fr/rss/les-echos-politique.xml');

$xmlNumerique = simplexml_load_file('https://services.lesechos.fr/rss/les-echos-tech-medias.xml');

$xmlSanté = simplexml_load_file('https://services.lesechos.fr/rss/les-echos-idees.xml'); //Idées : retrouvez les analyses et éditos des Échos sur l'actualité économique et financière, chroniques, tribunes, contributions d'experts...

$titres = $xmlPolitique -> channel -> item;
$listsize = 3;

// var_dump(sizeof($titres));

$count = 3;

if(isset($_POST['increment'])) {
    $count +=3 ;
}



?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>  -->
    <!-- <script async src="assets/js/script.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->
    <title>Document</title>    
  </head>
  <body>
    <h1>Section Formulaire</h1>

    <form name="preference" method="post">

      <div>
        <input type="checkbox" id="sport" name="sport" <?= isset($preference -> sport) ? 'checked' : ""  ?>>
        <label for="sport">Sport</label>
      </div>

      <div>
        <input type="checkbox" id="economy" name="economy" <?= isset($preference -> economy) ? 'checked' : ""  ?>>
        <label for="economy">Economie</label>
      </div>

      <div>
        <input type="checkbox" id="environment" name="environment" <?= isset($preference -> environment) ? 'checked' : ""  ?>>
        <label for="environment">Environnement</label>
      </div>

      <div>
        <input type="checkbox" id="politics" name="politics" <?= isset($preference -> politics) ? 'checked' : ""  ?>>
        <label for="politics">Politique</label>
      </div>

      <div>
        <input type="checkbox" id="numeric" name="numeric" <?= isset($preference -> numeric) ? 'checked' : ""  ?>> 
        <label for="numeric">Numérique</label>
      </div>

      <div>
        <input type="checkbox" id="sante" name="sante" <?= isset($preference -> sante) ? 'checked' : ""  ?>>
        <label for="sante">Vie quotidienne et santé</label>
      </div>

      <input type="submit" value="confirmer">
    </form>



        
    <!-- Section sport -->
    <?php
      if(isset($preference -> sport)){

        for($i = 0; $i < 6; $i++ /*$titres as $item*/){ ?>
        <h2> <?php echo $titres[$i] -> title; ?> </h2>
        <p>
        <?php 
        echo $titres[$i] -> description?> </p>

        <img src="<?php 
        echo $titres[$i] -> children( 'media', True )->content->attributes()['url']; ?>">

        <p>
        <?php echo $titres[$i] -> pubDate ?> </p>

        <a href="<?php echo $titres[$i] -> link?>"><button >Lire l'article</button></a>
        
        <?php } 
        
        }
    ?>  
    
    
   

    </div>

    <form method="POST" action="">
        <input type="submit" name="increment" value="Incrémenter">
    </form>



    <script>
   $('input[name=increment]').click(function() {
       $(this).animate({opacity: 0.5}, 200);
   });
    </script>




  </body>
</html>


