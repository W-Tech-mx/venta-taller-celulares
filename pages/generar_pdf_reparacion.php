<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
$num_pedido=$_GET['num_pedido'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  

  <title>COMPROBANTE</title>

  <link rel='stylesheet' type='text/css' href='css/style.css' />
  <link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
  <script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
  <script type='text/javascript' src='js/example.js'></script>


<style>

.left{
    float: left;

}
.right{
    float: right;

}
.center{

   display:inline-block
}
@media print {
    .btn-print {
      display:none !important;
    size:30px;
    }

}
hr {
  height: 3px;
  width: 100%;
  background-color: black;
}
#abajo{
    height: 3px;
  width: 30%;
  background-color: black;
}
tr{
  font-family:'Helvetica','Verdana','Monaco',sans-serif;
  border:none; font-size: 15px;

}
#terminos{
    border:none; font-size: 8px;
}
</style>
</style>
</head>

<body>

  <?php
  include('../dist/includes/dbcon.php');


  ?>

  <?php
  

$total_todos=0;
    $query3=mysqli_query($con,"select * from clientes AS u INNER JOIN reparacion AS p
      ON u.id_cliente = p.id_cliente where num_pedido='$num_pedido' ")or die(mysqli_error($con));

   while($row3=mysqli_fetch_array($query3)){

         $nombre_cliente=$row3['nombre'];
     $telefono_cliente=$row3['telefono'];
          $costo_mano_obra=$row3['costo_mano_obra'];
     

          
      }

    $query3=mysqli_query($con,"select * from usuario AS u INNER JOIN reparacion AS p
      ON u.id = p.id_sesion where num_pedido='$num_pedido' ")or die(mysqli_error($con));

   while($row3=mysqli_fetch_array($query3)){


          $fecha=$row3['fecha'];
            $id_vendedor=$row3['id_sesion'];
          
      }

       
    $query2=mysqli_query($con,"select * from usuario  where id='$id_vendedor' ")or die(mysqli_error($con));

   while($row2=mysqli_fetch_array($query2)){

         $nombre_vendedor=$row2['nombre'].'  '.$row2['apellido'];
     $telefono_vendedor=$row2['telefono'];
     
      }

       

$sum=0;
$impuesto_producto=0;
         $query11=mysqli_query($con,"select * from empresa where id_empresa='1' ")or die(mysqli_error($con));

   while($row11=mysqli_fetch_array($query11)){
        $empresa=$row11['empresa'];
        $nit=$row11['ruc'];
 $impuesto_producto=$row11['impuesto_producto'];

      } 

    $query5=mysqli_query($con,"select * from detalles_reparacion AS d INNER JOIN parte AS p
      ON d.id_producto = p.id_pro where id_pedido='$num_pedido' ")or die(mysqli_error($con));

   while($row5=mysqli_fetch_array($query5)){
        $sum=$sum+$row5['precio_venta']*$row5['cantidad']+($row5['precio_venta']*$row5['cantidad'])*$impuesto_producto/100;
        


      }





  ?>


  <div id="page-wrap">

    <div class="container">

   <div class="right">

     <div id="customer">

     </div>

       </div>



         <div class="left">
<table class="table table-bordered table-striped"  style="border:none;">
        <tbody>
          <tr style="border:none; " >
            <td style="border:none;" > </td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" > </td>
            <td style="border:none; " ></td>
              <td style="border:none; " ></td>
                <td style="border:none; " ></td>
       
         
       
            <td style="border:none;">
                        <h3><?php echo $empresa;?></h3>
                          <h3><?php echo $nit;?></h3>
                       
                          <h3>Cliente: <?php echo $nombre_cliente;?></h3>
                          <h3>Telefono: <?php echo $telefono_cliente;?></h3>
                 
                      
                          
            </td>
            <td style="border:none;">&nbsp;</td>
            <td style="border:none;">&nbsp;</td>
          </tr>
          <tr style="border:none; ">
            <td style="border:none;"></td>
            <td style="border:none;"></td>
            <td style="border:none;"></td>
            <td style="border:none;"></td>
            <td style="border:none;"></td>
            <td style="border:none;"> </td>
            <td style="border:none;"></td>
            <td style="border:none;"></td>
            <td style="border:none;">&nbsp;</td>
            <td style="border:none; ">&nbsp;</td>
          </tr>
  
               
  </tbody>
      </table>


       </div>
          <div class="right">

     <div id="customer">
          <table class="table table-bordered table-striped"  >
                    <thead>
                      <tr>


                        <th><h3>Nun: <?php echo $num_pedido;?></h3>
                         <h3> Fecha: <?php echo $fecha;?></h3>
                        </th>
                  
                        
                      
                      </tr>
                    </thead>
                    <tbody>

                 
              
                   </tbody>

                  </table>    
<br>
                       <table class="table table-bordered table-striped"  >
                    <thead>
                      <tr>



                        </th>
                  
                        
                      
                      </tr>
                    </thead>
                    <tbody>

                 
              
                   </tbody>

                  </table>  
<br>




     </div>

       </div>
       <br><br><br><br><br><br><br><br><br><br><br><br><br>    <br>
<table class="table table-bordered table-striped"  style="border:none;">
        <tbody>
          <tr style="border:none; " >
            <td style="border:none;" > </td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" > </td>
            <td style="border:none; " ></td>
              <td style="border:none; " ></td>
                <td style="border:none; " ></td>
                  <td style="border:none; " ></td>
                    <td style="border:none; " ></td>
                      <td style="border:none; " ></td>
                        <td style="border:none; " ></td>
                                      <td style="border:none; " ></td>
                <td style="border:none; " ></td>
                  <td style="border:none; " ></td>
                    <td style="border:none; " ></td>
                      <td style="border:none; " ></td>
                        <td style="border:none; " ></td>
                                      <td style="border:none; " ></td>
                <td style="border:none; " ></td>
                  <td style="border:none; " ></td>
                    <td style="border:none; " ></td>
                      <td style="border:none; " ></td>
                        <td style="border:none; " ></td>
                                      <td style="border:none; " ></td>
                <td style="border:none; " ></td>
                  <td style="border:none; " ></td>
                    <td style="border:none; " ></td>
                      <td style="border:none; " ></td>
                        <td style="border:none; " ></td>
      
              <h4></h4>

            </td>
            <td style="border:none;">&nbsp;</td>
            <td style="border:none;">&nbsp;</td>
          </tr>
          <tr style="border:none; ">
            <td style="border:none;"></td>
            <td style="border:none;"></td>
            <td style="border:none;"></td>
            <td style="border:none;"></td>
            <td style="border:none;"></td>
            <td style="border:none;"> </td>
            <td style="border:none;"></td>
            <td style="border:none;"></td>
            <td style="border:none;">&nbsp;</td>
            <td style="border:none; ">&nbsp;</td>
          </tr>
  
               
  </tbody>
      </table>

<center>
       <h1><?php echo $empresa;?></h1>
</center>

<table class="table table-bordered table-striped"  style="border:none;">
        <tbody>
          <tr style="border:none; " >
            <td style="border:none;" > </td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" > </td>
            <td style="border:none; " ></td>
              <td style="border:none; " ></td>
                <td style="border:none; " ></td>
       
         
       
            <td style="border:none;">
                        <h5>Concepto venta y servicio </h5>
              

   <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Impresión</a>
                  <a class = "btn btn-primary btn-print" href = "inicio.php"><i class ="glyphicon glyphicon-arrow-left"></i>Volver a la página de inicio</a>
 
            </td>
            <td style="border:none;">&nbsp;</td>
            <td style="border:none;">&nbsp;</td>
          </tr>

  
               
  </tbody>
      </table>



                 
                  


<br>

                  

             <table class="table table-bordered table-striped"  >
                    <thead>
                      <tr>

            <td style="border:none;" > </td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" > </td>
            <td style="border:none; " ></td>
              <td style="border:none; " ></td>
                <td style="border:none; " ></td>
       
         
       
            <td style="border:none;">
                        <th style="border:none;">nombre producto</th>
                        <th style="border:none;">cantidad</th>
                       <th style="border:none;">precio venta</th>
                         <th style="border:none;">Sub Total</th>
                           <th style="border:none;">Impuesto</th>
                               <th style="border:none;">Sub Total con impuestos</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $total=0;
                                     $query4=mysqli_query($con,"select * from parte AS p
INNER JOIN detalles_reparacion AS t
    ON p.id_pro = t.id_producto  where id_pedido='$num_pedido'")or die(mysqli_error($con));
                    while ($row4=mysqli_fetch_array($query4)){
                     $total= $row4['precio_venta']*$row4['cantidad'];

                      ?>
                      <tr style="border:none;  ">
                                    <td style="border:none;" > </td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" > </td>
            <td style="border:none; " ></td>
              <td style="border:none; " ></td>
                <td style="border:none; " ></td>
       
         
       
            <td style="border:none;">
              <td style="width: 300px;"><?php echo $row4['nombre_pro'];?></td> 
                <td style="width: 300px;"><?php echo $row4['cantidad'];?></td> 
                <td style="width: 300px;"><?php echo $row4['precio_venta'];?></td>   
                          <td><?php echo number_format($row4['precio_venta']*$row4['cantidad'],2);?></td>  
                 <td><?php echo number_format(($row4['precio_venta']*$row4['cantidad'])*$impuesto_producto/100,2);?></td>  
                  <td><?php echo number_format($row4['precio_venta']*$row4['cantidad']+($row4['precio_venta']*$row4['cantidad'])*$impuesto_producto/100,2);?></td>
              </tr>
         <?php
            }
            $sum_sub_total=$costo_mano_obra+$sum;
            $impuesto_producto=$sum_sub_total*$impuesto_producto/100;
            $sum_total=$impuesto_producto+$sum_sub_total;
              ?>
                 
              
                   </tbody>

                  </table>    



         <div class="left">

            <table class="table table-bordered table-striped"  >
                    <thead>
                      <tr>
  <th style="border:none;"></th>

               
                        <th style="border:none;"></th>
                        <th style="border:none;"></th>
                        
                      
                      </tr>
                    </thead>
                    <tbody>
                          <tr >
             <tr style="border:none;  ">
             <tr style="border:none; " >
            <td style="border:none;" > </td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" ></td>
            <td style="border:none;" > </td>
            <td style="border:none; " ></td>
              <td style="border:none; " ></td>
                <td style="border:none; " ></td>
       
         
       
            <td style="border:none;">

               
      
              </tr>

                   
                 
                  
                 </tr> 
                   </tbody>

                  </table>   

      
       </div>



<br>
<br>
<br>
<br>

          
          <div class="right">

     <div id="customer">
    




                            <table class="table table-bordered table-striped"  >
                    <thead>
                       

                <tr>


                         <td ><h4> TOTAL REPUESTOS </h4></td>
               <td ><h4><?php echo $sum;?>  </h4><br> </td>
                        </th>
                  
                        
                      
                      </tr>
                         <tr>
                         <td ><h4>MANO DE OBRA  </h4></td>
               <td ><h4><?php echo $costo_mano_obra;?>  </h4><br> </td>
                        </th>
                  
                        
                      
                      </tr>
                        

             
          <tr>
                         <td ><h4>SUB TOTAL  </h4></td>
               <td ><h4><?php echo $sum_sub_total;?>  </h4><br> </td>
                        </th>
                  
                        
                      
                      </tr>
                                                     <tr>
                <tr>

                         <td ><h4> impuesto  </h4></td>
               <td ><h4><?php echo $impuesto_producto;?>  </h4><br> </td>
                        </th>
                  
                        
                      
                      </tr>

                               <tr>
                <tr>

                         <td ><h4> TOTAL  </h4></td>
               <td ><h4><?php echo $sum_total;?>  </h4><br> </td>
                        </th>
                  
                        
                      
                      </tr>
                    </thead>
                    <tbody>

                 
              
                   </tbody>

                  </table> 
     </div>

       </div>

   
   

                
<br>
<br>

<br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<p id="terminos"> 


</p>

                    <CENTER>

            <table class="table table-bordered table-striped"  style="border:none;">
                    <thead>
                      <tr>


                        <th style="border:none;"></th>
                        <th style="border:none;"></th>
                       
                        
                      
                      </tr>
                    </thead>
                    <tbody>
                          <tr >

    <tr style="border:none;  width: 70px">
          <tr style="border:none; width: 70px ">
             <tr style="border:none;  ">
              <td style="border:none;"></td> 
                <td style="border:none; "></td>    
<td style="border:none;">------------------------------------------------</td> 
<td style="border:none;"></td> 
<td style="border:none;"></td> 
                    <td style="border:none;"> </td> 
                <td style="border:none; "></td>  

                <td style="border:none;">------------------------------------------------</td> 
                    <td style="border:none;"> </td>   
                <td style="border:none; "></td> 
              </tr>
                 <tr style="border:none; ">
                      <tr style="border:none;  ">
                            <tr style="border:none;  ">
              <td style="border:none; width: 70px"></td> 
                <td style="border:none; width: 70px"> </td> 
                <td style="border:none;"> <?php echo $nombre_vendedor;?>:</td> 
<td style="border:none;"></td> 
<td style="border:none;"></td> 
                    <td style="border:none;"> </td> 
                <td style="border:none; "></td>  

                <td style="border:none;">ENTREGUE CONFORME</td> 
                    <td style="border:none;"> </td> 
                <td style="border:none; "></td>     
              </tr>
       
                  
                 </tr> 
                   </tbody>

                  </table>
                  </CENTER>


       
</body>

</html>
