<?php

namespace Deg540\CleanCodeKata9;

class Backpack
{
    private array $contenidosBackpack = [];
    private int $capacidad = 0;
    private int $capacidadMaxima = 10;
    public function gestionarBackpack(string $accion): string
    {
        if(!$accion) return "";

        $accion = explode(" ", $accion);

        if($accion[0] === "limpiar")
        {
            $this->contenidosBackpack = [];
            return "";
        }

        if($accion[0] === "estado") { return "0"; }

        $verbo = $accion[0];
        $objeto = $accion[1];
        $cantidad = 1;

        if(count($accion) === 3){
            $cantidad = $accion[2];
        }

        if(!isset($this->contenidosBackpack[$objeto]))
        {
            if($verbo === "desequipar"){ return "No tienes ese objeto en la mochila"; }

            $this->contenidosBackpack[$objeto] = (int) $cantidad;
        }
        else
        {
            if ($verbo === "desequipar")
            {
                if ($this->contenidosBackpack[$objeto] < $cantidad) { return "No tienes suficiente cantidad de ese objeto"; }

                elseif ($this->contenidosBackpack[$objeto] === $cantidad) { unset($this->contenidosBackpack[$objeto]); }

                else { $this->contenidosBackpack[$objeto] -= (int) $cantidad; }
            }
            elseif ($verbo === "equipar") { $this->contenidosBackpack[$objeto] += (int) $cantidad; }
        }

        $objetosMochilaEnString = [];
        foreach ($this->contenidosBackpack as $clave => $valor)
        {
            $objetosMochilaEnString[] = $clave . ' x' . $valor;
        }

        return implode(" - ", $objetosMochilaEnString);
    }
}