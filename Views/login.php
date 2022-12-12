<?php

require_once("../settings.php");
require_once(ROOT . "/Admin/AdminItem.php");
$adminItem = new AdminItem();


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
  include "./navbar.php"
    ?>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h1>Login with</h1>
              <button type="button" class="btn btn-primary"><a href="adminLogin.php"
                  class="text-white-50 fw-bold">Admin</a></button>
              <button type="button" class="btn btn-primary"><a href="userLogin.php"
                  class="text-white-50 fw-bold">User</a></button>
              <br>
              <h3>or</h3>
              <br>
              <h2>Create new account</h2>

              <div>
                <p class="mb-0">Create <a href="adminCreate.php" class="text-white-50 fw-bold">Admin</a> account
                <p class="mb-0">Create <a href="userCreate.php" class="text-white-50 fw-bold">User</a> account
                </p>
              </div>

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

</html>