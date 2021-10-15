<?php
include 'config.php';

class Model {

	private $con;
	private $conexion;
	private $fecha;

	public function __construct() {
		$this->con = new Config();
		$this->conexion = $this->con->conexion();
		$this->fecha = $this->con->fecha();
	}

	function productos() {
        $query_producto = "SELECT * FROM producto";

		$result = mysqli_query($this->conexion, $query_producto);

        return $result;
	}

	function crea($nombre, $referencia, $precio, $peso, $categoria, $stock) {
		//La función "mysqli_real_escape_string", la utilizo para evitar posibles inyecciones SQL
	    $nombre = mysqli_real_escape_string($this->conexion, $nombre);
	    $referencia = mysqli_real_escape_string($this->conexion, $referencia);
	    $precio = mysqli_real_escape_string($this->conexion, $precio);
	    $peso = mysqli_real_escape_string($this->conexion, $peso);
    	$categoria = mysqli_real_escape_string($this->conexion, $categoria);
	    $stock = mysqli_real_escape_string($this->conexion, $stock);

        $query="INSERT INTO producto (nombre, referencia, precio, peso, categoria, stock, fecha_creacion) 
                VALUES ('".$nombre."','".$referencia."','".$precio."','".$peso."','".$categoria."','".$stock."','".$this->fecha."')";

    	$this->conexion->query($query) or die(mysqli_errno($this->conexion) . ": " . mysqli_error($this->conexion) . " ");

        return "insert";
	}

	function busca_producto($id) {
		$id = mysqli_real_escape_string($this->conexion, $id);

        $query_producto = "SELECT * FROM producto WHERE id_producto = '".$id."'";
		$result = mysqli_query($this->conexion, $query_producto);

        return $result;
	}

	function modifica($id_producto, $nombre, $referencia, $precio, $peso, $categoria, $stock) {
	    $id_producto = mysqli_real_escape_string($this->conexion, $id_producto);
	    $nombre = mysqli_real_escape_string($this->conexion, $nombre);
	    $referencia = mysqli_real_escape_string($this->conexion, $referencia);
	    $precio = mysqli_real_escape_string($this->conexion, $precio);
	    $peso = mysqli_real_escape_string($this->conexion, $peso);
	    $categoria = mysqli_real_escape_string($this->conexion, $categoria);
	    $stock = mysqli_real_escape_string($this->conexion, $stock);

        $query="UPDATE producto
        		SET nombre='".$nombre."', referencia='".$referencia."', precio='".$precio."', peso='".$peso."', categoria='".$categoria."', stock='".$stock."'
                WHERE id_producto = '".$id_producto."'";

    	$this->conexion->query($query) or die(mysqli_errno($this->conexion) . ": " . mysqli_error($this->conexion) . " ");

        return "update";
	}

	function elimina($id) {
		$id = mysqli_real_escape_string($this->conexion, $id);

        $query="DELETE FROM producto WHERE id_producto = '".$id."'";
		mysqli_query($this->conexion, $query);

        return "delete";
	}

	function producto() {
        $query_producto="SELECT * FROM producto";
		$result = mysqli_query($this->conexion, $query_producto);

        return $result;
	}

	function venta($id_producto, $cantidad) {
	    $id_producto = mysqli_real_escape_string($this->conexion, $id_producto);
	    $cantidad = mysqli_real_escape_string($this->conexion, $cantidad);

	    $query_producto = "SELECT * FROM producto WHERE id_producto = '".$id_producto."'";
		$result = mysqli_query($this->conexion, $query_producto);
		$info_producto = $result->fetch_array();

		$total_stock = $info_producto['stock'] - $cantidad;

		if ($total_stock < 0) {
			return "error";
		} else {
			$query="INSERT INTO venta (id_producto, cantidad_venta, fecha_venta) 
                	VALUES ('".$id_producto."','".$cantidad."','".$this->fecha."')";
    		$this->conexion->query($query) or die(mysqli_errno($this->conexion) . ": " . mysqli_error($this->conexion) . " ");

    		$act_stock = "UPDATE producto SET stock='".$total_stock."' WHERE id_producto = '".$id_producto."'";
    		$this->conexion->query($act_stock) or die(mysqli_errno($this->conexion) . ": " . mysqli_error($this->conexion) . " ");

    		return "ok";
		}
	}

	function totalVenta() {
        $query="SELECT a.*, b.cantidad_venta, b.fecha_venta
				FROM producto a
				INNER JOIN venta b ON a.id_producto = b.id_producto";
		$result = mysqli_query($this->conexion, $query);

        return $result;
	}
}

?>