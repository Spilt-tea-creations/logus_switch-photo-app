<?php

// if upload is pressed
if(isset($_POST['upload'])) {
	// the path to store the uploaded image
	$target = "images/".basename($_FILES['image']['name']);

	// connect to database
	$image = $_FILES['image']['name'];
	$text = $_POST['text'];

	$sql = "INSERT INTO images (image, text) VALUES ($image, $text)"
	mysqli_query($db, $sql); //stores the submitted data into he database table: imaages

	// now let's move the uploaded image into the folder: images
	if (move_uploaded_file($_FILES['tmp_name']['name'], $target)) {
		$msg = "Image uploaded successfully";
	} else {
		$msg = "There was a problem uploading image";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div id="content">
		<form method="POST" action="index.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<div>
				<input type="file" name="image">
			</div>
			<div>
				<input type="file" name="Filename">
			</div>
			<div>
				<input type="submit" name="upload" value="Upload Image">
			</div>
		</form>
	</div>
</body>
</html>
