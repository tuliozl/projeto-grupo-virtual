<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserAlterTable extends Migration
{
    public function up()
    {
        $field = [
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                "null"  => true
            ]
        ];

        $this->forge->addColumn('customer', $field); 
    }

    public function down()
    {
        //
    }
}
