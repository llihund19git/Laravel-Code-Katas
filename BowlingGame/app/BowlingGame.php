<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BowlingGame extends Model
{

    /**
     * @var array
     */
    protected $rolls = [];

    /**
     * @param $pins
     */
    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    /**
     * @return int
     */
    public function score()
    {
        $score = 0;
        $roll = 0;

        for ($frame = 1; $frame <= 10; $frame++)
        {
            if ($this->isStrike($roll))
            {
                $score += 10 + $this->strikeBonus($roll);
                $roll += 1;
            }
            else if ($this->isSpare($roll))
            {
                $score += 10 + $this->spareBonus($roll);
                $roll += 2;
            }
            else
            {
                $score += $this->getDefaultFrameScore($roll);
                $roll += 2;
            }
        }

        return $score;
    }

    /**
     * @param int $roll
     * @return bool
     */
    public function isSpare(int $roll): bool
    {
        return $this->getDefaultFrameScore($roll) == 10;
    }

    /**
     * @param int $roll
     * @return int
     */
    public function getDefaultFrameScore(int $roll): int
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    /**
     * @param int $roll
     * @return bool
     */
    private function isStrike(int $roll): bool
    {
        return $this->rolls[$roll] == 10;
    }

    /**
     * @param int $roll
     * @return int
     */
    private function strikeBonus(int $roll): int
    {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    /**
     * @param int $roll
     * @return int
     */
    private function spareBonus(int $roll): int
    {
        return $this->rolls[$roll + 2];
    }
}
