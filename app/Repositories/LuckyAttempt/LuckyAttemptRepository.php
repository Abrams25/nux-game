<?php

namespace App\Repositories\LuckyAttempt;

use App\Models\UserLink;
use App\Models\LuckyAttempt;

class LuckyAttemptRepository
{
    /**
     * @param UserLink $link
     * @param int $number
     * @param string $result
     * @param float $amount
     * @return LuckyAttempt
     */
    public function store(UserLink $link, int $number, string $result, float $amount): LuckyAttempt
    {
        return LuckyAttempt::create([
            'user_link_id' => $link->id,
            'random_number' => $number,
            'result' => $result,
            'win_amount' => $amount,
        ]);
    }

    /**
     * @param UserLink $link
     * @param int $limit
     * @return array
     */
    public function getLastAttempts(UserLink $link, int $limit = 3): array
    {
        return LuckyAttempt::where('user_link_id', $link->id)
            ->latest()
            ->take($limit)
            ->get()
            ->toArray();
    }
}
