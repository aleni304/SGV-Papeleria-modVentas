<?php
class formGestionarInventario
{
    public function formGestionarInventarioShow($listaProductos)
    { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Gestión de Inventario</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>

        <body>
            <div>
                <p>Usuario conectado: <?php echo $_SESSION['usuario'] ?></p>
            </div>
            <form action="getBoleta.php" method="POST">
                <div class="input-group">
                    <input class="form-control" type="text" name="txtBuscarBoleta" placeholder="Buscar boleta"
                        aria-label="Search">
                    <button class="btn btn-light" type="submit" name="btnBuscarBoleta">Buscar</button>
                </div>
            </form>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID Producto</td>
                            <td>Nombre</td>
                            <td>Descripción</td>
                            <td>Precio</td>
                            <td>Stock</td>
                            <td>Categoría</td>
                            <td>Acción</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listaProductos as $producto) {
                            $idproducto = $producto['idproducto'];
                            $nom_producto = $producto['producto'];
                            $descripcion = $producto['descripcion'];
                            $precio = $producto['precio'];
                            $stock = $producto['stock'];
                            $idcategoria = $producto['idcategoria'];
                            ?>
                            <tr>
                                <td><?php echo $idproducto; ?></td>
                                <td><?php echo $nom_producto; ?></td>
                                <td><?php echo $descripcion; ?></td>
                                <td><?php echo $precio; ?></td>
                                <td><?php echo $stock; ?></td>
                                <td><?php echo $idcategoria; ?></td>
                                <td>
                                    <form action="getBoleta.php" method="POST">
                                        <input type="hidden" name="idBoleta" value="<?php echo $idproducto; ?>">
                                        <input type="submit" class="btn btn-secondary" name="btnVerDetalleBoleta"
                                            value="Ver detalle">
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
        </body>

        </html>

        <?php
    }
}

?>