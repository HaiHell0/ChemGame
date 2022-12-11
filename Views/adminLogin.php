<?php
require_once('../settings.php');

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
            
          
          
          
          <form id = "form">
            <h2>Admin login</h2>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Username" name="username">
   
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
  </div>
  <div class="form-check">

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
            <div>
              <p class="mb-0">Create<a href="userCreate.php" class="text-white-50 fw-bold"> User </a>  account
            
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

  <script type="text/javascript">
$(document).ready(function() {
    $('#form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../Admin/adminLogin.php',
            dataType: 'JSON',
            data: $(this).serialize(),
            success: function(response)

            {
               
                alert(response.message);
				window.location.href = "index.php";
           }
       });
     });
});
</script>






</html>