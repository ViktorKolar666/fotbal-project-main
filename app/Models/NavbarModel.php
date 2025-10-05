<?php
namespace App\Models;

use CodeIgniter\Model;

class NavbarModel extends Model
{
    protected $table = 'nav_item';
    protected $primaryKey = 'id';
    protected $allowedFields = ['label', 'url', 'order'];
    // Add more fields as needed
}
