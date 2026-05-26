<?php

namespace Deg540\CleanCodeKata9;

class Backpack
{
    public function gestionarBackpack(string $accion): string
    {
        if(!$accion) return "";

        $accion = explode(" ", $accion);

        return $accion[1] . "x1";
    }
}