<?php

require_once ("model.php");

class Controller {

	function creaProducto() {
		$nombre = $_POST['nombre'];
		$referencia = $_POST['referencia'];
		$precio = $_POST['precio'];
		$peso = $_POST['peso'];
		$categoria = $_POST['categoria'];
		$stock = $_POST['stock'];

		$crea_producto = new Model();
		$result = $crea_producto->crea($nombre, $referencia, $precio, $peso, $categoria, $stock);

		if ($result == 'insert') {
			header("location:index.php?insert");
		}
	}

	function actualizaProducto() {
		$id_producto = $_POST['id_producto'];
		$nombre = $_POST['nombre'];
		$referencia = $_POST['referencia'];
		$precio = $_POST['precio'];
		$peso = $_POST['peso'];
		$categoria = $_POST['categoria'];
		$stock = $_POST['stock'];

		$edita_producto = new Model();
		$result = $edita_producto->modifica($id_producto, $nombre, $referencia, $precio, $peso, $categoria, $stock);

		if ($result == 'update') {
			header("location:index.php?update");
		}
	}

	function eliminaProducto() {
		$id = $_POST['id'];

		$elimina_producto = new Model();
		$result = $elimina_producto->elimina($id);

		if ($result == 'delete') {
			header("location:index.php?delete");
		}
	}

	function registraVenta() {
		$id_producto = $_POST['id_producto'];
		$cantidad = $_POST['cantidad'];

		$crea_venta = new Model();
		$result = $crea_venta->venta($id_producto, $cantidad);

		if ($result == 'error') {
			header("location:venta.php?error");
		}

		if ($result == 'ok') {
			header("location:venta.php?ok");
		}
	}
}

if (isset($_POST['btn_guardar'])) {
	$crea = new Controller();
	$crea->creaProducto();
}

if (isset($_POST['btn_actualizar'])) {
	$actualiza = new Controller();
	$actualiza->actualizaProducto();
}

if (isset($_POST['btn_eliminar'])) {
	$elimina = new Controller();
	$elimina->eliminaProducto();
}

if (isset($_POST['btn_venta'])) {
	$registra = new Controller();
	$registra->registraVenta();
}


?>