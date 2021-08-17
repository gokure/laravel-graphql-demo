<?php

namespace Database\Seeders;

use App\Models\Quest;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(WinesTableSeeder::class);
        Category::factory(10)->create();
        Quest::factory(10)->create();
    }
}
