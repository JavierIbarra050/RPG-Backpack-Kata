<?php

namespace Deg540\CleanCodeKata9;

class Backpack
{
    private $contenidosBackpack = [];
    public function gestionarBackpack(string $accion): string
    {
        if(!$accion) return "";

        $accion = explode(" ", $accion);

        $objeto = $accion[1];
        $cantidad = 1;

        if(count($accion) === 3){
            $cantidad = $accion[2];
        }

        $this->contenidosBackpack[$objeto] = (int) $cantidad;

        foreach ($this->contenidosBackpack as $clave => $valor) {
            return $clave . ' x' . $valor;
        }

        return "";
    }
}