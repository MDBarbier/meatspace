<!DOCTYPE html>
<html>
	<head>

		<!-- Site CSS -->
		<link rel="stylesheet" type="text/css" href="content/meatspace.css"/>

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>


	</head>

	<body>

		<div class="container">
			<div class="jumbotron voffset2">
				<h1><?php echo "Hello chummer, welcome to meatspace";?></h1>
			</div>

			<button data-toggle="collapse" data-target="#dicetools" class="btn btn-default">Toggle Dice Tools</button>
			
			<div id="dicetools" class="collapse">
				<?php			
					include '_dice.php';
				?>
			</div>

			<?php include '_footer.php'?>
		</div>

		

	</body>

</html>