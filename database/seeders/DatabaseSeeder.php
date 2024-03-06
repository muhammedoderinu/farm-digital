<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BlogCategory;
use App\Models\MediaType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $mediaTypes = collect(['image', 'video'])->map(fn (string $name) => compact('name'))->all();
        MediaType::upsert($mediaTypes, 'name');

        $blogCategory = collect($this->category())->map(fn (string $name) => compact('name'))->all();
        BlogCategory::upsert($blogCategory, 'name');

        User::create($this->admin());
       
    }

    
    public function admin()
    {
        return 
        [
          'username' => 'muhammedoderinu@gmail.com',
          'password' => bcrypt('muhammedawal')
        ];
    }

    public function category()
    {
        return[
            'Technology',
            'Art',
            'Environment',
            'Agriculuture',
            'Fashion',
            'Travel',
            'Science',
            'Religion',
            'Health',
            'Lifestyle',
            'Finance',
            'Crafts'
        ];
    }


    
}
