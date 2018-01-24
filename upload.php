<?php
	include_once 'header.php';
	
?>
			<div>
				<?php
					if(isset($_SESSION['u_id'])){
						echo'
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a id="active" href="upload.php">Uploads</a></li>
							<li><a href="play.php">Play</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>';
					}
				?>
			</div>
	</nav>
</header>
<section class="main-container">
	<div class="main-wrapper">
			
			<?php
				
				if(!isset($_SESSION['u_id'])){
					header("Location: signup.php");
					exit();

				}
			?>
			<h2>Upload Music</h2>
			<form class="upload-form" action="uploads/upload.inc.php" method="POST" enctype="multipart/form-data">
							
							<input type="text" name="author" placeholder="Author" maxlength="30" required/>
							
							<input type="text" name="title" placeholder="Music name" maxlength="30" required/>
							
							<input  id="up" type="file" name="audio" required>
						
							<button type ="submit" name="submit" >Upload</button>
							
			</form>
				
			
						
		
	</div>
	

</section>

<?php
	include_once 'footer.php';
?>
