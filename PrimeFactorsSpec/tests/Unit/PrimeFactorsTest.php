<?php

namespace Tests\Unit;

use App\PrimeFactor;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrimeFactorsTest extends TestCase
{
    function primeFactor()
    {
        return new PrimeFactor();
    }

    /** @test */
    function it_returns_an_empty_array_for_1()
    {
        $result = $this->primeFactor()->generate(1);

        $this->assertEquals([], $result);
    }

    /** @test */
    function it_returns_2_for_2()
    {
        $result = $this->primeFactor()->generate(2);

        $this->assertEquals([2], $result);
    }

    /** @test */
    function it_returns_3_for_3()
    {
        $result = $this->primeFactor()->generate(3);

        $this->assertEquals([3], $result);
    }

    /** @test */
    function it_returns_2_2_for_4()
    {
        $result = $this->primeFactor()->generate(4);

        $this->assertEquals([2, 2], $result);
    }

    /** @test */
    function it_returns_5_for_5()
    {
        $result = $this->primeFactor()->generate(5);

        $this->assertEquals([5], $result);
    }

    /** @test */
    function it_returns_2_3_for_6()
    {
        $result = $this->primeFactor()->generate(6);

        $this->assertEquals([2, 3], $result);
    }

    /** @test */
    function it_returns_3_3_for_9()
    {
        $result = $this->primeFactor()->generate(9);

        $this->assertEquals([3, 3], $result);
    }

    /** @test */
    function it_returns_2_2_5_5_for_100()
    {
        $result = $this->primeFactor()->generate(100);

        $this->assertEquals([2, 2, 5, 5], $result);
    }
}
