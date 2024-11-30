<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */


if ( !isset($_GET["id_dpto"]) ||
     !isset($_GET["id_municipio"])
{
	echo "No existe el Municipio a editar";
	exit();
}

$dptos 	   = $_GET["id_dpto"];
$municipio = $_GET["id_municipio"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_dpto, id_municipio, nom_municipio FROM tab_municipios WHERE id_dpto = ? AND id_municipio = ?;");
$sentencia->execute([$municipio]);
$municipio = $sentencia->fetchObject();
if (!$mun)
{
    #No existe
    echo "¡No existe algún Municipio con ese ID!";
    exit();
}

#Si el usuario existe, se ejecuta esta parte del código
?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_municipios.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $mun->id; ?>">
			<input type="hidden" name="municipio" value="<?php echo $mun->municipio; ?>">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input value="<?php echo $mun->nombre; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre del Usuario" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Clave</label>
				<input value="<?php echo $mun->password; ?>" required name="password" type="text" id="password" placeholder="Clave" class="form-control">
			</div>
			<div class="form-group">
				<label for="rol">Rol</label>
				<input value="<?php echo $mun->rol; ?>" required name="rol" type="number" step="any" id="rol" placeholder="Rol" class="form-control">
			</div>
			<input type="hidden" name="fec_creacion" value="<?php echo $mun->fec_creacion; ?>">
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_municipios.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>
