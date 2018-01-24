<?php
	session_start();
	if(isset($_POST['submit']))
	{
		
		// audio
		
		//$error=array();
		$van=true;
		
		if(empty($_POST['author']) || empty($_POST['title'])){
			$van=false;
			//array_push($error,"üres a szerző és/vagy cím");
			header("Location:../upload.php?upload=errorempty");		
		}
		
		
		$type=pathinfo($_FILES['audio']['name'],PATHINFO_EXTENSION);
		$_FILES['audio']['name']=strtoupper($_POST['author']).'-'.$_POST['title'].".".$type;    		//elnevezzük az új fájlt
		
		
		if(!($type=="mp3" )){
			$van=false;
			//array_push($error,"Csak mp3 engedélyezett");
			header("Location:../upload.php?upload=errortype");			
		}
		if($_FILES['audio']['size']>10000000){
			$van=false;
			//array_push($error1,"A zene nem lehet nagyobb, mint 10 MB");
			header("Location:../upload.php?upload=errorsize");
		}
		if(file_exists("musics/".$_FILES['audio']['name'])){
			$van=false;
			//array_push($error,"A fájl már létezik");
			header("Location:../upload.php?upload=errorexist");
		}
		if($van){
			move_uploaded_file($_FILES['audio']['tmp_name'],"musics/".$_FILES['audio']['name']);
			
			
			// upload to the database
		
			include_once '../includes/dbh.inc.php';
		
			$title=mysqli_real_escape_string($conn,$_POST['title']);
			$author=mysqli_real_escape_string($conn,strtoupper( $_POST['author']));
			$user=$_SESSION['u_id'];
		
			$sql="INSERT INTO music (`author`,`title`,`date`,`user`)
					VALUES('$author','$title',NOW(),'$user');";
			if(mysqli_query($conn,$sql)){
				header("Location:../upload.php?upload=".$type."success");  
			}
			exit();
		
		}	

	}
	
		
		
		
		
?>		