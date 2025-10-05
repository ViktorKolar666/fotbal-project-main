<?php
namespace App\Controllers;

use App\Models\SeasonModel;
use App\Models\LeagueSeasonModel;
use App\Models\LeagueModel;
use CodeIgniter\Controller;

class SeasonController extends Controller
{
    public function index()
        {
            $seasonModel = new SeasonModel();
            $perPage = 25;
            $page = (int)($this->request->getGet('page') ?? 1);
            $total = $seasonModel->countAll();
            $seasons = $seasonModel->orderBy('start', 'DESC')->paginate($perPage, 'seasons', $page);
            $pager = $seasonModel->pager;
            return view('seasons/index', [
                'seasons' => $seasons,
                'pager' => $pager
            ]);
        }

    public function competitions($seasonId)
    {
        $seasonModel = new SeasonModel();
        $leagueSeasonModel = new LeagueSeasonModel();
        $leagueModel = new LeagueModel();
        $season = $seasonModel->find($seasonId);
        if (!$season) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // Najdi všechny soutěže v této sezóně
        $leagueSeasons = $leagueSeasonModel->where('id_season', $seasonId)->findAll();
        $competitions = [];
        foreach ($leagueSeasons as $leagueSeason) {
            $competition = $leagueModel->find($leagueSeason->id_league);
            if ($competition) {
                $competitions[] = $competition;
            }
        }
        return view('seasons/competitions', [
            'season' => $season,
            'competitions' => $competitions
        ]);
    }
}
