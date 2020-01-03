
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

                  <div class="box-header">
                  <h3 class="box-title"> PAGOS HECHOS</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                
                  <table id="example2" cellspacing=0 cellpadding=2 bordercolor="black">
                    <thead>
                      <tr>


                        <th style="width:30%">Nombre y Apellidos</th>

                     <th style="width:10%"> Fecha de pagp </th>
                        <th style="width:10%"> Pago </th>

                  
                     

                      </tr>
                    </thead>
                    <tbody>
<?php

    $query=mysqli_query($con,"select * from   usuario AS u
    INNER JOIN  sueldo_pago AS s
    ON s.idusuario = u.id ")or die(mysqli_error());

    while($row=mysqli_fetch_array($query)){
 
?>
                      <tr >
              <td><?php echo $row['nombre'];?></td>

                              <td><?php echo $row['fecha_pago'];?></td>
                        <td><?php echo $row['pago'];?></td>
            

      


                      </tr>

 <!--end of modal-->

<?php }?>
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
