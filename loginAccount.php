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
        <a href="./loginAccount.php"><h2 class="active"> Sign In </h2></a>
        <a href="./createAccount.php"><h2 class="noactive">Sign Up </h2></a>


        <!-- Icon -->
        <div class="fadeIn first">
        <img src="./img/twitter.png" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form method="POST">
        <input type="text" id="login" class="fadeIn second" name="username" placeholder="Votre nom d'utilisateur">
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="Votre mot de passe">
        <input type="submit" class="fadeIn fourth" value="Se connecter">
        </form>
    </div>
    </div>
    <?php 
        include "./database.php";
        $db = Database::connect();
        $success = false;
        if ($_POST) {
            echo "post <br>";
            foreach ($db->query("SELECT * FROM user") as $user) { 
                if ($user['username']==$_POST['username'] && $user['password']==$_POST['password'])
                {
                    $success = true;
                    echo "<br> login succesful";
                    header("Location: ./index.php?username=" .$user['username']);
                }
            }
            if (!$success) {
                echo "<br>username or password is incorrect";
            }
        }
         Database::disconnect();
    ?>
    
</body>
</html>



