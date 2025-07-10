<?php

namespace App\Repositories\UserLink;

use App\Models\UserLink;

class UserLinkRepository
{
    /**
     * @param array $data
     * @return UserLink
     */
    public function create(array $data): UserLink
    {
        return UserLink::query()->create($data);
    }

    /**
     * @param string $uuid
     * @return UserLink|null
     */
    public function findByUuid(string $uuid): ?UserLink
    {
        return UserLink::query()->where('uuid', $uuid)->first();
    }
}
