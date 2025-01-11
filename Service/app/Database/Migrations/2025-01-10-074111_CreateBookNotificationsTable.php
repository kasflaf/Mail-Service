<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookNotificationsTable extends Migration
{
    public function up()
    {
        // Book Notifications Table
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'book_id'     => [
                'type'           => 'INT',
                'unsigned'      => true,
            ],
            'user_id'     => [
                'type'           => 'INT',
                'unsigned'      => true,
            ],
            'notified'    => [
                'type'           => 'BOOLEAN',
                'default'        => false,
            ],
            'created_at'    => ['type' => 'TIMESTAMP', 'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP')],
            'updated_at'    => ['type' => 'TIMESTAMP', 'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP')],
        ]);

        // Primary Key
        $this->forge->addKey('id', true);

        // Create Table
        $this->forge->createTable('book_notifications');
    }

    public function down()
    {
        // Drop Table
        $this->forge->dropTable('book_notifications');
    }
}
