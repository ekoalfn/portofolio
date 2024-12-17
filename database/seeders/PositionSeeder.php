<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;
class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            ['id' => 1, 'name' => 'Other'],
            ['id' => 2, 'name' => 'Laravel Developer'], 
            ['id' => 3, 'name' => 'ReactJS Developer'],
            ['id' => 4, 'name' => 'VueJS Developer'],
            ['id' => 5, 'name' => 'Full-Stack Laravel'],
            ['id' => 6, 'name' => 'NextJs Developer'],
            ['id' => 7, 'name' => 'DevOps Engineer'],
            ['id' => 8, 'name' => 'React Native Developer'],
            ['id' => 9, 'name' => 'NodeJs Developer'],
            ['id' => 10, 'name' =>'Python Developer'],
            ['id' => 11, 'name' =>'Flutter Developer'],
            ['id' => 12, 'name' =>'Golang Developer'],
            ['id' => 13, 'name' =>'QA Tester'],
        ];

        foreach ($positions as $item) {
            Position::create($item);
        }

    }
}
