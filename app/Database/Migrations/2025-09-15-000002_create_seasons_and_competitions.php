<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSeasonsAndCompetitions extends Migration
{
    public function up()
    {
        // Seasons table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'start_year' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
            'end_year' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('seasons');

        // Competitions table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'season_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('season_id', 'seasons', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('competitions');
    }

    public function down()
    {
        $this->forge->dropTable('competitions');
        $this->forge->dropTable('seasons');
    }
}
