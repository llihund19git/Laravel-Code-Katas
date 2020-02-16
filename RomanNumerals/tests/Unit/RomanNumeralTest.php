<?php

namespace Tests\Unit;

use App\RomanNumeral;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RomanNumeralTest extends TestCase
{

    function romanNumeral()
    {
        return new RomanNumeral();
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_1()
    {
        $result = $this->romanNumeral()->convert(1);

        $this->assertEquals('I', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_2()
    {
        $result = $this->romanNumeral()->convert(2);

        $this->assertEquals('II', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_4()
    {
        $result = $this->romanNumeral()->convert(4);

        $this->assertEquals('IV', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_5()
    {
        $result = $this->romanNumeral()->convert(5);

        $this->assertEquals('V', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_6()
    {
        $result = $this->romanNumeral()->convert(6);

        $this->assertEquals('VI', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_9()
    {
        $result = $this->romanNumeral()->convert(9);

        $this->assertEquals('IX', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_10()
    {
        $result = $this->romanNumeral()->convert(10);

        $this->assertEquals('X', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_11()
    {
        $result = $this->romanNumeral()->convert(11);

        $this->assertEquals('XI', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_20()
    {
        $result = $this->romanNumeral()->convert(20);

        $this->assertEquals('XX', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_50()
    {
        $result = $this->romanNumeral()->convert(50);

        $this->assertEquals('L', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_100()
    {
        $result = $this->romanNumeral()->convert(100);

        $this->assertEquals('C', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_500()
    {
        $result = $this->romanNumeral()->convert(500);

        $this->assertEquals('D', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_1000()
    {
        $result = $this->romanNumeral()->convert(1000);

        $this->assertEquals('M', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_1999()
    {
        $result = $this->romanNumeral()->convert(1999);

        $this->assertEquals('MCMXCIX', $result);
    }

    /** @test */
    function it_calculates_the_roman_numeral_for_4999()
    {
        $result = $this->romanNumeral()->convert(4999);

        $this->assertEquals('MMMMCMXCIX', $result);
    }
}
