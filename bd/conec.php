<?php
require_once 'cadeConexion.php'; // Incluye la clase de conexión

class BD
{

	private $conn;

	public function __construct()
    {
        // Crear una instancia de la clase Conexion y obtener la conexión
        $conexion = new Database();
        $this->conn = $conexion->getConexion();
    }

    public function __destruct()
    {
        $this->conn->close();
    }

	function actualizarEstados(){
		$sql = "UPDATE usuario_woods SET estadoActivo = 0, ultimoIntento = NULL WHERE estadoActivo = 1;";
		$this->conn->query($sql);	
	}

	function selecMarca()
	{
		$sql = "SELECT idmarcacelular,Nombre FROM marcacelular ORDER BY Nombre ASC;";
		$result = $this->conn->query($sql);
		return $result;
	}



	function selecMarca1()
	{
		$sql = "SELECT idmarcacelular,Nombre FROM marcacelular where Nombre <> 'ASUS' and Nombre <> 'black shark' and Nombre <> 'cubot' and Nombre <> 'Huawei' and Nombre <> 'lenovo' and Nombre <> 'realme' and Nombre <> 'red magic' and Nombre <> 'vivo' and Nombre <> 'zte' ORDER BY Nombre ASC;";
		$result = $this->conn->query($sql);
		return $result;
	}

	function selectModeloMarca($id)
	{
		$sql = "SELECT idmodelocelular,Nombre,MarcaID FROM modelocelular WHERE MarcaID= ' $id ' && Premium = 0 ORDER BY Nombre ASC";
		$result = $this->conn->query($sql);
		return $result;
	}

	function selectModeloMarcPremium($id)
	{
		$sql = "SELECT idmodelocelular,Nombre,MarcaID FROM modelocelular WHERE MarcaID= ' $id ' ORDER BY Nombre ASC ";
		$result = $this->conn->query($sql);
		return $result;
	}

	function insertar_registro($correo, $contra, $telefono)
	{
		$sql = "INSERT INTO usuario_woods(correo,contraSystem,estadoActivo,telefono) VALUES ( '" . $correo . "','" . $contra . "',0,'$telefono')";
		$this->conn->query($sql);
	}

	function selectMarcas(){
		$sql = "SELECT idmarcacelular,Nombre FROM marcacelular;";
		$result = $this->conn->query($sql);
		return $result;
	} 

	function selectModelosPorMarca($id){
		$sql = "SELECT idmodelocelular,Nombre, Premium from modelocelular where MarcaID = '$id' order by Premium desc;";
		$result = $this->conn->query($sql);
		return $result;
	}
	
	
	function buscarModelos($id){
		$sql = "SELECT idmodelocelular, Nombre, Premium FROM modelocelular WHERE idmodelocelular = ". $id;        
		$result = $this->conn->query($sql);
		return $result;
	}

	public function actualizarModelo($idmodelo, $nombre, $premium) {
		$sql = "UPDATE modelocelular SET Nombre = ?, Premium = ? WHERE idmodelocelular = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param('sii', $nombre, $premium, $idmodelo);
		return $stmt->execute();
	}
	
	
	public function insertarModelos($nombre, $marcaid, $premium){
		$sql = "INSERT INTO modelocelular (Nombre, MarcaID, Premium) VALUES ( ?, ? , ? );";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param('sii', $nombre, $marcaid, $premium);
		return $stmt->execute();
	}

	function selectUsuarios(){
		$sql = "SELECT id,correo,contraSystem,estadoActivo,telefono,DATE_FORMAT(ultimaActividad, 'Día: %d/%m/%y Hora: %H:%i') as ultimaActividad,DATE_FORMAT(ultimoIntento, 'Día: %d/%m/%y Hora: %H:%i') as ultimoIntento FROM usuario_woods;";
		$result = $this->conn->query($sql);
		return $result;
	}  


	 function selectTodoUsuarios($id){
		$sql = "SELECT * FROM usuario_woods WHERE id = ".$id;
		$result = $this->conn->query($sql);
		return $result;
	}


	public function actualizarUsuario($idusuario, $correo, $contra, $telefono) {
		$sql = "UPDATE usuario_woods SET correo = ?, contraSystem = ?, telefono = ? WHERE id = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param('sssi', $correo, $contra, $telefono, $idusuario);
		return $stmt->execute();
	}

	public function eliminarUsuario($idusuario) {
		$sql = "DELETE  FROM usuario_woods WHERE id = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param('i', $idusuario);
		return $stmt->execute();
	}


	public function insertarMarca($nombre){
		$sql = "INSERT INTO marcacelular (Nombre) VALUES (?);";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param('s', $nombre);
		return $stmt->execute();
	}


	function selectTodasMarcas($id){
		$sql = "SELECT * FROM marcacelular WHERE idmarcacelular = ".$id;
		$result = $this->conn->query($sql);
		return $result;
	}


	public function actualizarMarca($idmodelo, $nombre) {
		$sql = "UPDATE marcacelular SET Nombre = ? WHERE idmarcacelular = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param('si', $nombre, $idmodelo);
		return $stmt->execute();
	}

	public function agregarSensibilidades( $idusuario, $idmarca, $fecha ,$sensibilidad) {
		$sql = "INSERT INTO sensibilidades (_usuario, _modelo, fecha, sensibilidad) VALUES (?, ?, ?, ?)	;";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param('iiss', $idusuario, $idmarca,  $fecha, $sensibilidad);
		return $stmt->execute();
	}

	
	function selectSensi($idusuario) {
    $sql = "
        SELECT 
            m.Nombre AS modelo,
            ma.Nombre AS marca,
            s.sensibilidad 
        FROM sensibilidades AS s 
        INNER JOIN modelocelular AS m ON s._modelo = m.idmodelocelular 
        INNER JOIN marcacelular AS ma ON m.MarcaID = ma.idmarcacelular 
        WHERE s._usuario = $idusuario 
		ORDER BY s.fecha DESC
        ;
    ";
    $result = $this->conn->query($sql);
    return $result;
}
}
