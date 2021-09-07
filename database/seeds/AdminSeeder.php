<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins_data = array(
            array(
                'name' => 'Admin',
                'mobile' => '1234567890',
                'email' => 'admin@application.com',
                'password' => '12345678',
                'status' => 1,
            )
        );

        foreach ($admins_data as $admin_item) {
            $admin = Admin::firstOrCreate([
                'name' => $admin_item['name'],
                'mobile' => $admin_item['mobile'],
                'email' => $admin_item['email'],
                'password' => $admin_item['password'],
                'status' => $admin_item['status'],
            ]);
        }
    }
}
