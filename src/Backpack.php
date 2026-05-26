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

        if(!isset($this->contenidosBackpack[$objeto]))
        {
            $this->contenidosBackpack[$objeto] = (int) $cantidad;
        }
        else
        {
            $this->contenidosBackpack[$objeto] += (int) $cantidad;
        }

        $objetosMochilaEnString = [];
        foreach ($this->contenidosBackpack as $clave => $valor) {
            $objetosMochilaEnString[] = $clave . ' x' . $valor;
        }

        return implode(" - ", $objetosMochilaEnString);
    }
}