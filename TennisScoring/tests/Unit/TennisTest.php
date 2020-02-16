<?php

namespace Tests\Unit;

use App\Player;
use App\Tennis;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TennisTest extends TestCase
{
    protected $tennis, $john, $jane;


    function initializeData()
    {
        $this->john = new Player('John Doe', 0);
        $this->jane = new Player('Jane Doe', 0);
        $this->tennis = new Tennis($this->john, $this->jane);

    }

    /** @test */
    function it_scores_a_scoreless_game()
    {
        $this->initializeData();

        $result = $this->tennis->score();

        $this->assertEquals('Love-All', $result);
    }

    /** @test */
    function it_scores_a_1_0_game()
    {
        $this->initializeData();

        $this->john->earnPoints(1);

        $result = $this->tennis->score();

        $this->assertEquals('Fifteen-Love', $result);
    }

    /** @test */
    function it_scores_a_2_0_game()
    {
        $this->initializeData();

        $this->john->earnPoints(2);

        $result = $this->tennis->score();

        $this->assertEquals('Thirty-Love', $result);
    }

    /** @test */
    function it_scores_a_3_0_game()
    {
        $this->initializeData();

        $this->john->earnPoints(3);

        $result = $this->tennis->score();

        $this->assertEquals('Forty-Love', $result);
    }

    /** @test */
    function it_scores_a_4_0_game()
    {
        $this->initializeData();

        $this->john->earnPoints(4);

        $result = $this->tennis->score();

        $this->assertEquals('Win for John Doe', $result);
    }

    /** @test */
    function it_scores_a_0_4_game()
    {
        $this->initializeData();

        $this->jane->earnPoints(4);

        $result = $this->tennis->score();

        $this->assertEquals('Win for Jane Doe', $result);
    }

    /** @test */
    function it_scores_a_4_3_game()
    {
        $this->initializeData();

        $this->john->earnPoints(4);
        $this->jane->earnPoints(3);

        $result = $this->tennis->score();

        $this->assertEquals('Advantage John Doe', $result);
    }

    /** @test */
    function it_scores_a_3_4_game()
    {
        $this->initializeData();

        $this->john->earnPoints(3);
        $this->jane->earnPoints(4);

        $result = $this->tennis->score();

        $this->assertEquals('Advantage Jane Doe', $result);
    }

    /** @test */
    function it_scores_a_3_3__game()
    {
        $this->initializeData();

        $this->john->earnPoints(3);
        $this->jane->earnPoints(3);

        $result = $this->tennis->score();

        $this->assertEquals('Deuce', $result);
    }

    /** @test */
    function it_scores_a_8_8_game()
    {
        $this->initializeData();

        $this->john->earnPoints(8);
        $this->jane->earnPoints(8);

        $result = $this->tennis->score();

        $this->assertEquals('Deuce', $result);
    }

    /** @test */
    function it_scores_a_8_9_game()
    {
        $this->initializeData();

        $this->john->earnPoints(8);
        $this->jane->earnPoints(9);

        $result = $this->tennis->score();

        $this->assertEquals('Advantage Jane Doe', $result);
    }

    /** @test */
    function it_scores_a_8_10_game()
    {
        $this->initializeData();

        $this->john->earnPoints(8);
        $this->jane->earnPoints(10);

        $result = $this->tennis->score();

        $this->assertEquals('Win for Jane Doe', $result);
    }
}
