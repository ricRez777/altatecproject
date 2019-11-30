<?php

	class Conexion{

		private $servidor;
		private $usuario;
		private $nombredb;

		public $cone;

		function __construct(){
			$this->servidor = "localhost";
			$this->usuario = "root";
			$this->nombredb = "db_altatec";			
		}

		function conectar(){
			try{

				$this->cone = new mysqli($this->servidor, $this->usuario, "", $this->nombredb);
				if($this->cone){
					//echo "conexion exitosa";
				}

			}catch(Exception $e){

				die("ERROR" . $e->GetMessage());

			}
		}

		function desconectar(){
			$this->cone->close();
			//echo "Conexion cerrada";
		}

	}


?>