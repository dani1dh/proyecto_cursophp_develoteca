
<?php include("cabecera.php"); ?><br>
<?php include("conexion.php"); ?>

<?php

if (isset($_POST['enviar'])) {

   $nombre = $_POST['nombre'];
   $fecha_img = new DateTime();
   $imagen =$fecha_img->getTimestamp()."_".$_FILES['archivo']['name'];
   $image_tmp = $_FILES['archivo']['tmp_name'];
   $image_folder = 'imagenes/'.$imagen;
   $describcion = $_POST['describcion'];
if (empty($nombre) || empty($imagen) || empty($describcion) ) {
	echo "se requiere llenar todos los datos para registrar";
}else{
        
    $objConexion= new conexion();

move_uploaded_file($image_tmp, $image_folder);
    $sql="INSERT INTO `proyectos` (`nombre`, `imagen`, `describcion`) 
    VALUES ('$nombre', '$imagen', '$describcion');";


	$objConexion->ejecutar($sql);
header("location:portafolio.php");
	
}
	
}

if (isset($_GET['borrar'])) {
$id = $_GET['borrar'];
// "DELETE FROM proyectos WHERE `proyectos`.`id` = 2"
	  $objConexion= new conexion();
	  $imagen=$objConexion->consultar("SELECT imagen FROM `proyectos` where `id`=".$id);
	  unlink("imagenes/".$imagen[0]['imagen']);
	 $sql="DELETE FROM proyectos WHERE `proyectos`.`id` = ".$id;
      $objConexion->ejecutar($sql);  // con esta sentencia podemos borrar de la base de datos 
header("location:portafolio.php");

}

  $objConexion= new conexion();
  $resultado = $objConexion->consultar("SELECT * FROM `proyectos`");
  //print_r($resultado);



	
 ?>

<div class="container">
	<div class="row">

		<div class="col-md-6">
			<div class="card">
	<div class="card-header">
		Datos del proyecto
	</div>
	<div class="card-body">
		<form action="portafolio.php" method="post" enctype="multipart/form-data">
	
<label for="nom">Nombre del proyecto</label>
       <input type="text" class="form-control" name="nombre" id="nom" autocomplete="off"><br>
<label for="desc">Descripcion del proyecto</label>
<textarea class="form-control" name="describcion" id="desc" rows="3"></textarea>
     <!--  <input type="text" class="form-control" name="describcion" id="desc">--><br>
<label for="img">Imagen del proyecto</label>
       <input type="file" class="form-control" name="archivo" id="img"><br>

<input type="submit" class="btn btn-success" value="Enviar proyecto" name="enviar">



</form>
	</div>
	
</div>
		</div>
			<div class="col-md-6">
			
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Image</th>
			<th>Descripcion</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>

     <?php 

foreach ($resultado as $proyecto) {
	
      ?>

		<tr>
			<td><?php echo $proyecto['id']; ?></td>
			<td><?php echo $proyecto['nombre']; ?></td>
			<td><img src="imagenes/<?php echo $proyecto['imagen']; ?>" alt="si" width="100px" accept="image/png, image/jpeg, image/jpg"></td>
			<td><?php echo $proyecto['describcion']; ?></td>
			<td><a  class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>" name="borrar">Eliminar</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
		</div>


	</div>
</div>





<?php include("pie.php"); ?>