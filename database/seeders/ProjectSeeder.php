<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'id'           => '1',
            'project_name' => 'Brand Design',
        ]);
        DB::table('projects')->insert([
            'id'           => '2',
            'project_name' => 'Brochure & Flyer',
        ]);
        DB::table('projects')->insert([
            'id'           => '3',
            'project_name' => 'Digital Banner',
        ]);
        DB::table('projects')->insert([
            'id'           => '4',
            'project_name' => 'Poster',
        ]);
        DB::table('projects')->insert([
            'id'           => '5',
            'project_name' => 'UI/UX',
        ]);
        DB::table('projects')->insert([
            'id'           => '6',
            'project_name' => 'Cover',
        ]);
        DB::table('projects')->insert([
            'id'           => '7',
            'project_name' => 'Typograph',
        ]);
        DB::table('projects')->insert([
            'id'           => '8',
            'project_name' => 'Infographic',
        ]);
        DB::table('projects')->insert([
            'id'           => '9',
            'project_name' => 'T-Shirt',
        ]);
        DB::table('projects')->insert([
            'id'           => '10',
            'project_name' => 'Motion Graphics',
        ]);
        DB::table('projects')->insert([
            'id'           => '11',
            'project_name' => 'Vector Sketch',
        ]);
        DB::table('projects')->insert([
            'id'           => '12',
            'project_name' => 'Performance',
        ]);
    }
}
