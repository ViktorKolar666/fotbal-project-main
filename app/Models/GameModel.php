<?php
namespace App\Models;

use CodeIgniter\Model;

class GameModel extends Model
{
    protected $table = 'fotbal_game';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [];
}