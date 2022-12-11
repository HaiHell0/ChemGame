
<?php
  

	if(count($_POST)>0){

    //Creating files and resources for the game on submit
    $newFileName = $_POST["game-name"];

    if(!is_dir($newFileName) && !$_POST["game-name"]==""){
      mkdir("./".$newFileName,007);
      echo "Folder created";
      mkdir("./".$newFileName."/".$newFileName."_images",007);
      $myfile = fopen(ROOT."/"."GameType"."/".$newFileName."/".$newFileName.".php", "w");
      $myfile = fopen(ROOT."/"."GameType"."/".$newFileName."/".$newFileName.".css", "w");
      $myfile = fopen(ROOT."/"."GameType"."/".$newFileName."/".$newFileName.".js", "w");


      if(isset($_FILES['php']['name'])){
        move_uploaded_file($_FILES['php']['name'],"./".$newFileName."/".$_FILES['php']['name']);
      }
      if(isset($_FILES['css']['name'])){
        move_uploaded_file($_FILES['css']['name'],"./".$newFileName."/".$_FILES['css']['name']);
      }
      if(isset($_FILES['js']['name'])){
        move_uploaded_file($_FILES['js']['name'],"./".$newFileName."/".$_FILES['js']['name']);
      }
 
      

      if(isset($_FILES['img']['name'])){
        echo "ok";
        // Count total files
        $countfiles = count($_FILES['img']['name']);
        
          // Looping all files
        for($i=0;$i<$countfiles;$i++){
          $filename = $_FILES['img']['name'][$i];
            // Upload file
          move_uploaded_file($_FILES['img']['tmp_name'][$i],"./".$newFileName."/".$newFileName."_images/".$filename);
          }
        }
      //make files if none are submitted(for edit later)
      
      //update database with new game

      
    }
    else{
      echo"There is already a game with that name";
    }
    
  }
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
		<h1>Chem</h1>
            <form action='' method="POST" enctype="multipart/form-data">
            <input type="textbox" id="game-name" name="game-name" placeholder="name of the game">
            <label for="game-name">Name of the game</label><br><br>

            <input type="text" name="category" id="php">
            <label for="php">Upload PHP file</label><br><br>


            <input type="file" accept=".php "name="php" id="php">
            <label for="php">Upload PHP file</label><br><br>

            <input type="file" accept=".js"name="js" id="php">
            <label for="php">Upload JS file</label><br><br>

            <input type="file" accept=".css"name="css" id="php">
            <label for="php">Upload CSS file</label><br><br>



            <button type="button" id="addImg">Click to add IMG</button>
            <div id="img"></div><br>
        
            <input type="submit" value="Create gmae" name="submit">
        </form>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src ="./Resources/create.js"></script>
  </body>
</html>