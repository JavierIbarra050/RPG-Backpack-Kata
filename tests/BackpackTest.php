<?php

namespace Deg540\CleanCodeKata9\Test;

use Deg540\CleanCodeKata9\Backpack;
use PHPUnit\Framework\TestCase;

class BackpackTest extends TestCase
{
    /**
     * @test
     */
    public function givenEmptyActionReturnsEmptyString()
    {
        $backpack = new Backpack();

        $contenidoBackpack = $backpack->gestionarBackpack("");

        $this->assertEquals("", $contenidoBackpack);
    }

    /**
     * @test
     */
    public function givenEquipOneObjectReturnsBackpackContent()
    {
        $backpack = new Backpack();

        $contenidoBackpack = $backpack->gestionarBackpack("equipar espada");

        $this->assertEquals("espada x1", $contenidoBackpack);
    }

    /**
     * @test
     */
    public function givenEquipAnyOneObjectReturnsBackpackContent()
    {
        $backpack = new Backpack();

        $contenidoBackpack = $backpack->gestionarBackpack("equipar poción");

        $this->assertEquals("poción x1", $contenidoBackpack);
    }

    /**
     * @test
     */
    public function givenEquipTwoObjectReturnsThatObjectX2()
    {
        $backpack = new Backpack();

        $contenidoBackpack = $backpack->gestionarBackpack("equipar poción 2");

        $this->assertEquals("poción x2", $contenidoBackpack);
    }
}
