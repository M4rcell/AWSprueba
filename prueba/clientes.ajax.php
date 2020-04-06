<?php 
require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";


class AjaxClientes{
    /*=============================================
	EDITAR CLIENTE
    =============================================*/	
    public $idCliente;
    public function ajaxEditarCliente(){

        $valor = $this->idCliente;

        $respuesta = ControladorCliente::ctrMostrarIdCliente($valor);
        
        echo json_encode($respuesta);

    }

}

/*=============================================
EDITAR USUARIO
=============================================*/
// si el idCliente viene con datos entoces se ejecuta 
if(isset($_POST["idCliente"])){
    
    //instancia a la clase AjaxUsuarios
    $editar = new AjaxClientes();
    // la propiedad idCliente recibbe el datos desde clientes.js
    $editar -> idCliente = $_POST["idCliente"];
    //se ejecutael metodo
	$editar -> ajaxEditarCliente();

}