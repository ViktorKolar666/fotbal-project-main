<?php
namespace App\Controllers;

use App\Models\SeasonModel;
use App\Models\LeagueSeasonModel;
use App\Models\LeagueModel;
use App\Models\GameModel;
use App\Models\TeamModel;
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
        $leagueSeasons = $leagueSeasonModel->where('id_season', $seasonId)->findAll();
        $competitions = [];
        foreach ($leagueSeasons as $leagueSeason) {
            $competition = $leagueModel->find($leagueSeason->id_league);
            if ($competition) {
                $competition->league_season_id = $leagueSeason->id;
                $competitions[] = $competition;
            }
        }
        return view('seasons/competitions', [
            'season' => $season,
            'competitions' => $competitions,
            'seasonId' => $seasonId
        ]);
    }

    // Nová metoda pro zobrazení zápasů všech soutěží v sezóně seskupených po kolech
    public function seasonGames($seasonId)
    {
        $seasonModel = new SeasonModel();
        $leagueSeasonModel = new LeagueSeasonModel();
        $gameModel = new GameModel();
        $teamModel = new TeamModel();
        $leagueModel = new LeagueModel();

        $season = $seasonModel->find($seasonId);
        if (!$season) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Najdi všechny league_season pro tuto sezónu
        $leagueSeasons = $leagueSeasonModel->where('id_season', $seasonId)->findAll();
        $leagueSeasonIds = array_column($leagueSeasons, 'id');
        $leagueNames = [];
        foreach ($leagueSeasons as $ls) {
            $league = $leagueModel->find($ls->id_league);
            if ($league) {
                $leagueNames[$ls->id] = $league->name;
            }
        }

        // Najdi všechny zápasy této sezóny
        $games = [];
        if ($leagueSeasonIds) {
            $games = $gameModel->whereIn('id_league_season', $leagueSeasonIds)->orderBy('round', 'ASC')->orderBy('date', 'ASC')->findAll();
        }

        // Načti týmy
        $teamIds = [];
        foreach ($games as $game) {
            $teamIds[$game->home] = true;
            $teamIds[$game->away] = true;
        }
        $teams = [];
        if ($teamIds) {
            $teamObjs = $teamModel->whereIn('id', array_keys($teamIds))->findAll();
            foreach ($teamObjs as $t) {
                $teams[$t->id] = $t;
            }
        }

        // Seskup zápasy po kolech a soutěžích
        $gamesByRound = [];
        foreach ($games as $game) {
            $leagueSeasonId = $game->id_league_season;
            $round = $game->round;
            $gamesByRound[$leagueSeasonId][$round][] = $game;
        }

        return view('seasons/games', [
            'season' => $season,
            'gamesByRound' => $gamesByRound,
            'teams' => $teams,
            'leagueNames' => $leagueNames,
            'seasonId' => $seasonId
        ]);
    }

    public function games($seasonId, $leagueSeasonId)
    {
        $gameModel = new GameModel();
        $leagueSeasonModel = new LeagueSeasonModel();
        $leagueModel = new LeagueModel();
        $teamModel = new TeamModel();

        $leagueSeason = $leagueSeasonModel->find($leagueSeasonId);
        if (!$leagueSeason) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $competition = $leagueModel->find($leagueSeason->id_league);

        // Stránkování zápasů v této soutěži a sezóně
        $perPage = 25;
        $games = $gameModel
            ->where('id_league_season', $leagueSeasonId)
            ->orderBy('round', 'ASC')
            ->orderBy('date', 'ASC')
            ->paginate($perPage, 'games');
        $pager = $gameModel->pager;

        // Načti názvy týmů
        $teams = [];
        foreach ($games as $game) {
            $teams[$game->home] = null;
            $teams[$game->away] = null;
        }
        if ($teams) {
            $teamObjs = $teamModel->whereIn('id', array_keys($teams))->findAll();
            foreach ($teamObjs as $t) {
                $teams[$t->id] = $t;
            }
        }

        // Seskup zápasy po kolech
        $gamesByRound = [];
        foreach ($games as $game) {
            $gamesByRound[$game->round][] = $game;
        }

        return view('seasons/games', [
            'competition' => $competition,
            'gamesByRound' => $gamesByRound,
            'teams' => $teams,
            'seasonId' => $seasonId,
            'leagueSeasonId' => $leagueSeasonId,
            'pager' => $pager
        ]);
    }

    public function gameDetail($gameId)
    {
        $gameModel = new GameModel();
        $teamModel = new TeamModel();
        $game = $gameModel->find($gameId);
        if (!$game) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $homeTeam = $teamModel->find($game->home);
        $awayTeam = $teamModel->find($game->away);

        return view('seasons/game_detail', [
            'game' => $game,
            'homeTeam' => $homeTeam,
            'awayTeam' => $awayTeam
        ]);
    }

    public function team($teamId)
    {
        // Prázdná stránka týmu (ne 404)
        return view('seasons/team', ['teamId' => $teamId]);
    }
}
