<?php require_once("session.php") ?>
<?php require_once("validtion_functions.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>chack noris api</title>
</head>

<body>
  <div class="container-fluid p-0" style="background-image: url('chuck_no.jpg'); background-repeat: no-repeat; background-position: center;">
    <div class="row d-flex justify-content-center">
      <div class="col-sm-8" style="position: relative; height: 625px;">
          <form action="req_res_file.php" method="post" class="w-100 bg-light border border-dark rounded" style="position: absolute; top: 250px;">
              <h5 class="my-3 text-center p-2">"Welcome to the 'Check Norris Jokes page', choose a funny joke and send it to a friend!"</h5>
              <div class="form-group mt-2 mx-2">
                <h6 class="text-center">Current joke</h6>
                <textarea class="form-control border border-dark" name="box" id="box" rows="3"></textarea>

              </div>
              <br>
                <div class="form-group mt-2 mx-2">
                  <h6 class="text-center">Email address</h6>
                  <input type="email" name="Email" class="form-control border border-dark" placeholder="Enter your email here">
                </div>
                  <div class="d-flex justify-content-between mt-2 mb-2 mx-2">
                   <button type="submit" name="submit" class="btn btn-success m-auto w-25 border border-dark">Send</button>
                  <button type="button" onclick="load_joke()" class="btn btn-danger m-auto w-25 border border-dark">Load joke</button>
                  </div>
                  <?php
                        echo show_error();
                        echo message();
                  ?>

          </form>
      </div>
    </div>
  </div>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
   <script>
     function load_joke() {
       var xhr = new XMLHttpRequest();
       xhr.onload = function() {
         if (xhr.status === 200) {
           var resObj = JSON.parse(xhr.responseText);
           document.getElementById('box').innerHTML = resObj.value.joke;
         }
       };
       xhr.open('GET', 'https://api.icndb.com/jokes/random');
       xhr.send();
     }
   </script>
</body>
</html>
