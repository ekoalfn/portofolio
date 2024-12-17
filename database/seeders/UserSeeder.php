<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Dimas Ahmad',
            'email' => 'mail.yanafriyoko@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1qazxsw2@Nine'),
            'phone_number' => '0896532394884',
            'description'=> "Hi! I'm Dimas Ahmad, a Software Engineer with more than 7+ years of experience. I have successfully completed more than 200+ projects using the latest technologies such as Laravel, ExpressJs, NextJs, and NuxtJs, I am ready to collaborate with you!",
            'instagram' => 'https://www.instagram.com/yan_afriyoko/',
            'facebook' => 'https://www.facebook.com/yan.afriyoko.22/',
            'twitter' => 'https://twitter.com/yanafriyoko22',
            'job' => 'Full-Stack Developer',
        ]);
    
        $admin->assignRole('admin');
    }
}
