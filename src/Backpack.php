<?php

namespace Deg540\CleanCodeKata9;

class Backpack
{
    public function gestionarBackpack(string $accion): string
    {
        if(!$accion) return "";

        return "espada x1";
    }
}