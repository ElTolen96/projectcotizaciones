<?php
if (empty($_GET["id"])) exit;
$cliente = Clientes::porId($_GET["id"]);
if ($cliente === null || $cliente === FALSE) {
    Utiles::redireccionar("clientes");
}
$tokenCSRF = Utiles::obtenerTokenCSRF();
?>
<div class="row">
    <div class="col-sm">
        <h1>Editar cliente</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm">
        <form  method="post" action="<?php echo BASE_URL ?>/?p=actualizar_cliente">
        <input name="id" type="hidden" value="<?php echo $cliente->id ?>">
            <input type="hidden" name="tokenCSRF" value="<?php echo $tokenCSRF ?>">
            <div class="form-group">
                <label for="Nombre">Nombre </label>
                <input value="<?= $cliente->Nombre  ?>" autofocus name="Nombre" autocomplete="off" required type="text" class="form-control"
                       id="Nombre" placeholder="Por ejemplo: Luis">
            <div class="form-group">
                <label for="Apellidos">Apellidos </label>
                <input value="<?= $cliente->Apellidos  ?>" autofocus name="Apellidos" autocomplete="off" required type="text" class="form-control"
                       id="Apellidos" placeholder="Por ejemplo: Tolentino Véliz">

            <div class="form-group">
                <label for="RazonSocial"> Razon Social </label>
                <input value="<?= $cliente->razonSocial  ?>" autofocus name="RazonSocial" autocomplete="off" required type="text" class="form-control"
                       id="RazonSocial" placeholder="Por ejemplo: desmonte de techo">
            </div>
            <div class="form-group">
                <label for="DNI"> DNI </label>
                <input value="<?= $cliente->DNI  ?>" autofocus name="DNI" autocomplete="off" required type="text" class="form-control"
                       id="DNI" placeholder="Por ejemplo: 72199550">
            </div>
            <div class="form-group">
                <label for="Fecha"> Fecha </label>
                <input  value="<?= $cliente->Fecha  ?>" autofocus name="Fecha" autocomplete="off" required type="Date" class="form-control"
                       id="Fecha" placeholder="Por ejemplo: 72199550">
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-success" href="<?php echo BASE_URL ?>/?p=clientes">&larr; Volver</a>
        </form>
    </div>
</div>