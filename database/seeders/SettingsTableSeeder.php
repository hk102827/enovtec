<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('settings')->insert([
            ['key' => 'sidebar_color', 'value' => '#f8f9fa'],
            ['key' => 'text_color', 'value' => '#343a40'],
            ['key' => 'logo_color', 'value' => '#007bff'],
        ]);
    }
}
