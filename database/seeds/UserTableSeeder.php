<?php

use Illuminate\Database\Seeder;

use App\Model\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name' => 'super_admin',
            'email' => 'root@neputer.com',
            'password' => bcrypt('secret'),
            'verification_token' => '',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $row = DB::table('users')->where('email', 'root@neputer.com')->first();


        $role = Role::where('slug', 'super-admin')->first();
        $role->users()->sync([$row->id]);
    }
}
