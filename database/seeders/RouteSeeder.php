<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Route::truncate();
        Route::factory(100)->create();
        Schema::enableForeignKeyConstraints();

    }
}
