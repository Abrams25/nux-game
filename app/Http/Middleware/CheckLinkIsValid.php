<?php

namespace App\Http\Middleware;

use App\Services\UserLink\UserLinkService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;

class CheckLinkIsValid
{
    /**
     * @param UserLinkService $userLinkService
     */
    public function __construct(
        private UserLinkService $userLinkService
    ) {}

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uuid = $request->route('uuid');
        $link = $this->userLinkService->findByUuid($uuid);

        if (!$link || !$link->is_active || $link->expires_at->lt(Carbon::now())) {
            abort(404, 'Link is not valid');
        }

        $request->merge(['userLink' => $link]);

        return $next($request);
    }
}
