<?php
if (
    empty($_POST["Nombre"])
    ||
    empty($_POST["Apellidos"])
    ||
    empty($_POST["RazonSocial"])
    ||
    empty($_POST["DNI"])
    ||
    empty($_POST["Fecha"])
    ||
    empty($_POST["id"])
    ||
    empty($_POST["tokenCSRF"])
) {
    exit;
}
Utiles::salirSiTokenCSRFNoCoincide($_POST["tokenCSRF"]);

Clientes::actualizar($_POST["id"], $_POST["RazonSocial"],$_POST["Nombre"],$_POST["Apellidos"],$_POST["DNI"],$_POST["Fecha"]);
Utiles::redireccionar("clientes");
