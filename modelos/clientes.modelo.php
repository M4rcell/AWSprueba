<?php

require_once "conexion.php";

class ModeloClientes{

	static public function mdlMostrarClientes(){

        $stmt = Conexion::conectar()->prepare("call MostrarClientes()");
        
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	        REGISTRAR CLIENTE
    =============================================*/
    static public function mdlRegistrarCliente($nombre,$apellidoP,$celular,$email,$edad){

        $stmt = Conexion::conectar()->prepare("call RegistrarClientes(?,?,?,?,?)");

		$stmt->bindParam(1,$nombre, PDO::PARAM_STR, 4000);
		$stmt->bindParam(2,$apellidoP, PDO::PARAM_STR, 4000);
		$stmt->bindParam(3,$celular, PDO::PARAM_STR, 4000);
		$stmt->bindParam(4,$email, PDO::PARAM_STR, 4000);
		$stmt->bindParam(5,$edad, PDO::PARAM_STR, 4000);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt -> close();

		$stmt = null;

	}
    /*=============================================
	MOSTRAR SEXO
    =============================================*/
    static public function mdlMostrarSexo(){

        $stmt = Conexion::conectar()->prepare("call MostrarSexo()");

		//$stmt->bindParam(1,$modelo, PDO::PARAM_STR, 4000);
        
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	        MOSTRAR OCUPACION
    =============================================*/
    static public function mdlMostrarOcupacion(){

        $stmt = Conexion::conectar()->prepare("call MostrarOcupacion()");

		//$stmt->bindParam(1,$modelo, PDO::PARAM_STR, 4000);
        
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


    static public function mdlMostrarClientesPorVendedor($vendedor){

        $stmt = Conexion::conectar()->prepare("call MostrarClientesPorVendedor(?)");

		$stmt->bindParam(1,$vendedor, PDO::PARAM_STR, 4000);
        
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}
	
	static public function mdlMostrarIdCliente($valor){

        $stmt = Conexion::conectar()->prepare("call MostrarIdCliente(?)");

		$stmt->bindParam(1,$valor, PDO::PARAM_STR, 4000);
        
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}
		/*=============================================
	        REGISTRAR CLIENTE
    =============================================*/
    static public function mdlActualizarCliente($id,$sexo,$ocupacion,$nombre,$apellidoP,$apellidoM,$dni,$ruc,$celular,$email,$edad,$direccion){

        $stmt = Conexion::conectar()->prepare("call ActualizarClientes(?,?,?,?,?,?,?,?,?,?,?,?)");
		
		$stmt->bindParam(1,$id, PDO::PARAM_STR, 4000);
		$stmt->bindParam(2,$sexo, PDO::PARAM_STR, 4000);
		$stmt->bindParam(3,$ocupacion, PDO::PARAM_STR, 4000);
		$stmt->bindParam(4,$nombre, PDO::PARAM_STR, 4000);
		$stmt->bindParam(5,$apellidoP, PDO::PARAM_STR, 4000);
		$stmt->bindParam(6,$apellidoM, PDO::PARAM_STR, 4000);
		$stmt->bindParam(7,$dni, PDO::PARAM_STR, 4000);
		$stmt->bindParam(8,$ruc, PDO::PARAM_STR, 4000);
		$stmt->bindParam(9,$celular, PDO::PARAM_STR, 4000);
		$stmt->bindParam(10,$email, PDO::PARAM_STR, 4000);
		$stmt->bindParam(11,$edad, PDO::PARAM_STR, 4000);
		$stmt->bindParam(12,$direccion, PDO::PARAM_STR, 4000);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	             ELIMINAR CLIENTE
      =============================================*/
    static public function mdlEliminarCliente($idCliente){

        $stmt = Conexion::conectar()->prepare("call EliminarCliente(?)");

		$stmt->bindParam(1,$idCliente, PDO::PARAM_STR, 4000);
        
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt -> close();

		$stmt = null;

	}
}	