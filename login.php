<?php 
session_start();


if ($_POST) {
	if (($_POST['usuario']=="develoteca") && ($_POST['contraseña']=="12345")) {
		header("location:index.php");
		$_SESSION['usuario']="develoteca";
	}else{
		echo "<script>alert('Usuario o contraseña incorrecta);</script>";
	}
}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
   
  <div class="container">

  <div class="row">
 
  <div class="col-md-4"></div>

  <div class="col-md-4">  
    <div class="card">
      <div class="card-header">
        Inicio de sesion
      </div>
      <div class="card-body">
       
      <form action="login.php" method="post">
    <label for="us">Usuario:</label>
    <input type="text" name="usuario" id="us" class="form-control" autocomplete="off" placeholder="develoteca"><br>
     <label for="cont"> Contraseña:</label> <input type="text" class="form-control" name="contraseña" id="con" autocomplete="off" placeholder="12345"><br>
     <button type="submit" class="btn btn-success">Entrar al portafolio</button>
  </form>
      </div>
      <div class="card-footer text-muted">
      
      </div>
    </div>
   
</div>

  <div class="col-md-4"></div>

  </div>

   

  </div>

 
  

  </body>
</html>