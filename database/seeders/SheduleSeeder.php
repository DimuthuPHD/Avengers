<?php

namespace Database\Seeders;

use App\Models\Shedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Shedule::truncate();
        Shedule::factory(200)->create();
        Schema::enableForeignKeyConstraints();
    }
}
