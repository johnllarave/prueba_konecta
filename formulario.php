<?php
    require_once ("model.php");

    if (isset($_POST['btn_editar'])) {

        $tipo_formulario = "Actualizar";
        $op_boton = "btn_actualizar";
        $boton = "Actualizar";

        $datos_producto = new Model();
        $array_producto = $datos_producto->busca_producto($_POST['id']);
        $info_producto = $array_producto->fetch_array();
    } else {
        $tipo_formulario = "Crear";
        $op_boton = "btn_guardar";
        $boton = "Guardar";
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prueba tecnica</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
</head>

<body>   
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-2">
                            <h2><?php echo $tipo_formulario;?> Producto</h2>
                        </div>
                        <a href="index.php"><button class="btn btn-primary text-right">Visualizar Productos</button></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" action="controller.php" class="form-horizontal" id="valida_datos">
 
                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-6">
                                <small>Los campos marcados con (*) son obligatorios</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nombre producto *</label>
                            <div class="col-sm-5">
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre completo del producto" class="form-control" value="<?php echo $info_producto['nombre'];?>">
                                <input type="hidden" name="id_producto" value="<?php echo $info_producto['id_producto'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Referencia *</label>
                            <div class="col-sm-5">
                                <input type="text" name="referencia" id="referencia" placeholder="Referencia del producto" class="form-control" value="<?php echo $info_producto['referencia'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Precio *</label>
                            <div class="col-sm-5">
                                <input type="text" name="precio" id="precio" placeholder="Precio del producto" class="form-control" value="<?php echo $info_producto['precio'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Peso *</label>
                            <div class="col-sm-5">
                                <input type="text" name="peso" id="peso" placeholder="Peso del producto" class="form-control" value="<?php echo $info_producto['peso'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Categoria *</label>
                            <div class="col-sm-5">
                                <input type="text" name="categoria" id="categoria" placeholder="Categoria del producto" class="form-control" value="<?php echo $info_producto['categoria'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Stock *</label>
                            <div class="col-sm-5">
                                <input type="text" name="stock" id="stock" placeholder="Stock del producto" class="form-control" value="<?php echo $info_producto['stock'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-4">
                                <button class="btn btn-primary" type="submit" name="<?php echo $op_boton;?>"><?php echo $boton;?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script src="js/plugins/toastr/toastr.min.js"></script>
    <script src="js/jquery.validate.js"></script>

    <script>
        $(document).ready(function() {
            $("#valida_datos").validate({
                rules: {
                    nombre: {
                        required: true
                    },

                    referencia: {
                        required: true
                    },

                    precio: {
                        required: true,
                        digits: true
                    },

                    peso: {
                        required: true
                    },

                    categoria: {
                        required: true
                    },

                    stock: {
                        required: true
                    }
                },
            });
        });
    </script>
</body>

</html>
