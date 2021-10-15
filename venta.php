<?php
    require_once ("model.php");

    $info_producto = new Model();
    $array_producto = $info_producto->producto();
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
                            <h2>Venta de Productos</h2>
                        </div>
                        <a href="index.php"><button class="btn btn-primary text-right">Regresar</button></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" action="controller.php" class="form-horizontal" id="valida_datos">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Seleccione producto *</label>
                            <div class="col-sm-5">
                                <select name="id_producto" id="id_producto" class="form-control">
                                    <option></option>
                                    <?php
                                        while ($row_producto = $array_producto->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $row_producto['id_producto'];?>"><?php echo $row_producto['nombre'];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Cantidad *</label>
                            <div class="col-sm-5">
                                <input type="text" name="cantidad" id="cantidad" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-4">
                                <button class="btn btn-primary" type="submit" name="btn_venta">Realizar compra</button>
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
                    id_producto: {
                        required: true
                    },

                    cantidad: {
                        required: true,
                        digits: true
                    }
                },
            });

            <?php
                if (isset($_GET['error'])) {
            ?>
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 7000
                        };
                        toastr.error('La cantidad ingresada supera el total del Stock');

                    }, 100);
            <?php
                } if (isset($_GET['ok'])) {
            ?>
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 7000
                        };
                        toastr.success('Venta registrada sin problemas');

                    }, 100);
            <?php
                }
            ?>
        });
    </script>
</body>

</html>
