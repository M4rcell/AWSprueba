<?php

Class ControladorCliente{

    public function ctrMostrarCliente() 
    {
        $respuesta = ModeloClientes::mdlMostrarClientes();
        return $respuesta;
    }
    static public function ctrRegistrarCliente(){

        if(isset($_POST["nombre"])){

            if(
               preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $_POST["nombre"]) &&
               preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidoPaterno"]) &&
               preg_match('/^[0-9]+$/', $_POST["numeroCelular"]) &&
               preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"]) && 
               preg_match('/^[0-9]+$/', $_POST["edad"]) 
               
               ) {

                    $nombre    = $_POST["nombre"];
                    $apellidoP = $_POST["apellidoPaterno"];
                    $celular   = $_POST["numeroCelular"];
                    $email     = $_POST["email"];
                    $edad      = $_POST["edad"];

                    $respuesta = ModeloClientes::mdlRegistrarCliente($nombre,$apellidoP,$celular,$email,$edad);
                
                    if($respuesta == "ok"){


                        echo '<script>

                        swal({

                            type: "success",
                            title: "¡El Cliente ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                        }).then(function(result){

                            if(result.value){
                            
                                window.location = "clientes";

                            }

                        });
                    

                        </script>';


                    }
                }
                    else{

                        echo '
                        <script>

                            swal({

                                type: "error",
                                title: "¡El clientes no puede ir vacío o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                            }).then(function(result){

                                if(result.value){
                                
                                    window.location = "clientes";

                                }

                            });
                        

                        </script>';

                }

        }
    }


    public function ctrMostrarSexo(){

        $respuesta = ModeloClientes::mdlMostrarSexo();
		return $respuesta;
    }

    public function ctrMostrarOcupacion(){

        $respuesta = ModeloClientes::mdlMostrarOcupacion();
		return $respuesta;
    }
   
    public function ctrMostrarClientePorVendedor($vendedor)
    {
        $respuesta = ModeloClientes::mdlMostrarClientesPorVendedor($vendedor);
		return $respuesta;
    }
    /*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	
    static public function ctrMostrarIdCliente($valor){

        $respuesta = ModeloClientes::mdlMostrarIdCliente($valor);
		return $respuesta;
    }
    
    /*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrActualizarCliente(){

		if(isset($_POST["editarDNI"])){

            if(preg_match('/^[0-9]+$/', $_POST["editarDNI"]) &&
               preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $_POST["editarNombre"]) &&
               preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarPellidoPaterno"]) &&
               preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPellidoMaterno"]) &&
               preg_match('/^[0-9]+$/', $_POST["EditarRuc"]) &&
               preg_match('/^[0-9]+$/', $_POST["editarNumeroCelular"]) &&
               preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["EditarEmail"]) && 
               preg_match('/^[0-9]+$/', $_POST["EditarEdad"]) &&
               preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["EditarDireccion"])
               ) {
                    $id      =   $_POST["idCliente"];
                    $sexo      = $_POST["editarSexo"];
                    $ocupacion = $_POST["editarOcupacion"];
                    $nombre    = $_POST["editarNombre"];
                    $apellidoP = $_POST["EditarPellidoPaterno"];
                    $apellidoM = $_POST["editarPellidoMaterno"];
                    $dni       = $_POST["editarDNI"];
                    $ruc       = $_POST["EditarRuc"];
                    $celular   = $_POST["editarNumeroCelular"];
                    $email     = $_POST["EditarEmail"];
                    $edad      = $_POST["EditarEdad"];
                    $direccion = $_POST["EditarDireccion"];
                    
                    
                    $respuesta = ModeloClientes::mdlActualizarCliente( 
                        $id,$sexo,$ocupacion,$nombre,$apellidoP,$apellidoM,$dni,$ruc,$celular,$email,$edad,$direccion);
                
                    if($respuesta == "ok"){


                        echo '<script>

                        swal({

                            type: "success",
                            title: "¡El Cliente se actualizo correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                        }).then(function(result){

                            if(result.value){
                            
                                window.location = "clientes";

                            }

                        });
                    

                        </script>';


                    }
                }
                    else{

                        echo '
                        <script>

                            swal({

                                type: "error",
                                title: "¡El clientes no puede ir vacío o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                            }).then(function(result){

                                if(result.value){
                                
                                    window.location = "clientes";

                                }

                            });
                        

                        </script>';

			    }

        }
    }
    /*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$idCliente = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlEliminarCliente($idCliente);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El cliente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';

			}		

		}

	}

}

