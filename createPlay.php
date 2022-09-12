<?php
$games=json_decode(file_get_contents(__DIR__ .'/database.json'),true);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php
if(!isset($_GET['index']))
{
?>
<h1>Chooose a game type to start making your game</h1>
<?php
			$i=0;
			foreach($games['games'] as $game){
				?>
				<p><a href="createPlay.php?index=<?= $i ?>"><?= $game['game-name'] ?></a></p>
				
				<?php
				$i++;
			}
		
		?>
<?php
}
else{
?>

<?php
    echo $games['games'][$_GET['index']]['game-name'];
    ?>
    <p><a href="edit.php?index=<?=$_GET['index']?>">Edit game type</a></p>
    


    <?php
    include __DIR__.$games['games'][$_GET['index']]['location'].'\\'.$games['games'][$_GET['index']]["game-name"].'.php';
    ?>
<?php
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>