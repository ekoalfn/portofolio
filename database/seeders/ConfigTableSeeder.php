<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
  
    public function run()
    {
        $data = [
            'app.name' =>'Dimas Ahmad',
            'app.url' => 'https://yanafriyoko.com',
            'mail.from.name' => 'Dimas Ahmad',
            'mail.from.address' => 'mail.yanafriyoko@gmail.com',
            'mail.default' => 'smtp',
            'mail.mailers.smtp.host' => 'smtp.gmail.com',
            'mail.mailers.smtp.port' => '587',
            'mail.mailers.smtp.username' => 'akhlakulaziz@gmail.com',
            'mail.mailers.smtp.password' => 'jyastgrehcyxgrfu',
            'mail.mailers.smtp.encryption' => 'ssl',
            'mail.from.app_logo' =>'yan-afriyoko.png',
            'mail.from.app_favicon' =>'favicon.png',
            'mail.from.app_description' =>'I\'m Dimas Ahmad, a Software Engineer with over 7 years of experience. Ive completed 32+ projects using technologies like Laravel, ExpressJs, NextJs, and NuxtJs, and have experience as a Lead Developer',
            'mail.from.reload' => 3000,
        ];

        foreach ($data as $key => $value) {
            $config = \App\Models\Configs::firstOrCreate(['key' => $key]);
            $config->value = $value;
            $config->save();
        }
    }
}
