<?php include("templates/header.php"); ?>
		<div class="dex_login">

          
          <?php
                display_message();
            
            if(user_logged_in()){
                echo "User Logged in.";
                echo "<br>";
                echo '<a href="logout.php">Log out.</a>';
                
                
            } else {
                redirect("login.php");
            }
            ?>

		</div>
		<?php include("templates/footer.php"); ?>