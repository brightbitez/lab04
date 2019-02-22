<!DOCTYPE html>
<html>
<head>
	<title>
  
	</title>
</head>
<body>
  

<?php

$name = $email ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['name'])||isset($_POST['email'])) {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
 
</form>
<form method="post">
    <input type="submit" name ="validate"value="Validate" /><br/>
</form>
<?php 
if(array_key_exists('validate',$_POST)){
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "invalid email";
}
}

?>



<?php echo '<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />'; ?>
<?php echo '<link href="style.css" rel="stylesheet" type="text/css" />'; ?>


Exchange THB to JPY<br/>
Instructions by step: <br/>
1)Download the sample CSV File below 
<form action="download.php">
  <input type="submit" value="Download CSV Form">
</form>
2)Rename your edited file to edited.csv then upload your edited CSV File below 
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select CSV file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
    
<?php
function deleteExisted()
{
  $myFile = "uploads/edited.csv";
  unlink($myFile);
}
if(array_key_exists('submit',$_POST)){
   deleteExisted();
}
?>
</form>
3)Press Exchange Button down below <br>

<form method="post">
    <input type="submit" name ="exchange"value="Exchange" /><br/>
</form>
You will get JPY: <br><br>
<?php
function calculateJpy(){
  if(file_exists('uploads/edited.csv')){
  $f_pointer=fopen("uploads/edited.csv","r");
  $ar=fgetcsv($f_pointer);
  $amount = $ar[0]*$ar[1];
  print $amount;
}
  else{
    echo 'Upload your edited.csv file first';
  }
}
if(array_key_exists('exchange',$_POST)){
  calculateJpy();
}
?>
<form method="post">
    <input type="submit" name ="checkvalid"value="submit" /><br/>
</form>
<?php 
if(array_key_exists('checkvalid',$_POST)){
  echo "Thankyou for exchanging money";
}?>

</body>
</html>