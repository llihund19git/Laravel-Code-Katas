<?php

namespace Tests\Unit;

use App\BowlingGame;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BowlingGameTest extends TestCase
{

    /** @test */
    function it_scores_a_gutter_game_as_zero()
    {
        $bowling = new BowlingGame();

        $this->rollTimes($bowling, 20, 0);

        $this->assertEquals(0, $bowling->score());
    }

    /** @test */
    function it_scores_the_sum_of_all_knocked_down_pins_for_a_game()
    {
        $bowling = new BowlingGame();

        $this->rollTimes($bowling, 20, 1);

        $this->assertEquals(20, $bowling->score());
    }

    /** @test */
    function it_awards_a_one_roll_bonus_for_every_spare()
    {
        $bowling = new BowlingGame();

        $this->rollSpare($bowling);
        $bowling->roll(5);

        $this->rollTimes($bowling, 17, 0);

        $this->assertEquals(20, $bowling->score());
    }

    /** @test */
    function it_awards_a_two_roll_bonus_for_every_strike()
    {
        $bowling = new BowlingGame();

        $bowling->roll(10);
        $bowling->roll(7);
        $bowling->roll(2);

        $this->rollTimes($bowling, 17, 0);

        $this->assertEquals(28, $bowling->score());
    }

    /** @test */
    function it_score_a_perfect_game()
    {
        $bowling = new BowlingGame();

        $this->rollTimes($bowling, 12, 10);

        $this->assertEquals(300 , $bowling->score());
    }

    /** @test */
    function it_takes_exception_with_invalid_rolls()
    {
        $bowling = new BowlingGame();

        $bowling->roll(-10);

        $this->assertEquals(300 , $bowling->score());
    }

    /**
     * @param BowlingGame $bowling
     */
    private function rollSpare(BowlingGame $bowling): void
    {
        $bowling->roll(2);
        $bowling->roll(8);
    }

    /**
     * @param BowlingGame $bowling
     * @param int $count
     * @param int $pins
     */
    private function rollTimes(BowlingGame $bowling, int $count, int $pins): void
    {
        for ($i = 0; $i < $count; $i++) {
            $bowling->roll($pins);
        }
    }
}
