<?php

namespace App\Services\UserLink;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Repositories\UserLink\UserLinkRepository;
use App\Models\UserLink;

class UserLinkService
{
    /**
     * @param UserLinkRepository $userLinkRepo
     */
    public function __construct(
        private UserLinkRepository $userLinkRepo
    ) {}

    /**
     * @param string $username
     * @param string $phone
     * @return UserLink
     */
    public function create(string $username, string $phone): UserLink
    {
        return $this->userLinkRepo->create([
            'username' => $username,
            'phone' => $phone,
            'uuid' => Str::uuid(),
            'expires_at' => Carbon::now()->addDays(7),
            'is_active' => true,
        ]);
    }

    /**
     * @param string $uuid
     * @return UserLink|null
     */
    public function findByUuid(string $uuid): ?UserLink
    {
        return $this->userLinkRepo->findByUuid($uuid);
    }

    /**
     * @param string $uuid
     * @return void
     */
    public function deactivate(string $uuid): void
    {
        $link = $this->userLinkRepo->findByUuid($uuid);
        if ($link) {
            $link->update(['is_active' => false]);
        }
    }

    /**
     * @param UserLink $oldLink
     * @return UserLink
     */
    public function regenerate(UserLink $oldLink): UserLink
    {
        $oldLink->update(['is_active' => false]);

        return $this->userLinkRepo->create([
            'username' => $oldLink->username,
            'phone' => $oldLink->phone,
            'uuid' => Str::uuid(),
            'expires_at' => Carbon::now()->addDays(7),
            'is_active' => true,
        ]);
    }
}
