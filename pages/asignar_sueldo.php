
<?php include 'header.php';

//$branch_id = $_GET['id'];
?>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <body class="nav-md">
      <?php
                      if ($tipo=="administrador" or $tipo=="empleado") 
                    {
                      ?>
                    
    <div class="container body">
      <div class="main_container">
        <?php include 'main_sidebar.php';?>

        <!-- top navigation -->
       <?php include 'top_nav.php';?>      <!-- /top navigation -->
       <style>
label{

color: black;
}
li {
  color: white;
}
ul {
  color: white;
}
#buscar{
  text-align: right;
}
       </style>

        <!-- page content -->
        <div class="right_col" role="main">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class = "x-panel">

            </div>

        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->

 <button type="button" class="btn btn-primary btn-lg btn-print" data-toggle="modal" data-target="#miModal">
  NUEVO
</button>
                  <?php
                    //  }
                      ?>
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
                        <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="asignar_sueldo_add.php" enctype="multipart/form-data" class="form-horizontal">
            

                    <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Sueldo</label>
                        <div class="input-group col-md-8">
                          <input type="text" class="form-control pull-right" id="sueldo" name="sueldo" placeholder="sueldo " required>
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>

                 
   <div class="col-md-12 btn-print"">
            <div class="form-group">
               <br> <label class="control-label col-lg-3" for="price">Empleado</label><br>
         
            <select class="form-control select2" name="idusuario" required>

                <?php

              $queryc=mysqli_query($con,"select * from usuario where estado_planilla='' and tipo='empleado' ")or die(mysqli_error());
                while($rowc=mysqli_fetch_array($queryc)){
                ?>
                  <option value="<?php echo $rowc['id'];?>"><?php echo $rowc['nombre'];?></option>
                <?php }?>
              </select>
               </div>
    </div>







                    <div class="col-md-12">
                       <div class="col-md-12">
                        <button class="btn btn-lg btn-primary btn-print" id="daterange-btn"  name="">GUARDAR</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                         </div>

                    </div>

          </form>

          </div>
      </div>
   
    </div>
  </div>
</div>
 <!--end of modal-->


                  <div class="box-header">
                  <h3 class="box-title"> LISTA EMPLEADOS EN PLANILLA</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                
                  <table id="example2" 
                  cellspacing=0 cellpadding=2 bordercolor="black">
                    <thead>
                      <tr>


                        <th style="width:30%">Nombre completo</th>
                    
                  
                        <th style="width:10%"> Correo </th>
                          
 <th style="width:10%"> Pagar sueldo </th>
            
                  
                       <th style="width:30%" class="btn-print"> Pagos hechos </th>
                                  <th style="width:30%" class="btn-print"> Editar </th>

                      </tr>
                    </thead>
                    <tbody>
<?php

    $query=mysqli_query($con,"select * from  usuario AS u INNER JOIN  sueldo_empleado AS s
    ON s.idusuario = u.id ")or die(mysqli_error());

    while($row=mysqli_fetch_array($query)){
    $cid=$row['idusuario'];
 
?>
                      <tr >
              <td><?php echo $row['nombre'];?></td>

         
                        <td><?php echo $row['correo'];?></td>
            

                        <td>
                                                           <?php
                  //    if ($eliminar=="si") {
                    
                      ?>
                      <a class="btn btn-primary btn-print" href="<?php  echo "pagar_sueldo.php?cid=$cid";?>"     role="button">Pagar sueldo</a>

   <?php
                   //   }
                      ?>

         <?php
                     // if ($editar=="si") {
                    
                      ?>




        <?php
                  //    }
                      ?>

            </td>








                        <td>
                                                           <?php
                  //    if ($eliminar=="si") {
                    
                      ?>
                      <a class="btn btn-warning btn-print" href="<?php  echo "pagos_hechos.php?cid=$cid";?>"   role="button">Pagos hechos</a>

   <?php
                   //   }
                      ?>

         <?php
                     // if ($editar=="si") {
                    
                      ?>




        <?php
                  //    }
                      ?>

            </td>


      

                        <td>
                                                           <?php
                  //    if ($eliminar=="si") {
                    
                      ?>
   

   <?php
                   //   }
                      ?>

         <?php
                     // if ($editar=="si") {
                    
                      ?>

<a class="btn btn-danger btn-print" href="#updateordinance<?php echo $row['idusuario'];?>"  data-target="#updateordinance<?php echo $row['idusuario'];?>" data-toggle="modal" style="color:#fff;"  style="height:25%; width:75%; font-size: 12px " role="button">Editar</a>


        <?php
                  //    }
                      ?>

            </td>
                      </tr>
        <div id="updateordinance<?php echo $row['idusuario'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">ACCION ACTUALIZAR SUELDO</h4>
              </div>
              <div class="modal-body">

 
        <form class="form-horizontal" method="post" action="asignar_sueldo_actualizar.php" enctype='multipart/form-data'>

            




                                      <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >sueldo</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-7 btn-print">
                      <div class="form-group">
                                    <input type="hidden" class="form-control" id="idusuario" name="idusuario" value="<?php echo $row['idusuario'];?>" required>
                   <input type="text" class="form-control" id="sueldo" name="sueldo" value="<?php echo $row['sueldo'];?>"  required>
 
                      </div>
                    </div>
                           <div class="col-md-1 btn-print">
                
                    </div>
                    </div>




            <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
      
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-7 btn-print">
                      <div class="form-group">

                     <button type="submit" class="btn btn-primary">GUARDAR</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                      </div>
                    </div>
                           <div class="col-md-1 btn-print">
                
                    </div>
                    </div>




        </form>
            </div>

        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->

<?php 
}?>
                    </tbody>

                  </table>
                </div><!-- /.box-body -->

            </div><!-- /.col -->


          </div><!-- /.row -->




                </div><!-- /.box-body -->

            </div>
        </div>
      </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            reparaciones y pos celulares tusolutionweb <a href="#"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

  <?php include 'datatable_script.php';?>



        <script>
        $(document).ready( function() {
                $('#example2').dataTable( {
                 "language": {
                   "paginate": {
                      "previous": "anterior",
                      "next": "posterior"
                    },
                    "search": "Buscar:",


                  },

                  "info": false,
                  "lengthChange": false,
                  "searching": false,


  "searching": true,
                }

              );
              } );
    </script>

            <?php
                      }
                      ?>

    <!-- /gauge.js -->
  </body>
</html>
