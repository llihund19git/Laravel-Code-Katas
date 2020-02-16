<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tennis extends Model
{
    /**
     * @var Player
     */
    protected $player1;

    protected $player2;

    protected $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];


    /**
     * Tennis constructor.
     * @param Player $player1
     * @param Player $player2
     */
    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score()
    {
        if ($this->hasAWinner())
        {
            return 'Win for '. $this->winner()->name;
        }

        if ($this->hasTheAdvantage())
        {
            return 'Advantage ' . $this->winner()->name;
        }

        if ($this->inDeuce())
        {
            return 'Deuce';
        }

        return $this->generalScore();
    }

    /**
     * @return bool
     */
    private function isTied(): bool
    {
        return $this->player1->points == $this->player2->points;
    }

    private function hasAWinner()
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByAtLeastTwo();
    }

    private function winner()
    {
        return $this->player1->points > $this->player2->points ? $this->player1 : $this->player2;
    }

    /**
     * @return bool
     */
    private function hasTheAdvantage(): bool
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByOne();
    }

    /**
     * @return bool
     */
    private function inDeuce(): bool
    {
        return $this->atLeastTotalOfSixPoints() && $this->isTied();
    }

    /**
     * @return string
     */
    private function generalScore(): string
    {
        $score = $this->lookup[$this->player1->points] . '-';

        return $score .= $this->isTied() ? 'All' : $this->lookup[$this->player2->points];
    }

    /**
     * @return bool
     */
    private function isLeadingByOne(): bool
    {
        return abs($this->player1->points - $this->player2->points) >= 1;
    }

    /**
     * @return bool
     */
    private function atLeastTotalOfSixPoints(): bool
    {
        return $this->player1->points + $this->player2->points >= 6;
    }

    /**
     * @return bool
     */
    private function hasEnoughPointsToBeWon(): bool
    {
        return max([$this->player1->points, $this->player2->points]) >= 4;
    }

    /**
     * @return bool
     */
    private function isLeadingByAtLeastTwo(): bool
    {
        return abs($this->player1->points - $this->player2->points) >= 2;
    }
}
