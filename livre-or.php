<?php

    session_start();

    $link= mysqli_connect("127.0.0.1", "root", "", "livreor");
    $query= mysqli_query($link, "SELECT commentaire, date, login FROM `commentaires`INNER JOIN `utilisateurs` on commentaires.id_utilisateur = utilisateurs.id order by date desc");
    $resultat= mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Code en Boite</title>
    <link rel="stylesheet" type="text/css" href="livreor.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow|Courgette&display=swap" rel="stylesheet">

</head>

<body class=" bodyindex " >

    <?php include('header.php'); ?>

    <section class="sectioncomm">
        <?php foreach($resultat as $commentaires): ?>
        <div class="divcomm">
            <p class="borderinterne">Posté le <?=$commentaires['date']?> par <?=$commentaires['login']?> :</p>
            <p><?=$commentaires['commentaire']?></p>
        </div>
        <?php endforeach; ?>
    </section>
    
</body>

</html>