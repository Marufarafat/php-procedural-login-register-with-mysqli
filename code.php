<?php include("templates/header.php"); ?>
		<div class="dex_code">
		
            <div class="top-login second">
                <div class="border">
                    <span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                </div>
            </div>
            
            <h3>Enter code</h3>
            <?php validate_code(); ?>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						<form action="#" method="post">
							<div class="icon1">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								<input type="text" name="code" placeholder="#########" required=""/>
							</div>
							<div class="bottom">
								<input type="submit" value="Continue" />
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
		<?php include("templates/footer.php"); ?>