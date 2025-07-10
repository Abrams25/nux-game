<?php

namespace App\Services\LuckyAttempt;

class LuckyWinCalculator
{
    private array $rules = [
        900 => 70,
        600 => 50,
        300 => 30,
        0   => 10,
    ];

    /**
     * @param int $number
     * @param string $result
     * @return float
     */
    public function getWinAmount(int $number, string $result): float
    {
        if ($result !== LuckyTypes::WIN->value) {
            return 0;
        }

        foreach ($this->rules as $threshold => $percentage) {
            if ($number > $threshold) {
                return round($number * $percentage / 100, 2);
            }
        }

        return 0;
    }
}
