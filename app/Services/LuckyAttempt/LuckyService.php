<?php

namespace App\Services\LuckyAttempt;

use App\Dtos\LuckyResultDto\LuckyResultDto;
use App\Models\UserLink;
use App\Repositories\LuckyAttempt\LuckyAttemptRepository;

class LuckyService
{
    /**
     * @param LuckyAttemptRepository $repo
     * @param LuckyWinCalculator $calculator
     */
    public function __construct(
        private LuckyAttemptRepository $repo,
        private LuckyWinCalculator $calculator
    ) {}

    /**
     * @param UserLink $link
     * @return LuckyResultDto
     */
    public function generateLuckyResult(UserLink $link): LuckyResultDto
    {
        $number = rand(1, 1000);
        $result = $number % 2 === 0 ? LuckyTypes::WIN->value : LuckyTypes::LOSS->value;

        $amount = $this->calculator->getWinAmount($number, $result);

        $this->repo->store($link, $number, $result, $amount);

        return new LuckyResultDto($number, $result, $amount);
    }

    /**
     * @param UserLink $link
     * @return array
     */
    public function getHistory(UserLink $link): array
    {
        return $this->repo->getLastAttempts($link, 3);
    }
}
