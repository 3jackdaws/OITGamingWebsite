<?php
	include_once("/var/www/php/sql_connect.php");
	if($token[0] === "$")
	{
		$uid = getUserIDFromToken($token);
		$result = getHunterStats($uid);

		#User is not participating
		if(!isset($result))
		{
			echo "<center><button class='btn btn-default btn-lg' onclick='addUserToEvent()'>Participate in the Event</button>";
		}
		#user has already entered
		else
		{
			?>

				<div class="jumbotron">
					<div class="container">

						<div class="row">
							<div class="col-lg-3">
								<center>
									<img src="<?=$result[3]?>" style="width: 200px; height: 200px;">
									<br>
									<br>
									<form role="form" action="index.php" method="POST" enctype="multipart/form-data">
										<input class="btn" type="file" name="hpic">
										<br />
										<button class="btn btn-default">Confirm Choice</button>
										<div id="picerr"><?=$img_text?></div>
									</form>
									
								</center>
							</div>
							<div class="col-lg-9" style="">
								<h1>You:</h1>
								<div class="col-lg-4">
									<h3>
										Name:
										<br>
										Player ID:
										<br>
										Current Score:
									</h3>
								</div>
								<div class="col-lg-8">
									<h3>
										<?=$result[1]?>
										<br>
										<?=$result[2]?>
										<br>
									 	<?=$result[6]?>
								</div>
									
							</div>
						</div>
					</div>
				</div>
				<div class="jumbotron">
					<div class="container">

						<div class="row">
							<div class="col-lg-3">
								<center>
									<img src="<?=$result[3]?>" style="width: 200px; height: 200px;">
								</center>
							</div>
							<div class="col-lg-9" style="">
								<h1>Your Quarry:</h1>
								<div class="col-lg-4">
									<h3>
										Name:
										<br>
									</h3>
								</div>
								<div class="col-lg-8">
									<h3>
										<?=$result[1]?>
										<br>
										<?=$result[2]?>
										<br>
									 	<?=$result[6]?>
								</div>
									
							</div>
						</div>
					</div>
				</div>
			<?php
		}
		
	}
	else
	{
		echo "<center><button class='btn btn-default btn-lg' style='width: 150px'>Sign in</button>";
	}

	






?>