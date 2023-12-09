<?php

namespace App\Database\Seeds;

use App\Models\Employee;
use CodeIgniter\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $employeeModel = new Employee();
        $data = [
            [
                'name' => 'Employee 1',
                'position' => 'Manager',
                'salary' => '10000000'
            ],
            [
                'name' => 'Employee 2',
                'position' => 'Supervisor',
                'salary' => '8000000'
            ],
            [
                'name' => 'Employee 1',
                'position' => 'Team Leader',
                'salary' => '6000000'
            ],

        ];

        foreach ($data as $value) {
            $employeeModel->skipValidation();
            $employeeModel->insert($value);
        }
    }
}
