<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public $name;

    public $points;

    /**
     * Player constructor.
     * @param $name
     * @param $points
     */
    public function __construct($name, $points)
    {
        $this->name = $name;
        $this->points = $points;
    }

    public function earnPoints($points)
    {
        $this->points = $points;
    }
}
