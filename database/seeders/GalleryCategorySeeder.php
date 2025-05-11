<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryCategory;

class GalleryCategorySeeder extends Seeder
{
    public function run()
    {
        GalleryCategory::insert([
            ['name' => 'Nature'],
            ['name' => 'Events'],
            ['name' => 'People'],
        ]);
    }
}
