<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>
<form action="download.php">
  <input type="submit" value="Download CSV Form">
</form>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>