<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'user_id' => 1,
            'capacity' => 50,
            'title' => 'ALGS',
            'image' => 'イメージ画像',
            'comment' => 'test',
            'date' => '2025-12-26',
            'format' => '0',
            'type' => '0',
            'is_visible' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
