<?php

namespace App\Http\Controllers;

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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $userLink = $this->userLinkService->create($data['username'], $data['phone']);

        return redirect()->to("/link/{$userLink->uuid}");
    }
}
