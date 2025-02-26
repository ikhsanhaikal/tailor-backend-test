<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAccount extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'default' => 'tabungan'
            ],
            'balance' => [
                'type' => 'float',
                'unsigned' => true,
                'null' => true
            ],
            'customer_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
        ];
        $this->forge->addField($fields)
        ->addPrimaryKey('id')
        ->addForeignKey('customer_id', 'customers', 'id');

        $this->forge->createTable("accounts");
    }

    public function down()
    {
        $this->forge->dropTable("accounts");
    }
}
