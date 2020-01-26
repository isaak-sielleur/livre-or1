<?php 
session_start();
if (isset($_GET['deco'])) 
{
    session_destroy();
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>


<head>
    <title>Code en Boite</title>
    <link rel="stylesheet" type="text/css" href="livreor.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow|Courgette&display=swap" rel="stylesheet">
</head>


<body class="bodyindex">

    <?php include('header.php'); ?>

    <section class="sectionpres">
        <br/>
        <br/>
        <br/>
        <p class="titrepres">Bienvenue sur mon Livre d'Or</p>
        <p>Vous avez été satisfait·e·s du rendu de mon travail ?</p>
        <p>Vous souhaitez partager votre experience ?</p>
        <p>Alors vous etes au bon endroit, ici vous pourrez laisser des commentaires accessibles a tous, positifs ou négatifs, peut importe.</p>
    </section>

</body>

</html>