<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLogin.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->
        <a href="./loginAccount.php"><h2 class="noactive"> Sign In </h2></a>
        <a href="createAccount.php"><h2 class="active">Sign Up </h2></a>

        <!-- Icon -->
        <div class="fadeIn first">
        <img src="./img/twitter.png" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form method ="POST">
        <input type="text" id="login" class="fadeIn second" name="username" placeholder="Votre nom d'utilisateur">
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="Votre mot de passe">
        <input type="submit" class="fadeIn fourth" value="créer un compte">
        </form>


        <?php
            include "./database.php";
            $db = Database::connect();

            if ($_POST) { // Si le formulaire a été soumis par l'utilisateur
                $sql = "INSERT INTO `user` (username, password) VALUES ('{$_POST['username']}', '{$_POST['password']}')";
                $db->query($sql); // Ajoute la liste en BDD

                // Redirige l'utilisateur vers le fichier 'index.php'
                //header("Location: index.php");
            }
            Database::disconnect();

        ?>
    </div>
    </div>
</body>
</html>



