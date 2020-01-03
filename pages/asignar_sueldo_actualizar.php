


<?php session_start();

include('../dist/includes/dbcon.php');
	
	$idusuario = $_POST['idusuario'];
		$sueldo = $_POST['sueldo'];



	mysqli_query($con,"update sueldo_empleado set sueldo='$sueldo' where idusuario='$idusuario'")or die(mysqli_error());

	echo "<script type='text/javascript'>alert('categoria actualizada correctamente!');</script>";
	echo "<script>document.location='asignar_sueldo.php'</script>";
	


?>
