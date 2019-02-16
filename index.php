<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>

Name: <input type="text" name="name"><br>

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
You will get JPY:
<?php
function calculateJpy(){
  $f_pointer=fopen("uploads/edited.csv","r"); // file pointer
  $ar=fgetcsv($f_pointer);
  $amount = $ar[0]*$ar[1];
  print $amount;
}
if(array_key_exists('exchange',$_POST)){
  calculateJpy();
}
?>


</body>
</html>