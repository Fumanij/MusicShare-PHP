<?php
	include_once 'header.php';
	
?>
			<div>
				<?php
					if(isset($_SESSION['u_id'])){
						echo'
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="upload.php">Uploads</a></li>
							<li><a href="play.php">Play</a></li>
							<li><a id="active" href="contact.php">Contact</a></li>
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
		
	<h2>Contact me</h2>	
	<form class="email-form" action="includes/contact.inc.php" method="post">												
	
				<select name="subject" size="1" >
					<option value="Help">Help</option>
					<option value="Problem">Problem</option>
					<option value="Question">Question</option>
				</select>
				<input type="email" name="email" placeholder="Your Email"/>
				<textarea name="message" maxlength="512" placeholder="Message "></textarea>
			

				<button type="submit" name="submit">Send Email</button>
	
	</form>
	</div>
	

</section>

<?php
	include_once 'footer.php';
?>
