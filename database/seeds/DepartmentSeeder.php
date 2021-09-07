<?php

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                "name" => "Design",
                'status' => 1,
            ],
            [
                "name" => "Development",
                'status' => 1,
            ],
            [
                "name" => "Marketing",
                'status' => 1,
            ],

        ];

        foreach ($departments as $department) {
            Department::firstOrCreate($department);
        }
    }
}
