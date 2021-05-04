<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styleindex.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        include "./database.php";
        $db = Database::connect();
        $connect = false;
        if ($_GET){
            $name = $_GET['username'];
            $connect = true;
        }
        if ($_POST) {
            $sql = "INSERT INTO `post` (content) VALUES ('{$_POST['text']}')";
            $db->query($sql);
        }
        Database::disconnect();
    ?>

  <div>
    <div class="sana">
        <div class="header">
            <h1> <?php echo "Bienvenue ". $name; ?> </h1>
            
        </div>
        <div class="buttons">
            <?php if ($connect == true){ ?>
                <a href="./loginAccount.php" class="myButton">Déconnecter</a>
           <?php }
            else { ?>
                <a href="./loginAccount.php" class="myButton">Connecter</a>
           <?php }
            
            ?>
        </div>
    </div>

    <div class="wrap">
    <div class="search">
        <form  method = "POST">
            <div class="search">
                <input name="text" type="text" class="searchTerm"  placeholder="What's happening?">
                <div class="upload">
                    <i class="fas fa-images"></i>
                    <button type="submit" class="myButton">Tweet</button>
                 </div>
            </div>
        </form>
    </div>
    </div>
 <?php
    foreach ($db->query("SELECT * FROM `post` ") as $post) { ?>
        <div id="login-container">
        <div class="profile-img"></div>
        <h1>
            <?php echo $name; ?>
        </h1>
        <div class="img_tweet">
           
        </div>
        <div>
            <img src="./img/twitter.png" width=100px alt="">
        </div>
        <div class="description">
           <?php  echo $post['content']?>
        </div>
        
        <a href="#" class="myButton">Voir le tweet</a>
        <footer>
            <div class="likes">
                <p><i class='fa fa-heart'></i></p>
                <p>1.5K</p>
            </div>
            <div class="projects">
                <p>Projects</p>
                <p>154</p>
            </div>
        </footer>
    </div>

   <?php } ?> 


</body>
</html>