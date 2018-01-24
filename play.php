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
							<li><a id="active" href="play.php">Play</a></li>
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
		<h2>Play Music</h2>
		<div id="page">
			
			<table>
				<tr>
					<td id="cim" >
					ARTIST | Music Name
					</td>
					<td >
					<audio controls autoplay>
						 <source src="uploads/musics/<?php $a=$_POST['submit']; echo $a; ?>.mp3" type="audio/mp3">
					</audio>
					</td>
				</tr>
				<tr>
				<td id="now" >
					<?php echo '&nbsp > '.'<i>'.$a.'</i>'; ?>
				</td>
				
				</tr>
			</table>
			</div>
			<div id="lista">
			<table>
				
						<?php
							include 'includes/dbh.inc.php';
							if($result=$conn->query("SELECT author,title FROM music")){
								if($result->num_rows){
									$table=$result->fetch_all(MYSQLI_NUM);
									
									foreach($table as $row){
										echo '<tr>';
										$link="";
										foreach($row as $record){
											
											if($link==""){
												$link.= $record;
											}else{
												$link.="-";
												$link.=$record;
											}
										}
										
										echo '<td><form method="POST" action="play.php">
											<button type="submit" name="submit" value="'.$link.'" >'.$link.'</button></form>';
										echo '</td>';
									}
									echo '</form></tr>';
	
								}else{
									echo '<tr><td>We do not have playable musics</td></tr>';
								}
							}
							$result->free();
		
						?>
				
					
			</table>
			
		</div>
	
	</div>
	
<?php
	require_once('footer.php');
?>	

