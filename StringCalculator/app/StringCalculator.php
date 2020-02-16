<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StringCalculator extends Model
{

    const MAX_NUMBER_ALLOWED = 1000;

    public function add($numbers)
    {
//        $numbers = explode(',', $numbers);

        $numbers = $this->parseNumbers($numbers);

        $solution = 0;

        foreach ($numbers as $number)
        {
            $this->guard_against_invalid_number($number);

            if ($number >= self::MAX_NUMBER_ALLOWED) continue;

            $solution += $number;
        }

        return $solution;
    }

    /**
     *
     * @param int $number
     */
    private function guard_against_invalid_number(int $number): void
    {
        if ($number < 0) throw new \InvalidArgumentException("Invalid number provided: {$number}");
    }

    /**
     * @param $numbers
     * @return array[]|false|string[]
     */
    private function parseNumbers($numbers)
    {
        return array_map('intval', preg_split('/\s*(,|\\\n)\s*/', $numbers));
    }
}
