<?php
if(!isset($_GET['id']))
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
    include $games['games'][$_GET['index']]['location'];
    ?>







<?php
}
?>