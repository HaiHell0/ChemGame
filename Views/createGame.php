<?php
require_once("./navbar.php");
require_once "../settings.php";
require_once "../GameType/GameTypeItem.php";
$gameitem = new GameTypeItem();

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<title>Chem Game Index</title>
</head>

<body>
	<?php

    ?>
	<section class="vh-100 gradient-custom">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card bg-dark text-white" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center">




							<form id="form">
								<h2>Create a new game</h2>
								<p>Start by choosing a game type</p>
								<div class="form-group">

									<select class="form-control form-control-lg bg-white bg-op-9 text-sm w-lg-50"
										data-toggle="select" tabindex="-98" form="form" name="type">
										<?php
                                        foreach ($gameitem->getAllGames() as $game) {


                                        ?>
										<option value=<?= $game["GAME_TYPE_ID"] ?>> <?= $game["GAME_NAME"] ?>
										</option>



										<?php


                                        }

                                        ?>
									</select>
									<label for="exampleInputEmail1">Game Name</label>
									<input type="text" class="form-control" id="game_name" placeholder="Game Name"
										name="game_name">

									<div class="form-group">
										<label for="pass">Category</label>
										<input type="text" class="form-control" id="category" placeholder="Category"
											name="category">
									</div>

									<div class="form-group">
										<label for="php">Upload config file</label><br><br>
										<input type="file" accept=".txt " name="config" id="php">
									</div>
									<button type="button" id="addImg">Click to add IMG</button>
									<div id="img"></div><br>
									<div class="form-check">

									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
							</form>


						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
<script src="../Resources/create.js"></script>
<script type="text/javascript">

	$(document).ready(function () {
		$('#form').submit(function (e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: '../Game/createGame.php',
				dataType: 'JSON',
				data: $(this).serialize(),
				success: function (response) {
					alert(response.message);
					window.location.href = "index.php";
				}
			});
		});
	});
</script>






</html>