<!doctype html>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Chem Game</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>



  <?php
  require_once "../settings.php";

  if (isset($_SESSION['ADMIN_ID'])) {

  ?>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a class="nav-link" href="createGameType.php">Create Game Type</a>
      </li>
      <li>
        <a class="nav-link" href="admin.php">
          <?= $_SESSION['USERNAME'] ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log out</a>
      </li>


      </li>
    </ul>
  </div>

  <?php
  } else if (isset($_SESSION['USER_ID'])) {

  ?>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a class="nav-link" href="createGame.php">Create Game</a>
      </li>

      <li>
        <a class="nav-link" href="user.php">
          <?= $_SESSION['USERNAME'] ?>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log out</a>
      </li>


      </li>
    </ul>
  </div>







  <?php
  } else { ?>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>

      </li>
    </ul>
  </div>

  <?php } ?>

</nav>

<body>