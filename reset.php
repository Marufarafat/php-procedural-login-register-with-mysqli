<?php include("templates/header.php"); ?>
		<div class="dex_login">
		
            <div class="top-login first">
                <div class="border">
                    <span><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                </div>
            </div>
            
            <h2>Reset Password</h2>
            <?php display_message(); 
                reset_validate(); ?>
            <br>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						<form action="#" method="post">
							<div class="icon1">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								<input  type="password" name="password" placeholder="Password" required=""/>
							</div>
							<div class="icon1">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								<input  type="password" name="confirm_password" placeholder="Confirm Password" required=""/>
							</div>
							<div class="bottom">
								<input type="submit" value="Reset Password" />
							</div>
				            <input type="hidden" name="token" value="<?php token_genarator(); ?>">
						</form>	
					</div>
				</div>
			</div>
		</div>
<?php include("templates/footer.php"); ?>