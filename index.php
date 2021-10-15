<?php
    require_once ("model.php");

    $datos_productos = new Model();
    $array_producto = $datos_productos->productos();
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
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
</head>

<body>   
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-2">
                            <h2>Lista de productos</h2>
                        </div>
                        <a href="formulario.php"><button class="btn btn-primary text-right">Ingresar producto</button></a>
                        <a href="venta.php"><button class="btn btn-primary text-right">Venta de Productos</button></a>
                        <a href="total.php"><button class="btn btn-primary text-right">Total Ventas</button></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                                <tr>
                                    <th>ID Producto</th>
                                    <th>Nombre</th>
                                    <th>Referencia</th>
                                    <th>Precio</th>
                                    <th>Peso</th>
                                    <th>Categoría</th>
                                    <th>Stock</th>
                                    <th>Fecha de creación</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    while ($row_producto = $array_producto->fetch_assoc()) {
                                        $id = $row_producto['id_producto'];
                                ?>
                                        <tr>
                                            <th><?php echo $id;?></th>
                                            <th><?php echo $row_producto['nombre'];?></th>
                                            <th><?php echo $row_producto['referencia'];?></th>
                                            <th><?php echo number_format($row_producto['precio']);?></th>
                                            <th><?php echo $row_producto['peso'];?></th>
                                            <th><?php echo $row_producto['categoria'];?></th>
                                            <th><?php echo $row_producto['stock'];?></th>
                                            <th><?php echo $row_producto['fecha_creacion'];?></th>

                                            <th>
                                                <form method="post" action="formulario.php">
                                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                                    <button type="submit" class="btn btn-link" name="btn_editar"><i class="fa fa-edit"></i></button>
                                                </form>
                                            </th>
                                            <th>
                                                <form method="post" action="controller.php">
                                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                                    <button type="submit" class="btn btn-link" name="btn_eliminar"><i class="fa fa-eraser"></i></button>
                                                </form>
                                            </th>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/toastr/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 7000
                };
                toastr.success('John Alexander Llarave Herrán', 'Prueba Tecnica Konecta');

            }, 100);

            <?php
                if (isset($_GET['insert'])) {
            ?>
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 7000
                        };
                        toastr.success('Producto ingresado sin problemas');

                    }, 100);
            <?php
                } if (isset($_GET['delete'])) {
            ?>
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 7000
                        };
                        toastr.warning('Producto eliminado sin problemas');

                    }, 100);
            <?php
                } if (isset($_GET['update'])) {
            ?>
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 7000
                        };
                        toastr.warning('Producto modificado sin problemas');

                    }, 100);
            <?php
                }
            ?>

            $('.dataTables').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'archivo_pdf'},
                ]

            });
        });
    </script>
</body>

</html>
