<?php

namespace Deg540\CleanCodeKata9;

class Backpack
{
    private array $contenidosBackpack = [];
    private int $capacidad = 0;
    private int $capacidadMaxima = 10;
    private function mochilaAString(): string
    {
        $objetosMochilaEnString = [];
        foreach ($this->contenidosBackpack as $clave => $valor)
        {
            $objetosMochilaEnString[] = $clave . ' x' . $valor;
        }

        return implode(" - ", $objetosMochilaEnString);
    }

    public function gestionarBackpack(string $accion): string
    {
        if(!$accion) return "";

        $accion = explode(" ", $accion);

        if(strtolower($accion[0]) === "limpiar") { $this->contenidosBackpack = []; return ""; }
        if(strtolower($accion[0]) === "estado") { return "Ocupacion: " . $this->capacidad . "/" . $this->capacidadMaxima; }

        $verbo = strtolower($accion[0]);
        $objeto = strtolower($accion[1]);

        $cantidad = 1;
        if(count($accion) === 3){
            $cantidad = $accion[2];
        }

        $peso = 1;
        $mejoraCapacidad = 0;

        if ($objeto === "espada" || $objeto === "arco" || $objeto === "hacha") { $peso = 2; }
        elseif ($objeto === "saco" || $objeto === "bolsa") { $mejoraCapacidad = 2; }

        $peso *= $cantidad;
        $mejoraCapacidad *= $cantidad;

        if($verbo === "desequipar" && !isset($this->contenidosBackpack[$objeto])) { return "No tienes ese objeto en la mochila"; }

        if ($verbo === "desequipar")
        {
            if ($this->contenidosBackpack[$objeto] < $cantidad) { return "No tienes suficiente cantidad de ese objeto"; }

            elseif ($this->contenidosBackpack[$objeto] === $cantidad) { unset($this->contenidosBackpack[$objeto]); }

            else { $this->contenidosBackpack[$objeto] -= (int) $cantidad; }

            $this->capacidad -= $peso;
            $this->capacidadMaxima -= $mejoraCapacidad;

            return $this->mochilaAString();
        }

        if(!isset($this->contenidosBackpack[$objeto])) { $this->contenidosBackpack[$objeto] = (int) $cantidad; }
        else { $this->contenidosBackpack[$objeto] += (int) $cantidad; }

        if($this->capacidad > $this->capacidadMaxima) { return "Mochila llena: no hay espacio suficiente"; }

        $this->capacidad += $peso;
        $this->capacidadMaxima += $mejoraCapacidad;

        return $this->mochilaAString();
    }
}