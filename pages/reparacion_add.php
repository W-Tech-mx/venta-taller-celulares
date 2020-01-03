<?php
session_start();
include('../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];
	$num_pedido = $_POST['num_pedido'];
	$fecha = $_POST['fecha'];

  $id_sesion=$_SESSION['id'];


    $costo_mano_obra = $_POST['costo_mano_obra'];
$descripcion = $_POST['descripcion'];
$sum=0;
$id_cliente=0;
            $query11=mysqli_query($con,"select * from temporal_cliente where id_temporal='1'")or die(mysqli_error());

                      while($row11=mysqli_fetch_array($query11)){
    $id_cliente=$row11['cliente'];


}
if ($id_cliente>0) {
  # code...

mysqli_query($con,"INSERT INTO reparacion(num_pedido,fecha,id_sesion,id_cliente,costo_mano_obra,descripcion)
VALUES('$num_pedido','$fecha','$id_sesion','$id_cliente','$costo_mano_obra','$descripcion')")or die(mysqli_error($con));		
		


$cont=0;
$id_pedidos = array();
$id_productos = array();


$cantidad = array();

            $query1=mysqli_query($con,"select * from temporal_parte where id_pedido='$num_pedido'")or die(mysqli_error());

                      while($row1=mysqli_fetch_array($query1)){
           $cont++;
                   $id_pedidos[] = $row1['id_pedido'];
					$id_productos[] = $row1['id_producto'];
					$cantidad[] = $row1['cantidad'];

}

$i=0;

for ($i=0; $i <$cont ; $i++) { 

             mysqli_query($con,"INSERT INTO detalles_reparacion(id_pedido,id_producto,cantidad)
VALUES('$id_pedidos[$i]','$id_productos[$i]','$cantidad[$i]')")or die(mysqli_error($con));
}


  mysqli_query($con,"delete from temporal_parte where id_pedido='$num_pedido'")or die(mysqli_error());


    mysqli_query($con,"update temporal_cliente set cliente='0'")or die(mysqli_error());


  echo "<script type='text/javascript'>alert('venta hecha!');</script>";



    $query3=mysqli_query($con,"select * from reparacion where num_pedido='$num_pedido' ")or die(mysqli_error($con));

   while($row3=mysqli_fetch_array($query3)){

 
          $costo_mano_obra=$row3['costo_mano_obra'];
     

          
      }

         $query11=mysqli_query($con,"select * from empresa where id_empresa='1' ")or die(mysqli_error($con));

   while($row11=mysqli_fetch_array($query11)){

 $impuesto_producto=$row11['impuesto_producto'];

      } 

    $query5=mysqli_query($con,"select * from detalles_reparacion AS d INNER JOIN parte AS p
      ON d.id_producto = p.id_pro where id_pedido='$num_pedido' ")or die(mysqli_error($con));

   while($row5=mysqli_fetch_array($query5)){
        $sum=$sum+$row5['precio_venta']*$row5['cantidad']+($row5['precio_venta']*$row5['cantidad'])*$impuesto_producto/100;
        


      }
         $sum_sub_total=$costo_mano_obra+$sum;
            $impuesto_producto=$sum_sub_total*$impuesto_producto/100;
            $sum_total=$impuesto_producto+$sum_sub_total;
              $monto=0;
  $caja_anterior=0;
          $query3=mysqli_query($con,"select * from caja   where estado='abierto'  ")or die(mysqli_error());
      while($row3=mysqli_fetch_array($query3)){
      $caja_anterior=$row3['monto'];
      }
      
$monto=$caja_anterior+$sum_total;
    mysqli_query($con,"update caja set monto='$monto'  where estado='abierto'")or die(mysqli_error());

	echo "<script>document.location='generar_pdf_reparacion.php?num_pedido=$num_pedido'</script>";



}
else{
    echo "<script type='text/javascript'>alert('tienes que selecionar cliente!');</script>";
    echo "<script>document.location='reparacion.php'</script>";
}
	






?>
