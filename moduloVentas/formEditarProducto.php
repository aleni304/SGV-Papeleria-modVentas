<?php
class formAgregarProducto
{
    public function formEditarProductoShow($datosProducto, $listaCategoria)
    { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar producto</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>

        <body>
            <div>
                <p>Usuario conectado: <?php echo $_SESSION['usuario'] ?></p>
            </div>
            <div>
                <div>
                    <p>ID Producto</p>
                    <input type="text" name="" value="" readonly>
                </div>
                <div>
                    <p>Nombre Producto</p>
                    <input type="text" name="" value="">
                </div>
                <div>
                    <p>Descripción Producto</p>
                    <input type="text" name="" value="">
                </div>
                <div>
                    <p>Precio Producto</p>
                    <input type="number" min="1" name="" value="">
                </div>
                <div>
                    <p>Stock</p>
                    <input type="number" name="" value="">
                </div>
                <div>
                    <p>Categoria</p>
                    <select name="" id="">
                        <option value=""></option>
                    </select>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
        </body>

        </html>

        <?php
    }
}
?>