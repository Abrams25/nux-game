<?php

namespace App\Http\Controllers;

use App\Services\LuckyAttempt\LuckyService;
use Illuminate\Http\Request;
use App\Models\UserLink;
use App\Services\UserLink\UserLinkService;


class LinkController extends Controller
{
    /**
     * @param UserLinkService $userLinkService
     * @param LuckyService $luckyService
     */
    public function __construct(
        private UserLinkService $userLinkService,
        private LuckyService $luckyService
    ) {}

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function index(Request $request)
    {
        /** @var UserLink $userLink */
        $userLink = $request->get('userLink');

        return view('link', compact('userLink'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|object
     */
    public function deactivate(Request $request)
    {
        $userLink = $request->get('userLink');
        $this->userLinkService->deactivate($userLink->uuid);

        return redirect('/')->with('status', 'Link deactivated');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|object
     */
    public function regenerate(Request $request)
    {
        $userLink = $request->get('userLink');
        $newLink = $this->userLinkService->regenerate($userLink);
        if ($newLink) {
            return redirect("/link/{$newLink->uuid}")->with('status', 'Link regenerated');
        }

        return redirect("/link/{$newLink->uuid}")->withErrors('Error regenerating link');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function lucky(Request $request)
    {
        $userLink = $request->get('userLink');
        $result = $this->luckyService->generateLuckyResult($userLink);

        return view('lucky_result', compact('result'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function history(Request $request)
    {
        $userLink = $request->get('userLink');
        $history = $this->luckyService->getHistory($userLink);

        return view('history', compact('history', 'userLink'));
    }
}
