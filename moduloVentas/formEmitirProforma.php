<?php
class formEmitirProforma
{
    public function formEmitirProformaShow($listaProductos, $listaCategoria)
    { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Emisión de Proforma</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>

        <body>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Código</td>
                            <td>Nombre</td>
                            <td>Categoría</td>
                            <td>Precio</td>
                            <td>Stock</td>
                            <td>Estado</td>
                            <td>Acción</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $categoriasPorId = [];
                        foreach ($listaCategoria as $categoria) {
                            $categoriasPorId[$categoria['idCategoria']] = $categoria['categoria'];
                        }

                        foreach ($listaProductos as $producto) {
                            $idProducto = $producto['idProducto'];
                            $codigo = $producto['codigo'];
                            $nombre = $producto['nombre'];
                            $categoriaId = $producto['idCategoria'];
                            $precio = $producto['precio'];
                            $stock = $producto['stock'];
                            $nombreCategoria = isset($categoriasPorId[$categoriaId]) ? $categoriasPorId[$categoriaId] : 'null';
                            ?>
                            <tr>
                                <td class="datosProducto" style="display: none;"><?php echo $idProducto?></td>
                                <td><?php echo $codigo; ?></td>
                                <td class="datosProducto"><?php echo $nombre; ?></td>
                                <td><?php echo $nombreCategoria; ?></td>
                                <td class="datosProducto"><?php echo $precio; ?></td>
                                <td class="datosProducto"><?php echo $stock; ?></td>
                                <td><?php echo $stock == 0 ? 'Agotado' : 'Disponible'; ?></td>
                                <td>
                                    <input type="button" class="btn <?php echo $stock == 0 ? 'btn-secondary' : 'btn-warning'; ?>"
                                        name="btnAgregarProducto" value="Agregar" <?php echo $stock == 0 ? 'disabled' : ''; ?>>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <input name="btnVisualizarLista" id="listaProforma" value="Ver lista de productos" class="btn btn-primary">
            </div>
            <div class="resumenProforma">
                <form action="../moduloVentas/getProforma.php" method="POST" class="formEmitirProforma">
                    <h2 class="subtitle"> Resumen de pedidos</h2>
                    <div>
                        <p style="text-align: left;">Productos seleccionados</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody class="listaProductos">

                            </tbody>
                        </table>
                    </div>
                    <input type="text" name="totalProforma" class="totalProforma" readonly>

                    <input type="submit" name="btnGenerarProforma" value="Generar Proforma" class="btn btn-primary">
                </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
            <script src="../assets/js/emitirProforma.js"></script>
        </body>

        </html>
        <?php
    }
}
?>