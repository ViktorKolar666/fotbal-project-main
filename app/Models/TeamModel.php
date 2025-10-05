<?php
namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table = 'fotbal_team';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['name'];
}