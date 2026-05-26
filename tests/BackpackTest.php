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
    public function givenEquipAnyOneObjectReturnsBackpackContent()
    {
        $backpack = new Backpack();

        $contenidoBackpack = $backpack->gestionarBackpack("equipar poción");

        $this->assertEquals("poción x1", $contenidoBackpack);
    }

    /**
     * @test
     */
    public function givenEquipTwoObjectsReturnsThoseTwoObjects()
    {
        $backpack = new Backpack();

        $contenidoBackpack = $backpack->gestionarBackpack("equipar poción 4");
        $contenidoBackpack = $backpack->gestionarBackpack("equipar espada 2");


        $this->assertEquals("poción x4 - espada x2", $contenidoBackpack);
    }
}
