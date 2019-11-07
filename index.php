<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/slide-style.css"/>
	<link rel="stylesheet" href="myanmarUnicode.css"/>
</head>
<body>

<script>
	document.getElementById("home").className+=" active";
</script>

<?php
include_once('nav.php');
include_once('connection.php');

$select_photo = "select photo_url,upload_date,caption from slide_photo order by id desc limit 4";
$result = $conn->prepare($select_photo);
$result->execute();
$result->bind_result($photo_url,$upload_date,$caption);

$photo_url_array = array();
$caption_array = array();
for($i=0; $row = $result->fetch(); $i++){
	$photo_url_array[$i] = "$photo_url";
	$caption_array[$i] = "$caption";
}
?>

<div class="row">
  <div class="leftcolumn">
    <div class="card" style="height:610px;">
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <div class="img1" style="background-image:url('<?php echo "$photo_url_array[0]";?>');"></div>
  <div class="text"><?php echo "$caption_array[0]";?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <a href="cu.jpeg"><div class="img2" style="background-image:url('<?php echo "$photo_url_array[1]";?>');"></div></a>
  
  <div class="text"><?php echo "$caption_array[1]";?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <div class="img3" style="background-image:url('<?php echo "$photo_url_array[2]";?>');"></div>
  
  <div class="text"><?php echo "$caption_array[2]";?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <a href="#"><div class="img4" style="background-image:url('<?php echo "$photo_url_array[3]";?>');"></div></a>
  <div class="text"><?php echo "$caption_array[3]";?></div>
</div>
<div style="text-align:center;margin-top:-30px;z-index:20;">
  <span class="dot" onclick=""></span> 
  <span class="dot" onclick="show(1)"></span> 
  <span class="dot" onclick="show(2)"></span> 
  <span class="dot" onclick="show(3)"></span> 
</div> 
</div>
    </div>
    <div class="card myanmarUni">
      <h2>TITLE HEADING</h2>
      <h5>Title description, Jun 18, 2018</h5>
      <div class="fakeimg" style="height:200px;">Image</div>
      <p>Some text..</p>
      <p>AI is one of the newest sciences. Work started in earnest soon after World War 11, and
the name itself was coined in 1956. Along with molecular biology, A1 is regularly cited as
the "field I would most like to be in" by scientists in other disciplines. A student in physics
might reasonably feel that all the good ideas have already been taken by Galileo, Newton,
Einstein, and the rest. AI, on the other hand, still has openings for several full-time Einsteins. </p>
    </div>
  </div>
  <div class="rightcolumn myanmarUni">
    <div class="card">
      <h2>About</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about our page</p>
    </div>
    <div class="card">
      <h3>Popular Post</h3>
      <div class="fakeimg"><p>Image</p></div>
      <div class="fakeimg"><p>Image</p></div>
      <div class="fakeimg"><p>Image</p></div>
    </div>
    <div class="card">
      <h3>Follow us</h3>
      <p>Some text..</p>
    </div>
  </div>
</div>
	<?php  include_once("footer.php"); ?> 
			

<script>
var slideIndex = 0;
showSlides();

showImg();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
}


</script>
</body>
</html>

