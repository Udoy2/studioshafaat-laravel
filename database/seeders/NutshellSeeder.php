<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class NutshellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nutshells')->insert([
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio nostrum corrupti atque? Saepe, qui exercitationem. Voluptatibus nemo cumque a vel iusto odio rem officia ratione enim. Voluptatem eveniet asperiores quasi?Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus expedita, corrupti delectus illo ipsum nobis reiciendis aliquam dolor odio. Praesentium nobis nemo blanditiis repellat suscipit libero quas et animi. Omnis. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla, ab laborum',
            'resume'      => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf',
        ]);
    }
}
