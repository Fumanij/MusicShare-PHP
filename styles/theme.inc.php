<?php
	
	if(isset($_POST['style'])){
		session_start();
		require_once'../includes/dbh.inc.php';
		$id=($_SESSION['u_id']);
		$sql="UPDATE users SET user_theme='".$_POST['style']."' WHERE user_id='".$_SESSION['u_id']."';";
		mysqli_query($conn,$sql);
		header("Location:../index.php?success=style");
		$conn = null;
	}else{
		header("Location:../index.php?error=style");
	}


?>