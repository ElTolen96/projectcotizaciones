<?php

class Clientes
{
    public static function nuevo($razonSocial,$Nombres,$Apellidos,$Fecha,$DNI)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("insert into clientes(razonSocial,idUsuario, Nombre, Apellidos, Fecha, DNI) VALUES (?,?, ?, ?, ?, ?);");
        return $sentencia->execute([$razonSocial,SesionService::obtenerIdUsuarioLogueado(),$Nombres,$Apellidos,$Fecha,$DNI]);
    }

    public static function actualizar($id, $razonSocial,$Nombres,$Apellidos,$DNI,$Fecha)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("update clientes set razonSocial = ?,Nombre =?,Apellidos=?,Fecha=?,DNI=? where id = ? and idUsuario = ?;");
        return $sentencia->execute([$razonSocial,$Nombres,$Apellidos,$Fecha,$DNI, $id, SesionService::obtenerIdUsuarioLogueado()]);
    }

    public static function todos()
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("select * from clientes ");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public static function porId($id)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("select * from clientes where id = ? and idUsuario = ?;");
        $sentencia->execute([$id, SesionService::obtenerIdUsuarioLogueado()]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public static function eliminar($id)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("delete from clientes where id = ? and idUsuario = ?;");
        return $sentencia->execute([$id, SesionService::obtenerIdUsuarioLogueado()]);
    }
}
