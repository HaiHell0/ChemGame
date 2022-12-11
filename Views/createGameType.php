<?php
require_once('../settings.php');
require_once('../GameType/GameTypeItem.php');

?>



<?php

    if(!isset($_SESSION["ADMIN_ID"]))
 

	if(count($_POST)>0){

    //Creating files and resources for the game on submit
    $newFileName = $_POST["game-name"];

    if(!is_dir($newFileName) && !$_POST["game-name"]==""){
      mkdir("./".$newFileName,007);
      echo "Folder created";
      mkdir("./".$newFileName."/".$newFileName."_images",007);
      //create files
        $dirPhp = ROOT . "/" . "GameType" . "/" . $newFileName . "/" . $newFileName . ".php";
        $dirCss = ROOT . "/" . "GameType" . "/" . $newFileName . "/" . $newFileName . ".css";
        $dirJs = ROOT . "/" . "GameType" . "/" . $newFileName . "/" . $newFileName . ".js";




        //create files
      //$myfile = fopen($dirPhp, "w");
      //$myfile = fopen($dirPhp.".css", "w");
      //$myfile = fopen($dirPhp.".js", "w");

        //to do later
    /*   if(isset($_FILES['php']['name'])){
        move_uploaded_file($_FILES['php']['name'],"./".$newFileName."/".$_FILES['php']['name']);
      }
      if(isset($_FILES['css']['name'])){
        move_uploaded_file($_FILES['css']['name'],"./".$newFileName."/".$_FILES['css']['name']);
      }
      if(isset($_FILES['js']['name'])){
        move_uploaded_file($_FILES['js']['name'],"./".$newFileName."/".$_FILES['js']['name']);
      } */
 
      

    /*   if(isset($_FILES['img']['name'])){
        echo "ok";
        // Count total files
        $countfiles = count($_FILES['img']['name']);
        
          // Looping all files
        for($i=0;$i<$countfiles;$i++){
          $filename = $_FILES['img']['name'][$i];
            // Upload file
          move_uploaded_file($_FILES['img']['tmp_name'][$i],"./".$newFileName."/".$newFileName."_images/".$filename);
          }
        } */
      //make files if none are submitted(for edit later)
      
      //update database with new game



        $gameTypeItem = new GameItem();
        $gameTypeItem ->addGame($SESSION["ADMIN_ID"],$_POST["game-name"],$dirPhp,$dirCss,$dirJs);


      
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
    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

          
          
        <form action='' id = "form" method="POST" enctype="multipart/form-data">
            <h2>Admin login</h2>
  <div class="form-group">
    <label for="gamename">Game name</label>
    <input type="textbox" id="game-name" name="game-name" placeholder="name of the game">
  </div>

  <div class="form-group">
  <label for="php">Upload PHP file</label><br><br>
  <input type="file" accept=".php "name="php" id="php">
  </div>

  <div class="form-group">
  <label for="php">Upload JS file</label><br><br>
  <input type="file" accept=".js"name="js" id="php">
  </div>

  <div class="form-group">
  <label for="php">Upload CSS file</label><br><br>
  <input type="file" accept=".css"name="css" id="php">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src ="../Resources/create.js"></script>

  <script type="text/javascript">

</script>






</html>