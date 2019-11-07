<?php
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/jpeg")) && ( ($_FILES["file"]["size"] /1024)< 10000) && ($_POST["caption"] != null))
{
if ($_FILES["file"]["error"] > 0)
{
echo "Error: " . $_FILES["file"]["error"] . "<br />";
}
else
{     

require_once('../connection.php');
if(!$conn){
	echo "connection ERROR!";
}else{
	echo "connection successed";
	move_uploaded_file($_FILES["file"]["tmp_name"], "slide_upload/" . $_FILES["file"]["name"]);
	$photo_name = $_FILES["file"]["name"];
	$caption = $_POST["caption"];
	$savedate = $_POST["savedate"];
	$actualpath = "http://localhost/LMS/admin/slide_upload/$photo_name";
	
	$photo_insert = "insert into slide_photo (photo_url,upload_date,caption) VALUES (?,?,?)";
	$stmt = $conn->prepare($photo_insert);
	$stmt->bind_param("sss",$actualpath,$savedate,$caption);
	$stmt->execute();
	
	if($stmt){
		header("location:upload_photo_layout.php");
		$stmt->close();
		$conn->close();
	}else{
		echo "Slide photo Insert ERROR";
	}
}

}
}
else
{    echo "Invalid file"; }
?>
