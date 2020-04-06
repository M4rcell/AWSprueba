<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar clientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrador</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    
    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar Clientes

        </button>

      </div>

      <div class= "container-fluid">
        
          <div class= "row">
              <div class="col-lg-12 col-md-6 col-sm-3">
                  <div class="box-body">
                  
                  <table class="table table-bordered table-striped dt-responsive dt-responsive tablas">
                    
                  
                    <thead>
                    
                      <tr>
                        
                        <th style="width:10px">ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Edad</th>
                        <th>Acciones</th>
                      </tr> 
          
                    </thead>
                    
                    <tbody>
                          <?php 

                      

                          $clientes = ControladorCliente::ctrMostrarCliente();
          
                          foreach ($clientes as $key => $value) {
                                  echo  '
                                  <tr>
                                  <td>'.$value["idCliente"].'</td>
                                  <td>'.$value["nombre"].'</td>
                                  <td>'.$value["apellidos"].'</td>
                                  <td>'.$value["celular"].'</td>
                                  <td>'.$value["email"].'</td>
                                  <td>'.$value["edad"].'</td>
                                
                                  <td>
                      
                                    <div class="btn-group">
                                        
                                    <button class="btn btn-warning btnEditarCliente" idCliente="'.$value["idCliente"].'" data-toggle="modal" data-target="#modalEditarCliente">Editar<i class="fa fa-pencil"></i></button>
          
                                    <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["idCliente"].'" cliente="'.$value["nombre"].'"><i class="fa fa-times"></i>Eliminar</button>
          
                                    </div>  
                      
                                  </td>
                      
                                </tr>
                                  ';
                          }
          
                          ?>
                    </tbody>
          
                  </table>
          
                  </div>
              </div>
          
          

        </div>

      </div>  
    </div> 

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

         

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nombre" placeholder="Ingresar nombre" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL APELLIDO PATERNO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="apellidoPaterno" placeholder="Ingresar Apellido Paterno" required>

              </div>

            </div>

           
             <input type="hidden" class="form-control input-lg" name="idUserCode"  value="" required>
           


            <!-- ENTRADA PARA NUMERO DE CELULAR -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span> 

                <input type="number" class="form-control input-lg" name="numeroCelular" placeholder="Ingresar Numero de Celular" required>

              </div>

            </div>
             <!-- ENTRADA PARA EMAIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="email" placeholder="Ingresar su Correo " required>

              </div>

            </div>
            <!-- ENTRADA PARA EDAD -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" name="edad" placeholder="Ingresar su Edad" required>

              </div>

            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Clientes</button>

        </div>
        <?php

          $nuevoCliente = new ControladorCliente();
          $nuevoCliente -> ctrRegistrarCliente();

        ?>

      </form>

    </div>

  </div>

</div>
