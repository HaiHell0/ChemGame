<?php
$games=json_decode(file_get_contents(__DIR__ .'/database.json'),true);
?>
<?php
function download($fileName){
    $folder=json_decode(file_get_contents(__DIR__ .'/database.json'),true)['games'][$_GET['index']]['location'];
    $file=$folder."\\".$fileName;
    echo $file;
    header('Content-Type: text/php');
    header("Content-disposition: attachment;filename=$fileName");
    readfile(".\\test5\\test5.php");
}
if(isset($_GET['file'])){
  download($_GET['file']);
}




?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




    <?php
if(!isset($_GET['index']))
{
?>
<h1>Chooose the game type you would like to edit</h1>
<?php
			$i=0;
			foreach($games['games'] as $game){
				?>
				<p><a href="edit.php?index=<?= $i ?>"><?= $game['game-name'] ?></a></p>
       

				
				<?php
				$i++;
			}
		?>
<?php
}
else{
    $name = $games['games'][$_GET['index']]['game-name'];
    $location = $games['games'][$_GET['index']]['game-name'];
    $i = $_GET['index'];
?>
<h1>You have chosen to edit: <?=$name?></h1>
List of resources:
<?php
if ($handle = opendir($location)) {

  while (($entry = readdir($handle))) {

      if ($entry != "." && $entry != "..") {
         
          echo '<a href="edit.php?index='.$i.'&file='.$entry.'">'.$entry.'</><br>';
      }
  }

  closedir($handle);
}
?>




<?php
}
?>

	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>