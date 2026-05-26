<?php

namespace Deg540\CleanCodeKata9;

class Backpack
{
    private array $contenidosBackpack = [];
    public function gestionarBackpack(string $accion): string
    {
        if(!$accion) return "";

        $accion = explode(" ", $accion);

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

                $this->contenidosBackpack[$objeto] -= (int) $cantidad;
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