<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Demo;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $demos = [

            ['id' => 1,'title' => "Demo 1", 'slug' => 'web-1','image' => 'demo-1.png'],
            ['id' => 2,'title' => "Demo 2", 'slug' => 'web-2','image' => 'demo-2.png'],
            ['id' => 3,'title' => "Demo 3", 'slug' => 'web-3','image' => 'demo-3.png'],
            ['id' => 4,'title' => "Demo 4", 'slug' => 'web-4','image' => 'demo-4.png'],
            ['id' => 5,'title' => "Demo 5", 'slug' => 'web-5','image' => 'demo-5.png'],
            ['id' => 6,'title' => "Demo 6", 'slug' => 'web-6','image' => 'demo-6.png'],
            ['id' => 7,'title' => "Demo 7", 'slug' => 'web-7','image' => 'demo-7.png'],
            ['id' => 8,'title' => "Demo 8", 'slug' => 'web-8','image' => 'demo-8.png'],
            ['id' => 9,'title' => "Demo 9", 'slug' => 'web-9','image' => 'demo-9.png'],
            ['id' => 10,'title' => "Demo 10", 'slug' => 'web-10','image' => 'demo-10.png'],
            ['id' => 11,'title' => "Demo 11", 'slug' => 'web-11','image' => 'demo-11.png'],
            ['id' => 12,'title' => "Demo 12", 'slug' => 'web-12','image' => 'demo-12.png'],
            ['id' => 13,'title' => "Demo 13", 'slug' => 'web-13','image' => 'demo-13.png']

        ];

        foreach ($demos as $item) {
            Demo::create($item);
        }
    }
}
