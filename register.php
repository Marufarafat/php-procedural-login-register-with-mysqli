<?php include("templates/header.php"); ?>		
		<div class="dex_register">
		
            <div class="top-login second">
                <div class="border">
                    <span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                </div>
            </div>
            
            <h3>register Form</h3>
            <p><?php registration_validate(); ?></p>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						<form action="#" method="post">
							<div class="icon1">
								<i class="fa fa-user-o" aria-hidden="true"></i>
								<input  type="text" name="first_name" placeholder="First Name" >
							</div>
							<div class="icon1">
								<i class="fa fa-user-o" aria-hidden="true"></i>
								<input  type="text" name="last_name" placeholder="Last Name" >
							</div>
							<div class="icon1">
								<i class="fa fa-user-o" aria-hidden="true"></i>
								<input  type="text" name="username" placeholder="Username" >
							</div>
							<div class="icon1">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<input type="email" name="email" placeholder="Your email" >
							</div>
							<div class="icon1">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								<input type="password" name="password" placeholder="Create password" >
							</div>
							<div class="icon1">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								<input type="password" name="confirm_password" placeholder="Confirm password" >
							</div>
							<div class="bottom">
								<input type="submit" value="Register" >
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
		<?php include("templates/footer.php"); ?>