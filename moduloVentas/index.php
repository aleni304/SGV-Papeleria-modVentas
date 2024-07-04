<?php
session_start();

// Simular autenticación
$idUsuario = 1;
$usuario = 'Alexia';

// Almacenar información en la sesión
$_SESSION['usuario'] = $usuario;
$_SESSION['idUsuario'] = $idUsuario;

?>
<div>
    <p>Usuario conectado: <?php echo $_SESSION['usuario']?></p>
</div>
<h3>Bienvenido!</h3>
<form action="getProforma.php" method="POST">
    <input type="submit" value="Emitir proforma" name="btnEmitirProforma">
</form>
<form action="getBoleta.php" method="POST">
    <input type="submit" value="Registrar despacho" name="btnRegistrarDespacho">
</form>
<form action="getInventario.php" method="POST">
    <input type="submit" value="Gestionar inventario" name="btnGestionarInventario">
</form>
<?php
?>