<?php

namespace App\Dtos\LuckyResultDto;

class LuckyResultDto
{
    /**
     * @param int $number
     * @param string $result
     * @param float $amount
     */
    public function __construct(
        public readonly int $number,
        public readonly string $result,
        public readonly float $amount
    ) {}
}
