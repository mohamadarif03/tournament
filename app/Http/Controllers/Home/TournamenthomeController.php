<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Interfaces\GameInterface;
use App\Contracts\Interfaces\HomeTournamentDetailInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Tournament;
use App\Services\TournamentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TournamenthomeController extends Controller
{
    private HomeTournamentDetailInterface $tournamentdetail;
    private GameInterface $game;
    private TournamentService $service;

    public function __construct(HomeTournamentDetailInterface $tournamentdetail, GameInterface $game, TournamentService $service)
    {
        $this->tournamentdetail = $tournamentdetail;
        $this->game = $game;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function detail(Tournament $tournament): View
    {
        $tournamentdetail = $this->tournamentdetail->get();
        return view('pages.home.tournament-detail', compact('tournamentdetail', 'tournament'));
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View|JsonResponse
     */
    public function list(Request $request): View|JsonResponse
    {
        $service = $this->service->HandleTournamentFilter($request);

        if ($request->ajax()) {
            $view = view('pages.cursor.infinite-tournament')->with('tournamentlist', $service['tournamentlist'])->render();

            return ResponseHelper::success([
                'html' => $view,
                'nextCursor' => $service['nextCursor']
            ]);
        }
        $games = $this->game->get();
        
       
        return view('pages.home.tournament-list', [
            'tournamentlist' => $service['tournamentlist'],
            'nextCursor' => $service['nextCursor'],
            'games' => $games
        ]);
    }
}