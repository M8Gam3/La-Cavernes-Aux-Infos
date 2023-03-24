    <!-- Section sport + Globales -->
    <?php
    for($i = 0; $i < 20; $i++ /*$titres as $item*/){ ?>
    <h2> <?php echo $titres[$i] -> title; ?> </h2>
    <p>
    <?php 
     echo $titres[$i] -> description?> </p>
     <img src="<?php 
     echo $titres[$i] -> enclosure['url'] ?>">

    <p>
    <?php echo $titres[$i] -> pubDate ?> </p>

    <a href="<?php echo $titres[$i] -> link?>"><button >Lire l'article</button></a>
     
    <?php } ?>  


    <!-- Economie, politique, numerique, idées,  image : -->

    <img src="<?php
     echo $titres[$i] -> children( 'media', True )->content->attributes()['url']; ?>">


<input type="submit" href="<?php echo $titres[$i] -> link?>"><button >Lire l'article</button></input>



<!-- Au cas ou -->

<h1><?php echo $xml -> channel -> title ?></h1>
    <div><?php var_dump($xml)?></div>
    <div style="height:25vh"></div>
    <div>
        <h2><?php echo ($xml -> channel -> item[5] -> title)?></h2>
        <p><?php echo ($xml -> channel -> item[5] -> description)?></p>
        <img src="<?php echo $xml -> channel -> item[5] -> enclosure['url']?>">
        <p><?php echo ($xml -> channel -> item[5] -> pubDate)?></p>
        <a href="<?php echo $xml -> channel -> item[5] -> link?>"><button >Lire l'article</button></a>
    </div>
    <div style="height:25vh"></div>
    <div>