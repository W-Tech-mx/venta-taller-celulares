


<?php session_start();

include('../dist/includes/dbcon.php');
	

		$sueldo = $_POST['sueldo'];
	$idusuario = $_POST['idusuario'];




		mysqli_query($con,"INSERT INTO sueldo_empleado(idusuario,sueldo)
				VALUES('$idusuario','$sueldo')")or die(mysqli_error($con));

			mysqli_query($con,"update usuario set estado_planilla='si' where id='$idusuario'")or die(mysqli_error());
	echo "<script>document.location='asignar_sueldo.php'</script>";
	


?>
