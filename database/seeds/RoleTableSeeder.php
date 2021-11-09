<?php

use Illuminate\Database\Seeder;

use App\Model\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'role' => 'Super Admin',
                'slug' => 'super-admin',
                'hint' => 'Can access all panel in admin',
                'status' => 1,
            ],

            [
                'role' => 'Admin',
                'slug' => 'admin',
                'hint' => 'Can access only specific panel in admin',
                'status' => 1,
            ],

            [
                'role' => 'Customer',
                'slug' => 'customer',
                'hint' => 'Can not access panel in admin',
                'status' => 1,
            ],
        ];

        foreach ($data as $row){
            Role::create($row);
        }
    }
}
