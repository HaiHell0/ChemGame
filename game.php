<?php
$games=json_decode(file_get_contents(__DIR__ .'/database.json'),true);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Chem Game Index</title>
  </head>
  <body>
  <?php
    include "./navbar.php"
    ?>
	<div class="container">
		
    <?php
    echo $games['games'][$_GET['index']]['game-name'];
    ?>
    <p><a href="edit.php?index=<?=$_GET['index']?>">Edit game type</a></p>



    <?php
    include __DIR__.$games['games'][$_GET['index']]['location'].'\\'.$games['games'][$_GET['index']]['game-name'].'.php';
    ?>

    <?php
        if(!isset($_GET['game-id'])){
        $config=json_decode(file_get_contents(__DIR__.$games['games'][$_GET['index']]['location'].'\\config.json'),true);
        for($i = 0; $i < count($config["games"]);$i++){
            echo '<div><a href="game.php?index='.$_GET['index'].'&game-id='.$i.'">'.$config["games"][$i]["game-name"].'</a></div>';
        }
        echo '<div><a href="createPlay.php?index='.$_GET['index'].'&create=true">Custom game</a></div>';
        }
        else{
          echo '<div><a href="game.php?index='.$_GET['index'].'">Back to main</a></div>';
        }
      
    ?>




	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>