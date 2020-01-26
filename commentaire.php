<?php

    session_start();

    if(isset($_POST['send']))
    {
        if (!empty($_POST['user_message'])) 
        {
            $_POST['user_message']=addslashes($_POST['user_message']);
            $link= mysqli_connect("127.0.0.1", "root", "", "livreor");
            $requete="INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES (NULL, '".$_POST['user_message']."', '".$_SESSION['id']."', NOW())";
            mysqli_query($link, $requete);
            header('location: livre-or.php');
        }
    }


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Code en Boite</title>
    <link rel="stylesheet" type="text/css" href="livreor.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow|Courgette&display=swap" rel="stylesheet">

</head>

<body class=" bodyconnexion " >

    <?php include('header.php'); ?>

    <section class="forminscri">
        
        <form action="commentaire.php" method="post">

            <br/>

            <div class="form__group field">
                <label for="msg">Votre message :</label>
                <br/>
                <br/>
                <input type="text" id="msg" class="form__field" name="user_message" required>
            </div>

            <br/>
            <br/>

            <div class="form__group field">
                <input type="submit" class="submit" name="send" value="Envoyer">
            </div>

        </form>

    </section>
    
</body>

</html>