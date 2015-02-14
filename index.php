<?php include 'database.php' ; ?>
<?php 

	//create the select query
	$STH = $DBH->prepare("SELECT * FROM shouts");

	$STH->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SHOUT IT!</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script src="js/jquery-1.11.1.min.js" type="text/javascript" ></script>
</head>
<body>
	<div class="container">
		<div class="row all">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>SHOUT IT! Shoutbox</h3>
					</div>
					<div class="shouts">
						<div class="panel-body">
							<ul class="list-group">
								<?php while ($row = $STH->fetch(PDO::FETCH_ASSOC)) { ?>
										<li class="list-group-item"><span><?php echo $row['time'] ?> - </span><strong><?php echo $row['user'] ?>:</strong> <?php echo $row['message'] ?></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="panel-footer">
						<?php if (isset($_GET['error'])) { ?>
								<div class="alert alert-danger">
									<?php echo $_GET['error'] ; ?>
								</div>
						<?php } ?>
						<form action="process.php" method="post">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<input type="text" class="form-control" name="user" placeholder="Enter Your Name">
								</div>
								<div class="col-xs-12 col-sm-6">
									<input type="text" class="form-control" name="message" placeholder="Enter A Message">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<input class="btn btn-primary shout-btn" type="submit" name="submit" value="Shout It Out">
								</div>
							</div>				
						</form>
					</div>
				</div>
			</div>
		</div>		
	</div>

	<script src="js/bootstrap.min.js" type="text/javascript" ></script>	
</body>
</html>