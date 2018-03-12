<?php
	include_once 'header.php';
	
?>
			<div>
				<?php
					if(isset($_SESSION['u_id'])){
						echo'
						<ul>
							<li><a id="active" href="index.php">Home</a></li>
							<li><a href="upload.php">Uploads</a></li>
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
				
	<h2>Welcome to my page!</h2>
	<div id="dis">
		
		<h1>How to use the site:</h1>
		 <ol>
			<li> Can browse and play musics on the Play site.</li>
			<li> Can upload musics on the Upload site.</li>
			<li> If you have any problem or question you can send email to me on the Contact site.</li>
			<li> If you don't like the style of page you can change it below.</li>
		</ol>
		
		<br/>
		I made this page for practice and just for fun. I would like to make something new.<br/>
		More info on my contact page: <a href="http://www.danielbicskei.com/">danielbicskei.com</a><br/><br/>
		When you upload a music, the program saves the details to a database. The playlist uses the database to get back details.  
		<br/><br/>Good browse and have fun!
		
	</div>
	

</section>

<?php
	include_once 'footer.php';
?>
