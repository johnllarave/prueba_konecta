<?php
    require_once ("model.php");

    $datos_ventas = new Model();
    $array_ventas = $datos_ventas->totalVenta();
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
                            <h2>Total de ventas</h2>
                        </div>
                        <a href="index.php"><button class="btn btn-primary text-right">Regresar</button></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                                <tr>
                                    <th>ID Producto</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio unidad</th>
                                    <th>Total Venta</th>
                                    <th>Fecha Venta</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    while ($row_ventas = $array_ventas->fetch_assoc()) {
                                        $total = $row_ventas['cantidad_venta'] * $row_ventas['precio'];
                                ?>
                                        <tr>
                                            <th><?php echo $row_ventas['id_producto'];?></th>
                                            <th><?php echo $row_ventas['nombre'];?></th>
                                            <th><?php echo $row_ventas['cantidad_venta'];?></th>
                                            <th><?php echo number_format($row_ventas['precio']);?></th>
                                            <th><?php echo number_format($total);?></th>
                                            <th><?php echo $row_ventas['fecha_venta'];?></th>
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
