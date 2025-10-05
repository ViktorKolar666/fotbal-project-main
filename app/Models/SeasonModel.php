<?php
namespace App\Models;

use CodeIgniter\Model;

class SeasonModel extends Model
{
    protected $table = 'season';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'start', 'finish'];
    protected $returnType = 'object';
}


class LeagueSeasonModel extends Model
{
    protected $table = 'fotbal_league_season';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_league', 'id_season', 'created_at', 'updated_at', 'deleted_at'];
    protected $returnType = 'object';
}

class LeagueModel extends Model
{
    protected $table = 'fotbal_league';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'logo', 'level', 'created_at', 'updated_at', 'deleted_at'];
    protected $returnType = 'object';
}
