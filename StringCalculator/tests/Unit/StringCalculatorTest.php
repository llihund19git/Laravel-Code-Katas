<?php

namespace Tests\Unit;

use App\StringCalculator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StringCalculatorTest extends TestCase
{

    function calculator()
    {
        return new StringCalculator();
    }

    /** @test */
    function it_translates_an_empty_string_into_zero()
    {
        $sum = $this->calculator()->add('');

        $this->assertEquals(0, $sum);
    }

    /** @test */
    function it_finds_the_sum_of_one_number()
    {
        $sum = $this->calculator()->add('5');

        $this->assertEquals(5, $sum);
    }

    /** @test */
    function it_finds_the_sum_of_two_number()
    {
        $sum = $this->calculator()->add('1,2');

        $this->assertEquals(3, $sum);
    }

    /** @test */
    function it_finds_the_sum_of_any_amount_of_numbers()
    {
        $sum = $this->calculator()->add('1,2,3,4,5');

        $this->assertEquals(15, $sum);
    }

    /** @test */
    function it_disallows_negative_numbers()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid number provided: -2');

        $this->calculator()->add('3,-2');
    }

    /** @test */
    function it_ignores_any_number_greater_than_or_equal_to_one_thousand()
    {
        $sum = $this->calculator()->add('2, 2, 1000');

        $this->assertEquals(4, $sum);
    }

    /** @test */
    function it_allows_for_new_line_delimiters()
    {
        $sum = $this->calculator()->add('2,2\n2');

        $this->assertEquals(6, $sum);
    }
}
