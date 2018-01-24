<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="description" content="Download or upload musics and play">
        <meta name="keywords" content="play,music,upload,download,fun,listening">
        <meta name="author" content="Daniel Bicskei">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MusicShareCommunity</title>
	<link href="styles/<?php include 'includes/dbh.inc.php';
							$id=($_SESSION['u_id']);
							$global_id;
							if($result=$conn->query("SELECT user_theme FROM users WHERE user_id='$id'")){
								if($result->num_rows){
									$table=$result->fetch_all(MYSQLI_NUM);
									foreach($table as $row){
										
										
										foreach($row as $record){
											
											echo $record;
											$global_id=$record;
										}
									}
								}else{
									echo "black";
								}
							}
							$result->free();  ?>.css" rel="stylesheet" type="text/css">
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
					if(isset($_SESSION['u_id'])){
						echo'
							<form action="includes/logout.inc.php" method="POST">
							<label for="name">Hi '.$_SESSION['u_first'].'!</label>
							<button type="submit" name="submit">Logout</button>
							</form>';
						
					}else{
						echo '<form action="includes/login.inc.php" method="POST">
								<input type="text" name="uid" placeholder="Username/e-mail">
								<input type="password" name="pwd" placeholder="password">
								<button type="submit" name="submit">Login</button>
							</form>';
								
					}
				?>
				
				
			</div>
			
			
	
			
			
	