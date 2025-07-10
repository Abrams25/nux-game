<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Services\UserLink\UserLinkService;

class RegisterController extends Controller
{
    /**
     * @param UserLinkService $userLinkService
     */
    public function __construct(private UserLinkService $userLinkService)
    {}

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function form()
    {
        return view('register');
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $userLink = $this->userLinkService->create($request->getUsername(), $request->getPhone());

        return redirect()->to("/link/{$userLink->uuid}");
    }
}
