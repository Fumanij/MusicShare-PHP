<footer>
	<form action="styles/theme.inc.php" method="POST">
				<?php
				$selected1="";
				$selected2="";										/*Megnézi hogy melik volt az alapértelmezett style és beállitja a listába kiválasztottnak*/
				$selected3="";
				switch($global_id){
					case("Black");
						$selected1="selected";
						break;
					case("Yellow");
						$selected2="selected";
						break;
					case("Rose");
						$selected3="selected";
						break;
									
				}
				
				
				echo '<select size="1" name="style">
				<option value="Black" '.$selected1.'>Black</option>	
				<option value="Yellow" '.$selected2.'>Yellow</option>
				<option value="Rose" '.$selected3.'>Rose</option>
				</select>
				<button type="submit">USE</button>';
				?>
	</form>
	2018<br/>
	Daniel Bicskei
</footer>

</body>
</html>
