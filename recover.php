<?php include("templates/header.php"); ?>
		<div class="dex_login">
		
            <div class="top-login first">
                <div class="border">
                    <span><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                </div>
            </div>
            
            <h2>Recover Password</h2>
            <?php display_message(); 
                recover_validate(); ?>
            <br>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						<form action="#" method="post">
							<div class="icon1">
								<i class="fa fa-user-o" aria-hidden="true"></i>
								<input  type="text" name="email" placeholder="Email" required=""/>
							</div>
							<div class="bottom">
								<input type="submit" value="Recover" />
							</div>
								<input type="hidden" name="token" value="<?php token_genarator(); ?>">
						</form>	
					</div>
				</div>
			</div>
		</div>
<?php include("templates/footer.php"); ?>