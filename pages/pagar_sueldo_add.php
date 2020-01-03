


<?php session_start();

include('../dist/includes/dbcon.php');
	
          if(isset($_REQUEST['cid']))
            {
              $cid=$_REQUEST['cid'];
            }
            else
            {
            $cid=$_POST['cid'];
          }
                    if(isset($_REQUEST['pago']))
            {
              $pago=$_REQUEST['pago'];
            }
            else
            {
            $pago=$_POST['pago'];
          }


            $fecha_pago = date('Y-m-d');


		mysqli_query($con,"INSERT INTO sueldo_pago(fecha_pago,pago,idusuario)
				VALUES('$fecha_pago','$pago','$cid')")or die(mysqli_error($con));


	echo "<script>document.location='asignar_sueldo.php'</script>";
	


?>
