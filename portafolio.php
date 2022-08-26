
<?php include("cabecera.php"); ?><br>
<?php include("conexion.php"); ?>

<?php

if (isset($_POST['enviar'])) {

   $nombre = $_POST['nombre'];
   $imagen = $_FILES['archivo']['name'];
  /* $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;
   $describcion = $_POST['describcion'];*/
if (empty($nombre) ||/* empty($imagen) ||*/ empty($describcion) ) {
	echo "datos no guardados";
}else{
        
    $objConexion= new conexion();

    $sql="INSERT INTO `proyectos` (`nombre`, `imagen`, `describcion`) 
    VALUES ('$nombre', 'si', '$describcion');";

	$objConexion->ejecutar($sql);

	echo "datos guardados";
}
	
}

if (isset($_GET['borrar'])) {
$id = $_GET['borrar'];
// "DELETE FROM proyectos WHERE `proyectos`.`id` = 2"
	  $objConexion= new conexion();
	  $sql="DELETE FROM proyectos WHERE `proyectos`.`id` = ".$id;
      $objConexion->ejecutar($sql);


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
	
<label for="nom">Nombre del proyecto</label><input type="text" class="form-control" name="nombre" id="nom"><br>
<label for="desc">Descripcion del proyecto</label><input type="text" class="form-control" name="describcion" id="desc"><br>
<label for="img">Imagen del proyecto</label><input type="file" class="form-control" name="archivo" id="img"><br>

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
			<td><?php echo $proyecto['imagen']; ?></td>
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