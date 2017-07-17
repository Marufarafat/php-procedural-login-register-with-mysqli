<?php include("templates/header.php"); ?>
		<div class="dex_login">
		
            <div class="top-login first">
                <div class="border">
                    <span><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                </div>
            </div>
            
            <h2>Login Form</h2>
            <?php display_message(); 
                login_validate(); ?>
            <br>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						<form action="#" method="post">
							<div class="icon1">
								<i class="fa fa-user-o" aria-hidden="true"></i>
								<input  type="text" name="email" placeholder="Email" required=""/>
							</div>
							<div class="icon1">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								<input type="password" name="password" placeholder="password" required=""/>
							</div>
							<label class="anim">
								<input type="checkbox" name="remamber" class="checkbox">
								<span> Stay logged in </span> 
							</label>
							<a href="recover.php" class="forgot">forgot password?</a>
							<div class="bottom">
								<input type="submit" value="Login" />
							</div>
							<div class="header-left-top">
								<div class="sign-up"> <h5>or</h5> 
								<h4>Create an account <a href="register.php">Register</a></h4></div>
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
<?php include("templates/footer.php"); ?>