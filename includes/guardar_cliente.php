<?php

if (
    empty($_POST["Nombres"])
    ||
    empty($_POST["Apellidos"])
    ||
    empty($_POST["DNI"])
    ||
    empty($_POST["Fecha"])
    ||
    empty($_POST["RazonSocial"])
    ||
    empty($_POST["tokenCSRF"])
) {
    exit;
}

Utiles::salirSiTokenCSRFNoCoincide($_POST["tokenCSRF"]);
Clientes::nuevo($_POST["RazonSocial"], $_POST["Nombres"], $_POST["Apellidos"], $_POST["Fecha"], $_POST["DNI"]);
Utiles::redireccionar("clientes");
