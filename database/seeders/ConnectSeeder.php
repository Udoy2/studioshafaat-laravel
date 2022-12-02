<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ConnectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('connects')->insert([
            'phone_number' => '01730710519',
            'email'        => 'studioshafaat@gmail.com',
            'facebook_link' => '#',
            'instagram_link' => '#',
            'youtube_link'   => '#',
            'whatsapp_link'  => '#',
            'linkedin_link'  => '#',
        ]);
    }
}
