<?php

    session_start();

    function chiffre($mdp)
    {
        $mdp="azerty".$mdp."cvbn";
        $mdp=hash('sha256',$mdp);
        return $mdp;
    }

    if(isset($_POST['modif']))
    {
        if(!empty($_POST['pseudo']))
        {

            $link= mysqli_connect("127.0.0.1", "root", "", "livreor");

            $requete="SELECT * FROM utilisateurs WHERE login = '".$_POST['pseudo']."'";
            $query= mysqli_query($link, $requete);
            $resultat= mysqli_fetch_all($query, MYSQLI_ASSOC);


            if(empty($resultat))
            {

                $requete= "UPDATE utilisateurs SET login = '".$_POST['pseudo']."' WHERE id=".$_SESSION['id']." ";
                $query= mysqli_query($link, $requete);
                $_SESSION['login'] = $_POST['pseudo'];
            }
            else
            {
                $err="Ce login est déjà utilisé, veuillez en choisir un autre";
            }    
        }

        if(!empty($_POST['password']))
        {
            $link= mysqli_connect("127.0.0.1", "root", "", "livreor");

            $password=chiffre($_POST['password']);
            $requete= "UPDATE utilisateurs SET password = '".$password."' WHERE id=".$_SESSION['id']." ";
            $query= mysqli_query($link, $requete);
        }
        if(!isset($err))
        {
            header('location: profil.php');
        }
    }
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

    <section class="forminscri">

    <form action="profil.php" method="post">

        <br/>

        <div class="form__group field">
            <label for="name">Votre nouvel identifiant :</label>
            <br/>
            <br/>
            <input type="text" id="name" class="form__field" name="pseudo" value=<?php echo $_SESSION['login'] ?>>
        </div>

        <br/>
        <br/>

        <div class="form__group field">
            <label for="password">Votre nouveau mot de passe :</label>
            <br/>
            <br/>
            <input type="password" id="password" class="form__field" name="password">
        </div>

        <br/>
        <br/>
        
        <div class="form__group field">
            <input type="submit" class="submit" name="modif" value="Modifier">
        </div>

    </form>
    <?php if(isset($err))
    {
        echo $err;
    }
    ?>
</section>

</body>

</html>