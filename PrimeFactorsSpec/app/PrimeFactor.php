<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrimeFactor extends Model
{
    public function generate($number)
    {
        $primes = [];

        for ($candidate = 2; $number > 1; $candidate++)
        {
            for (; $number % $candidate == 0; $number /= $candidate)
            {
                $primes[] = $candidate;
            }
        }

        return $primes;
    }
}
