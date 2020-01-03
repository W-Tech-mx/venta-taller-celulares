<?php 
$id=$_SESSION['id'];
?>

<?php

?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3><?php echo $empresa;?></h3>
                <ul class="nav side-menu">
                      <li><a href = "inicio.php"><i class="fa fa-dashboard"></i> inicio <span class="fa fa-chevron-right"></span></a></li>
                                  <?php
                      if ($tipo=="administrador" or $tipo=="empleado" ) {
                    
                      ?>
        
   <li><a href = "caja.php"><i class="fa fa-bank"></i> Caja <span class="fa fa-chevron-right"></span></a></li>
        <?php
                      }
                      ?>
                                  <?php
                      if ($tipo=="administrador" ) {
                    
                      ?>
                 <li><a><i class="fa fa-group"></i> Usuarios<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="usuario.php">Usuarios</a></li>

                                  <li><a href="usuario_agregar.php">Agregar</a></li> 

                    </ul>
                  </li>

                                          <li><a><i class="fa fa-user-md"></i> Cliente<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="cliente.php">Mostrar</a></li>
   <li><a href="cliente_agregar.php">Agregar</a></li>
                       

                    </ul>
                  </li>


                  <li><a href = "asignar_sueldo.php"><i class="fa fa-money"></i>Asginar sueldo<span class="fa fa-chevron-right"></span></li></a>

             <?php
                      }
                      ?>

                              <?php
                      if ($tipo=="administrador" or $tipo=="empleado") {
                    
                      ?>
                 <li><a><i class="fa fa-money"></i> Celulares/Productos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="productos.php">Celulares/Producto</a></li>



                    </ul>
                  </li>
                         <li><a href = "respaldo_add.php"><i class="fa fa-database"></i>Backup<span class="fa fa-chevron-right"></span></li></a>
                       
             <?php
                      }
                      ?>
                      


                 <li><a><i class="fa fa-money"></i> Reparaciones<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
          <?php
                      if ($tipo=="administrador" or $tipo=="empleado" or $tipo=="cliente") {
                    
                      ?>
           <li><a href = "reparacion.php"><i class="fa fa-money"></i>Agrergar reparacion<span class="fa fa-chevron-right"></span></li></a>
              <li><a href = "parte.php"><i class="fa fa-database"></i>Agrergar repuestos/partes<span class="fa fa-chevron-right"></span></li></a>

                                    <?php
                      }
                      ?>

                                   <?php
                      if ($tipo=="administrador" or $tipo=="empleado" ) {
                    
                      ?>
                        

                                    <?php
                      }
                      ?>

                    </ul>
                  </li>





    

                               <?php
                      if ($tipo=="administrador" or $tipo=="empleado" ) {
                    
                      ?>

                           <li><a href = "ventas.php"><i class="fa fa-money"></i>Ventas Celulares/computadoras<span class="fa fa-chevron-right"></span></li></a>
                   


                                    <?php
                      }
                      ?>
                   <?php
                      if ($tipo=="administrador" or $tipo=="empleado") {
                    
                      ?>
                              <li><a><i class="fa fa-money"></i> Gastos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="gastos.php">Gastos</a></li>

<li><a href="cat_gastos.php">Tipo gastos</a></li>
                       

                    </ul>
                  </li>



                                                                              <li><a><i class="fa fa-money"></i> Ingresos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="ingresos.php">Ingresos</a></li>

<li><a href="cat_ingresos.php">Tipo Ingresos</a></li>
                       

                    </ul>
                  </li>


             
                 
         









                                   <li><a><i class="fa fa-bar-chart"></i> Consolidado gastos e ingresos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
<li><a href="consolidado_docentes.php">Consolidado por mes</a></li>
<li><a href="consolidado_entre_fechas.php">Consolidado entre fechas</a></li>



                       

                    </ul>
                  </li>
                                           <?php
                      }
                      ?>
                                                              <?php
                      if ($tipo=="administrador" ) {
                    
                      ?>

                 <li><a><i class="fa fa-bar-chart"></i> Reportes Ventas Celulares<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="reportes_por_fecha.php">Entre fechas</a></li>
                      <li><a href="reportes_por_dia.php">Por dia</a></li> 
                     <li><a href="reportes_por_mes.php">Por mes</a></li> 
      <li><a href="reportes_ultimos_7dias.php">Ultimos 7 dias</a></li> 
                    </ul>
                  </li>



                               <li><a><i class="fa fa-bar-chart"></i> Reportes Ventas reparaciones<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="reportes_por_fecha_reparacion.php">Entre fechas</a></li>
                      <li><a href="reportes_por_dia_reparacion.php">Por dia</a></li> 
                     <li><a href="reportes_por_mes_reparacion.php">Por mes</a></li> 
      <li><a href="reportes_ultimos_7dias_reparacion.php">Ultimos 7 dias</a></li> 
                    </ul>
                  </li>
             <?php
                      }
                      ?>



    

   

   <?php
     if ($tipo=="administrador") {

                      ?>

       <li><a href = "ganancias_anio.php"><i class="fa fa-line-chart"></i>Ganancios del año<span class="fa fa-chevron-right"></span></li></a>



                               <?php
                              }
 ?>


         
                 <li><a><i class="fa fa-gear"></i>Configuracion<span class="fa fa-chevron-s"></span></a>
                    <ul class="nav child_menu">


                      <li><a href="editar_usuario_password.php">Cambiar Contraseña</a></li>
                                                                        <?php
                      if ($tipo=="administrador" ) {
                    
                      ?>
                          <li><a href="configuracion.php">Configuracion</a></li>
                                 <?php
                      }
                      ?>

                    </ul>
                  </li>

              </div>
             <!--- <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>--->

            </div>
