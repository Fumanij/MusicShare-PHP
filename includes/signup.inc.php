<?php
	if(isset($_POST['submit'])){
		
		include_once 'dbh.inc.php';
		
		$first=mysqli_real_escape_string($conn, $_POST['first']);
		$last=mysqli_real_escape_string($conn, $_POST['last']);
		$email=mysqli_real_escape_string($conn, $_POST['email']);
		$uid=mysqli_real_escape_string($conn, $_POST['uid']);
		$pwd=mysqli_real_escape_string($conn, $_POST['pwd']);
		$theme=mysqli_real_escape_string($conn, 'Black');
		
		//Hibakezelés
		//Figyeli az üres mezőket
		
		if(empty($first)|| empty($last)|| empty($email)|| empty($uid)|| empty($pwd)){
			header("Location:../signup.php?signup=empty");  //visszaküldi a választ hogy üres
			exit();
		}else{
															//Ellenőrzi, hogy a karakterek jók e 
			if(!preg_match("/^[a-zA-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ]*$/", $first) || !preg_match("/^[a-zA-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ]*$/", $last)){
				header("Location:../signup.php?signup=invalid");  
				exit();
			}else{
				//Megnézi hogy jo ez az email
				if(filter_var($email,FILTER_VALID_EMAIL)){
					header("Location:../signup.php?signup=email");  
					exit();
				}else{
					$sql="SELECT *FROM users WHERE user_uid='$uid'";
					$result=mysqli_query($conn,$sql);
					$resultCheck=mysqli_num_rows($result);
					
					if($resultCheck>0){
						header("Location:../signup.php?signup=usertaken");  
						exit();
					}else{
						//jelszó Hashelése-titkosítás
						$hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
						
						//adatok feltöltése az adatbázisba
						$sql="INSERT INTO users (`user_first`,`user_last`, `user_email`, `user_uid`, `user_pwd`, `user_theme`)
							VALUES('$first','$last','$email','$uid','$hashedPwd','$theme');";
						mysqli_query($conn,$sql);
						header("Location:../signup.php?signup=success");  
						exit();
						
					}
				}
			}
		}
		
	}else{
		header("Location:../signup.php");
		exit();
	}
?>