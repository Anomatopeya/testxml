<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/template/css/style.css">
</head>
<body> 
	<form action="/import" method="post" enctype="multipart/form-data">
		<input type="file" name="uploadfile">
		<input type="submit" value="Upload">
	</form>
	<ul class="makesList">
	<?php foreach ($makesList as $key => $make) {?>
		<li class="makeLi"> <a href="#" class="make" data-model="<?php echo $make['id'];?>"><?php echo $make['make'];?></a></li>
	<?php } ?>
	</ul>
</body>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="/template/js/js.js"></script>
</html>