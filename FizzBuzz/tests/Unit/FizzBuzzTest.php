<?php

namespace Tests\Unit;

use App\FizzBuzz;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FizzBuzzTest extends TestCase
{

    function fizzBuzz()
    {
        return new FizzBuzz();
    }

    /** @test */
    function it_translates_1_for_fizzbuzz()
    {
        $result = $this->fizzBuzz()->execute(1);

        $this->assertEquals(1, $result);
    }

    /** @test */
    function it_translates_2_for_fizzbuzz()
    {
        $result = $this->fizzBuzz()->execute(2);

        $this->assertEquals(2, $result);
    }

    /** @test */
    function it_translates_3_for_fizzbuzz()
    {
        $result = $this->fizzBuzz()->execute(3);

        $this->assertEquals('fizz', $result);
    }

    /** @test */
    function it_translates_5_for_fizzbuzz()
    {
        $result = $this->fizzBuzz()->execute(5);

        $this->assertEquals('buzz', $result);
    }

    /** @test */
    function it_translates_6_for_fizzbuzz()
    {
        $result = $this->fizzBuzz()->execute(6);

        $this->assertEquals('fizz', $result);
    }

    /** @test */
    function it_translates_10_for_fizzbuzz()
    {
        $result = $this->fizzBuzz()->execute(10);

        $this->assertEquals('buzz', $result);
    }

    /** @test */
    function it_translates_15_for_fizzbuzz()
    {
        $result = $this->fizzBuzz()->execute(15);

        $this->assertEquals('fizzbuzz', $result);
    }

    /** @test */
    function it_translates_123_for_fizzbuzz()
    {
        $result = $this->fizzBuzz()->execute(123);

        $this->assertEquals('fizz', $result);
    }

    /** @test */
    function it_translates_sequence_of_numbers_for_fizzbuzz()
    {
        $result = $this->fizzBuzz()->executeUpTo(10);

        $this->assertEquals([1, 2, 'fizz', 4, 'buzz', 'fizz', 7, 8, 'fizz', 'buzz'], $result);
    }
}
