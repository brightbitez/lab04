<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
<?php echo '<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />'; ?>
<?php echo '<link href="style.css" rel="stylesheet" type="text/css" />'; ?>
<?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
            echo "Sorry, there was an error uploading your file.";
    }
    

//back button
?>
<form method="post">
    <input type="submit" name ="back"value="Back" /><br/>
</form>

<?php

function getback()
{
    header("Location: /index.php");
    exit;
}
if(array_key_exists('back',$_POST)){
   getback();
}
?>


</body>
</html>


