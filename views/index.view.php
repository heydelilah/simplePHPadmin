<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="styles/main.css">
</head>
<body>
	<input name="publish"  type="button"  id="btn" value="Upload" onclick="window.open('upload.php')"/>

	<?php if($info['id']): ?>
		<p>id: <?=$info['id']?></p>
		<p>username: <?=$info['username']?></p>
		<p>password: <?=$info['password']?></p>
		<p>host: <?=$info['host']?></p>
		<p>title: <?=$info['title']?></p>
		<p>banner: <?=$info['banner']?></p>
		<p>banner_text: <?=$info['banner_text']?></p>
		<p>telephone: <?=$info['telephone']?></p>
		<p>footer_left: <?=$info['footer_left']?></p>
		<p>footer_right: <?=$info['footer_right']?></p>
	<?php else: header("Location: http://www.biddingx.com/") ?>
	<?php endif ?>

</body>
</html>
