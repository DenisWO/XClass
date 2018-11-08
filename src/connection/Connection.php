<?php
class Connection{
	private $servidor = "localhost";
	private $banco = "XClass";
	private $usuario = "root";
	private $senha = "";
	public $conn;
	public function getConnection(){
		$this->conn = null;
		try{
			$this->conn = new mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);
		}catch(PDOException $exception){
			throw new CannotConnectSQLException("Não foi possivel conectar ao banco de dados", trigger_error(mysqli_connect_errno()));
		}
		return $this->conn;
	}
}
?>
