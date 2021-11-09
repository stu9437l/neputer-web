<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
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
                'panel_id' => \DB::table('panels')->where('title', 'product')->pluck('id')->first(),
                'action_id' => \DB::table('actions')->where('title', 'show')->pluck('id')->first(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'rank' => 1

            ],
            [
                'panel_id' => \DB::table('panels')->where('title', 'category')->pluck('id')->first(),
                'action_id' => \DB::table('actions')->where('title', 'create')->pluck('id')->first(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'rank' => 1

            ],
            [
                'panel_id' => \DB::table('panels')->where('title', 'category')->pluck('id')->first(),
                'action_id' => \DB::table('actions')->where('title', 'show')->pluck('id')->first(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

                'rank' => 2

            ],
            [
                'panel_id' => \DB::table('panels')->where('title', 'category')->pluck('id')->first(),
                'action_id' => \DB::table('actions')->where('title', 'edit')->pluck('id')->first(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

                'rank' => 3

            ],
            [
                'panel_id' => \DB::table('panels')->where('title', 'category')->pluck('id')->first(),
                'action_id' => \DB::table('actions')->where('title', 'delete')->pluck('id')->first(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

                'rank' => 4

            ],
            [
                'panel_id' => \DB::table('panels')->where('title', 'page')->pluck('id')->first(),
                'action_id' => \DB::table('actions')->where('title', 'create')->pluck('id')->first(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

                'rank' => 1

            ],
            [
                'panel_id' => \DB::table('panels')->where('title', 'page')->pluck('id')->first(),
                'action_id' => \DB::table('actions')->where('title', 'show')->pluck('id')->first(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

                'rank' => 2

            ],
            [
                'panel_id' => \DB::table('panels')->where('title', 'page')->pluck('id')->first(),
                'action_id' => \DB::table('actions')->where('title', 'edit')->pluck('id')->first(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

                'rank' => 3

            ],
            [
                'panel_id' => \DB::table('panels')->where('title', 'page')->pluck('id')->first(),
                'action_id' => \DB::table('actions')->where('title', 'delete')->pluck('id')->first(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'rank' => 4

            ],
            [
                'panel_id' => \DB::table('panels')->where('title', 'page')->pluck('id')->first(),
                'action_id' => \DB::table('actions')->where('title', 'create')->pluck('id')->first(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),

                'rank' => 1

            ],

        ];

        foreach ($data as $row) {
            \DB::table('permission')->insert([
                $row
            ]);
        }
    }
}
