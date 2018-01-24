<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <meta name="description" content="Download or upload musics and play">
        <meta name="keywords" content="play,music,upload,download,fun,listening" >
        <meta name="author" content="Daniel Bicskei">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MusicShareCommunity</title>
	<link href="styles/Black.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			
				<a href="index.php">Share Music Community<img src="styles/header-music.png" "
				height="37px;"></a>
			
			
			<div class="nav-login">
				
				<?php
					echo '<form action="includes/login.inc.php" method="POST">
								<input type="text" name="uid" placeholder="Username/e-mail">
								<input type="password" name="pwd" placeholder="password">
								<button type="submit" name="submit">Login</button>
							</form>';
								
					
				?>
				
				
			</div>
			
			
	
			
			
	