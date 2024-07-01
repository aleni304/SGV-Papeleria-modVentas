<?php
class formVerDetalleBoleta
{
    public function formVerDetalleBoletaShow($detalleBoleta)
    { 
        $numBoleta = isset($detalleBoleta[0]['numeroBoleta']) ? $detalleBoleta[0]['numeroBoleta'] : '';
        $idboleta = isset($detalleBoleta[0]['idboleta']) ? $detalleBoleta[0]['idboleta'] : '';
        $total = isset($detalleBoleta[0]['total']) ? $detalleBoleta[0]['total'] : '';
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detalles de boleta | Registrar despacho</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>

        <body>
            <div>
                <p>Usuario conectado: <?php echo $_SESSION['usuario'] ?></p>
            </div>
            <div>
                <p>Boleta <?php echo $numBoleta?></p>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Código Producto</td>
                            <td>Nombre</td>
                            <td>Cantidad</td>
                            <td>Subtotal</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($detalleBoleta as $detalle) {
                            $codigo = $detalle['codigo'];
                            $nombre = $detalle['nombre'];
                            $cantidad = $detalle['cantidad'];
                            $subtotal = $detalle['subtotal'];
                            ?>
                            <tr>
                                <td><?php echo $codigo; ?></td>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $cantidad; ?></td>
                                <td><?php echo $subtotal; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div>
                    <p>Total</p>
                    <input type="text" value="<?php echo $total?>" readonly>
                </div>
                <div>
                    <p>id Boleta</p>
                    <input type="text" value="<?php echo $idboleta?>" readonly>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
        </body>

        </html>
        <?php
    }
} ?>