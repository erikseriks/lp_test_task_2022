<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cv;

class CVSeeder extends Seeder
{
    /**
     * Seed the database
     *
     * @return void
     */
    public function run(): void
    {
        $item = Cv::create([
            'first_name' => 'Ēriks',
            'last_name' => 'Ķirsis',
            'phone' => '22471493',
            'email' => 'eriks.kirsis@gmail.com',
            'native_language' => 'Latviešu',
        ]);

        $item->education()->create([
            'name' => 'Vidzemes augstskola',
            'faculty' => 'IT',
            'field' => 'it...',
            'level' => 'Bakalaurs',
            'status' => 2,
            'start_year' => 2012,
            'start_month' => 9,
            'end_year' => 2016,
            'end_month' => null,
        ]);

        $exp = $item->experience()->create([
            'name' => 'SIA "GRC&Privacy Law"',
            'position' => 'Programmētājs',
            'work_load' => 'Pilna slodze',
            'start_year' => 2021,
            'start_month' => 8,
            'end_year' => null,
            'end_month' => null,
        ]);

        $item->experience()->create([
            'name' => 'Wash-Pal, iDevelop',
            'position' => 'Programmētājs',
            'work_load' => 'Pilna slodze',
            'start_year' => 2020,
            'start_month' => 8,
            'end_year' => 2021,
            'end_month' => 8,
        ]);

        $item->experience()->create([
            'name' => 'Scandiweb',
            'position' => 'Programmētājs',
            'work_load' => 'Pilna slodze',
            'start_year' => 2018,
            'start_month' => 4,
            'end_year' => 2020,
            'end_month' => 6,
        ]);

        $exp->skills()->create([
            'type' => '1',
            'description' => '
                <p>
                    <b>IT:</b><br>
                    PHP, JS, SQL, SCSS, Linux, Git, Arduino, AutoCAD<br>
                    <b>Citas</b><br>
                    CNC(GRBL)
                </p>
            ',
        ]);

        $item->languages()->create([
            'name' => 'Angļu',
            'listening' => 9,
            'reading' => 8,
            'talking' => 6,
            'writing' => 9,
        ]);

        $item->languages()->create([
            'name' => 'Krievu',
            'listening' => 3,
            'reading' => 2,
            'talking' => 2,
            'writing' => 1,
        ]);
    }
}
