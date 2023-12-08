<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployeeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'employee_id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'position' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'salary' => [
                'type' => 'double',
                'constraint' => '15,2'
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true
            ]
        ]);
        $this->forge->addPrimaryKey('employee_id');
        $this->forge->createTable('tb_employees');
    }

    public function down()
    {
        $this->forge->dropTable('tb_employees');
    }
}
