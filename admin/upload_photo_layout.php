<?php
 include('admin_nav.php');
 date_default_timezone_set("Asia/Rangoon");
 ?>
<!--image preview before upload-->
<html>
<head>
<meta name="theme-color" content="#01579b">
<link rel="stylesheet" href="css/upload_form.css">
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css"/>
</head>
<body>
 <div class="content-wrapper">
	<center>
	<h2><i class="fa fa-picture-o" style="margin-right:10px;" ></i>Wall photo upload.....</h2>
	<div class="upload_form">
	<form action="upload_photo_process.php" method="post" enctype='multipart/form-data'>
		<input type="hidden" name="savedate" value="<?php echo date("y/m/d"); ?>">
		<image id="image" src="">
		<input type="file" name='file'  accept="image/x-png,image/jpeg" id="file" onchange="showImage.call(this)" class="input_file" >
		<label for="file" id="choose_photo"><i class="fa fa-cloud-upload" title="Click here to upload image"></i></label><br>
		<input type="text" name="caption" placeHolder="Enter photo caption......" required/>
		</div>
		<input class="btn" type="submit" value="Upload">
		<a href="upload_photo_layout.php"><input class="btn" type="Button" value="Reset"></a>
	</form>
	</center>
</div>
<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Learning Management System 2018</small>
        </div>
      </div>
    </footer>
	<script>
		function showImage(){
			if(this.files && this.files[0]){
				var obj = new FileReader();
				obj.onload = function(data){
					var image = document.getElementById("image");
					image.src = data.target.result;
					image.style.display = "block";
					
					var label =  document.getElementById("choose_photo");
					label.style.display = "none";
				}
				obj.readAsDataURL(this.files[0]);
			}
		}
	</script>
	</body>
</html>