<?php
    
    include "./database.php";

    $db = Database::connect();
    $targetDir = "upload/";
    $uploadOk = 1;
    
    
    if (isset($_POST["submit"])){
        echo "<br> post: " . $_POST['username'];
        // store content in db
        $sql = "INSERT INTO `post` (content) VALUES ('{$_POST['text']}')";
        $db->query($sql);
        
        $target_file = $targetDir . basename($_FILES["fileToUpload"]["name"]);
        echo "<br>target_file: " . $target_file;
        $fileExtension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large: " . $_FILES["fileToUpload"]["size"] . "<br>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        echo "<br> imageFileType: " . $imageFileType;
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "only JPG, JPEG & PNG files are allowed: " . "<br>" . $imageFileType;
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 1){
            if(!is_dir($targetDir)){
                mkdir($targetDir);
            }
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                $query="INSERT INTO `image` (path , name) VALUES  ('{$target_file}', '{$_FILES["fileToUpload"]["name"]}')";
                echo "<br> query: " . $query . " ";
                $db->query($query);
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        header("Location: ./index.php?username=" . $_POST['username']);
    }
    Database::disconnect();
?>