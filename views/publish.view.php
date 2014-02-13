<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
	<link rel="stylesheet" href="styles/publish.css">
</head>
<body>
	<h1>Upload</h1>
	<form action="publish.php" method="post">
		<li>
			<label for="username">username:</label>
			<input type="text" name="username">
		</li>
		<li>
			<label for="password">password:</label>
			<input type="password" name="password">
		</li>
		<li>
			<label for="host">host:</label>
			<input type="text" name="host">
		</li>
		<li>
			<label for="logo">logo:</label>
			<input type="text" name="logo">
		</li>
		<li>
			<label for="telephone">telephone:</label>
			<input type="text" name="telephone">
		</li>
		<li>
			<label for="footer_left">footer_left:</label>
			<input type="text" name="footer_left">
		</li>
		<li>
			<label for="footer_right">footer_right:</label>
			<input type="text" name="footer_right">
		</li>
		<li>
			<input type="submit" value="Add">
		</li>
	</form>

	<!-- 如果没有填充完表单就提交，提示错误 -->
	<?php if(isset($status)): ?>
	<p><?=$status;?></p>
	<?php endif; ?>

</body>
</html>