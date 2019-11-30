<?php 
	
	require_once "conexion.php";

	class Usuario {

		private $idUsuario;
		private $NombreCompleto;
		private $correo;
		private $nickname;
		private $pass;
		private $imagen;

		private $objConexion;	

		function __construct($pIdUsuario, $pNombreCompleto, $pCorreo, $pNickName, $pPassword, $pImagen){
			$this->idUsuario = $pIdUsuario;
			$this->NombreCompleto = $pNombreCompleto;
			$this->correo = $pCorreo;
			$this->nickname = $pNickName;
			$this->pass = $pPassword;
			$this->imagen = $pImagen;
			$this->objConexion = new Conexion();			
		}

		public function ConsultarDatos(){
			$this->objConexion->conectar();
			$query = "CALL SPusuario('SELECT', '$this->idUsuario', null, null, null, null, null, null)";
			$resultado = $this->objConexion->cone->query($query);
			if($resultado->num_rows > 0 ){
				$fila = $resultado->fetch_assoc();
				$this->correo = $fila['Correo'];
				$this->imagen = $fila['Foto'];
				$this->nickname = $fila['NickName'];
				$this->NombreCompleto = $fila['NombreCompleto'];
				$this->objConexion->desconectar();
				return true;
			}
			else {
				$this->objConexion->desconectar();
				return false;
			}
		}

		public function VerificarCorreoUnico(){
			$this->objConexion->conectar();
			$query = "CALL SPusuario('S', null, null, '$this->correo', null, null, null, null)"; 
			
			$resultadoCorreo = $this->objConexion->cone->query($query);

			if($resultadoCorreo->num_rows > 0){
					$this->objConexion->desconectar();
					return true;
			}
			else{
				$this->objConexion->desconectar();
				return false;
			}
		}

		public function InsertarUsuario($pImagen){
			$this->objConexion->conectar();
			$query = "CALL SPusuario('I', null, '$this->NombreCompleto', '$this->correo', '$this->nickname', '$this->pass', '$pImagen', null)";

			$resultado = $this->objConexion->cone->query($query);

			if($resultado){
				$this->objConexion->desconectar();
				return true; 
			}
			else{
				$this->objConexion->desconectar();
				return false; 	
			}
		}

		public function InicioDeSesion(){
			$this->objConexion->conectar();
			$query = "CALL SPusuario('S', null, null, '$this->correo', '$this->nickname', null, null, null)";
			$resultado = $this->objConexion->cone->query($query);

			$fila = $resultado->fetch_assoc();
			$passSQL = $fila['pass'];
			$this->idUsuario = $fila['idusuario'];
			$this->imagen = base64_encode($fila['Foto']);
			if($resultado->num_rows > 0 && password_verify($this->pass, $passSQL)){
				$this->objConexion->desconectar();
				return true;
			}
			else{
				echo "Correo: " . $this->correo . "<br>";
				echo "Contraseña: " . $this->pass . "<br>";
				echo "Contraseña Hash Mysql: " . $passSQL . "<br>";
				echo "Correo Hash Mysql: " . $fila['Correo'] . "<br>";
				$this->objConexion->desconectar();
				return false;
			}
		}

		#---------------------------------------------------------------------------
				public function getIdUsuario(){
					return $this->idUsuario;
				}

				public function setIdUsuario($pIdUsuario){
					$this->idUsuario = $pIdUsuario;
				}
		#---------------------------------------------------------------------------
				public function getNombreCompleto(){
					return $this->NombreCompleto;
				}

				public function setNombre($pNombreCompleto){
					$this->NombreCompleto = $pNombreCompleto;
				}
		#---------------------------------------------------------------------------
				public function getCorreo(){
					return $this->correo;
				}

				public function setCorreo($pCorreo){
					$this->correo = $pCorreo;
				}
		#---------------------------------------------------------------------------
				public function getNickName(){
					return $this->nickname;
				}

				public function setNickName($pNickName){
					$this->nickname = $pNickName;
				}
		#---------------------------------------------------------------------------
				public function getPassword(){
					return $this->pass;
				}

				public function setPassword($pPassword){
					$this->pass = $pPassword;
				}
		#---------------------------------------------------------------------------
				public function getImagen(){
					return $this->imagen;
				}

				public function setImagen($pImagen){
					$this->imagen = $pImagen;
				}
		#---------------------------------------------------------------------------

	}


?>