<?php
if(isset($_POST['submit'])){
	$to = "contact@danielbicskei.com";
	$subject = $_POST['subject'];
	$message = "
	<html>
	<head>
	<title>".$_POST['subject']."</title>
	</head>
	<body>
	From:".$_POST['email']."
	<p>".$_POST['subject']."</p>
	".$_POST['message']."
	</body>
	</html>";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <probaalk@gmail.com>' . "\r\n";

	
	mail($to,$subject,$message,$headers);
        header("Location: ../contact.php?email=success");
}else{
	header("Location: ../contact.php?email=error");
}
?>