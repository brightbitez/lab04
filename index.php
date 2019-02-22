<!DOCTYPE html>
<html>
<head>
	<title>
  
	</title>
</head>
<body>
<?php echo '<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />'; ?>
<?php echo '<link href="style.css" rel="stylesheet" type="text/css" />'; ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<?php
$error = '';
$name = '';
$email = '';
function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}
if(isset($_POST["validate"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please enter your name.</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Invalid name</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please enter your email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email</label></p>';
  }
 }
}?>

<form method="post">
<?php echo $error; ?>
Name:<input type="text" name="name" value="<?php echo $name; ?>" />
Email:<input type="text" name="email" value="<?php echo $email; ?>" />
<input type="submit" name="validate" class="" value="Validate" />

</form>


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
}
?>

</body>
</html>